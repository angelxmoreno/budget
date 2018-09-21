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
            'contain' => ['Accounts', 'Users', 'Tags']
        ]);

        $this->set('transaction', $transaction);
    }

    /**
     * Add method
     *
     */
    public function add()
    {
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $accounts = $this->Transactions->Accounts->find('list', ['limit' => 200]);
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $tags = $this->Transactions->Tags->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'accounts', 'users', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $accounts = $this->Transactions->Accounts->find('list', ['limit' => 200]);
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $tags = $this->Transactions->Tags->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'accounts', 'users', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
