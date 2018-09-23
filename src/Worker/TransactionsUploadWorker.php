<?php

namespace Axm\Budget\Worker;

use Auth\Model\Entity\Auth;
use Axm\Budget\Model\Entity\Transaction;
use Axm\Budget\Model\Table\TransactionsTable;
use Axm\Budget\Model\Table\UploadsTable;
use Bernard\Envelope;
use Bernard\Message\DefaultMessage;
use BernardCake\Worker\WorkerBase;
use Cake\Chronos\Chronos;
use League\Csv\Reader;
use League\Csv\Statement;

/**
 * Class TransactionsUploadWorker
 * @package Axm\Budget\Worker
 *
 * @property UploadsTable $Uploads
 * @property TransactionsTable $Transactions
 */
class TransactionsUploadWorker extends WorkerBase
{
    public function initialize(Envelope $envelope)
    {
        $this->loadModel('Uploads');
        $this->loadModel('Transactions');

        parent::initialize($envelope);
    }

    /**
     * @param DefaultMessage $message
     * @throws \League\Csv\Exception
     */
    public function execute(DefaultMessage $message)
    {
        $upload_id = $message->upload_id;
        echo "using upload id {$upload_id}";
        $upload = $this->Uploads->get($upload_id);
        $csv = Reader::createFromPath($upload->file, 'r');
        $csv->setHeaderOffset(0);
        $records = (new Statement())->process($csv);

        $this->Transactions->setAuthUser(new Auth([
            'id' => $upload->user_id
        ]));

        foreach ($records as $index => $record) {
            $data = ['user_id' => $upload->user_id];

            foreach ($upload->map as $key => $val) {
                $val = array_key_exists($val, $record)
                    ? $record[$val]
                    : $val;

                $data[$key] = self::cast($this->Transactions->getFieldType($key), $val);
            }
            $transaction = new Transaction($data);
            $transaction->id = $this->Transactions->createUuid($transaction);

            if ($this->Transactions->exists([
                'Transactions.id' => $transaction->id
            ])) {
                $transaction->isNew(false);
            }

            try {
                $this->Transactions->saveOrFail($transaction);
                $upload->progress = ($index + 1) / $upload->rows * 100;
            } catch (\Exception $e) {
                echo 'Transaction save failed at row:' . $index . PHP_EOL;
                echo $e->getMessage() . PHP_EOL;
                pr($transaction->getErrors());
            }

            $this->Uploads->saveOrFail($upload);
        }
        $upload->completed = Chronos::now();
        $this->Uploads->saveOrFail($upload);
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
