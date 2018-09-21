<?php
namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use Cake\Datasource\ResultSetInterface;

/**
 * Transactions Controller
 *
 * @property Table\TransactionsTable $Transactions
 *
 * @method Entity\Transaction[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['Transactions.user_id' => $this->Auth->user('id')],
            'contain' => ['Accounts', 'Users']
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|void
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'conditions' => ['Transactions.user_id' => $this->Auth->user('id')],
            'contain' => ['Accounts', 'Users', 'Tags']
        ]);

        $this->set('transaction', $transaction);
    }
}
