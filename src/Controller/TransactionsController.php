<?php
namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Query;

/**
 * Transactions Controller
 *
 * @property Table\TransactionsTable $Transactions
 * @property Table\TagsTable $Tags
 *
 * @method Entity\Transaction[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Tags');
    }

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
            'contain' => ['Accounts']
        ]);


        $this->paginate = [
            'Tags' => [
                'conditions' => [
                    'Transactions.user_id' => $this->Auth->user('id')
                ],
            ]
        ];
        $query = $this->Tags
            ->find()
            ->matching('Transactions', function (Query $query) use ($id) {
                return $query->where([
                    'Transactions.id' => $id
                ]);
            });
        $transaction->tags = $this->paginate($query);
        $this->set('transaction', $transaction);
    }
}
