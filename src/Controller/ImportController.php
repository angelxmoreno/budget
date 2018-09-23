<?php

namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use BernardCake\BernardCakeMessageAware;
use Cake\Chronos\Chronos;
use Cake\Http\Exception\NotFoundException;
use ImportCsv\Controller\Component\ImportCsvComponent;

/**
 * Import Controller
 *
 * @property Table\TransactionsTable $Transactions
 * @property Table\UploadsTable $Uploads
 * @property ImportCsvComponent $ImportCsv
 */
class ImportController extends AppController
{

    use BernardCakeMessageAware;

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Transactions');
        $this->loadModel('Uploads');
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

        $accounts = $this->Transactions->Accounts->find('list', [
            'limit' => 200
        ])->find('OwnedByUser', ['user_id' => $this->Auth->user('id')]);
        $this->set(compact('csv_fields', 'table_fields', 'accounts'));
    }

    /**
     * @param string $target_file
     * @throws \League\Csv\Exception
     * @throws \ReflectionException
     */
    public function import(string $target_file)
    {
        $file_path = $this->ImportCsv->getTargetPath() . $target_file;
        if (!file_exists($file_path)) {
            throw new NotFoundException();
        }

        $field_map = $this->getRequest()->getQueryParams();
        $records = $this->ImportCsv->getRecords($target_file);

        $upload = new Entity\Upload();
        $upload->user_id = $this->Auth->user('id');
        $upload->map = $field_map;
        $upload->file = $file_path;
        $upload->rows = $records->count();
        $upload->progress = 0;
        $saved = $this->Uploads->save($upload);

        if (!$saved) {
            $this->Flash->error('Could not save the Upload:' . print_r($upload->getErrors(), true));
        } else {
            $this->Flash->success('Your upload has been successfully queued');

            $this->pushMessage('TransactionUpload', [
                'upload_id' => $upload->id
            ]);
        }

        $this->redirect(['controller' => 'Uploads', 'action' => 'index']);
    }
}
