<?php

namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use Cake\Chronos\Chronos;
use ImportCsv\Controller\Component\ImportCsvComponent;

/**
 * Import Controller
 *
 * @property Table\TransactionsTable $Transactions
 * @property ImportCsvComponent $ImportCsv
 */
class ImportController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Transactions');
        $this->loadComponent('ImportCsv.ImportCsv');
        $this->viewBuilder()->setHelpers(['ImportCsv.ImportCsv']);
    }

    public function index()
    {
        if ($this->getRequest()->is('post')) {
            try {
                $target_file = $this->ImportCsv->processPost($this->getRequest());
                $this->redirect([
                    'action' => 'mapFields',
                    $target_file
                ]);
            } catch (\Exception $e) {
                $this->Flash->error($e->getMessage());
            }
        }
    }

    /**
     * @param string $target_file
     * @throws \League\Csv\Exception
     */
    public function mapFields(string $target_file)
    {
        if ($this->getRequest()->is('post')) {
            $this->redirect([
                'action' => 'import',
                $target_file,
                '?' => $this->getRequest()->getData()
            ]);
        }

        $csv = $this->ImportCsv->getCsv($target_file);
        $headers = $csv->getHeader();
        $csv_fields = array_combine($headers, $headers);
        $table_fields = $this->Transactions->getCsvFields();

        $accounts = $this->Transactions->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('csv_fields', 'table_fields', 'accounts'));
    }

    /**
     * @param string $target_file
     * @throws \League\Csv\Exception
     */
    public function import(string $target_file)
    {
        $field_map = $this->getRequest()->getQueryParams();
        $records = $this->ImportCsv->getRecords($target_file);
        $transactions = [];
        foreach ($records as $index => $record) {
            $data = ['user_id' => $this->Auth->user('id')];

            foreach ($field_map as $key => $val) {
                $val = array_key_exists($val, $record)
                    ? $record[$val]
                    : $val;

                $data[$key] = self::cast($this->Transactions->getFieldType($key), $val);
            }
            $transaction = new Entity\Transaction($data);
            $transaction->id = $this->Transactions->createUuid($transaction);
            $transactions[] = $transaction;
        }

        if ($this->Transactions->saveMany($transactions)) {
            $this->Flash->success(count($transactions) . ' transactions saved');
        } else {
            $this->Flash->error('Transaction were unable to be saved');
        }

        $this->redirect(['controller' => 'Transactions', 'action' => 'index']);
    }

    protected static function cast(string $type, string $val)
    {
        switch ($type) {
            case 'integer':
                $val = (int)$val;
                break;

            case 'decimal':
                $val = (float)$val;
                break;

            case 'datetime':
                $val = Chronos::createFromTimestamp(strtotime($val));
                break;

            case 'string':
            case 'text':
                $val = (string)$val;
                break;
            default:
                throw new \UnexpectedValueException("'$type' is an unknown cast type");
        }

        return $val;
    }
}
