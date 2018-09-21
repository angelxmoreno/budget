<?php

namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use Cake\Datasource\ResultSetInterface;

/**
 * Accounts Controller
 *
 * @property Table\AccountsTable $Accounts
 *
 * @method Entity\Account[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['Accounts.user_id' => $this->Auth->user('id')],
            'contain' => ['Banks', 'Users']
        ];
        $accounts = $this->paginate($this->Accounts);

        $this->set(compact('accounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|void
     */
    public function view($id = null)
    {
        $account = $this->Accounts->get($id, [
            'conditions' => ['Accounts.user_id' => $this->Auth->user('id')],
            'contain' => ['Banks', 'Users', 'Transactions']
        ]);

        $this->set('account', $account);
    }

    /**
     * Add method
     *
     */
    public function add()
    {
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            $account->user_id = $this->Auth->user('id');
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $banks = $this->Accounts->Banks->find('list', ['limit' => 200]);
        $this->set(compact('account', 'banks', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        $account = $this->Accounts->get($id, [
            'conditions' => ['Accounts.user_id' => $this->Auth->user('id')],
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            $account->user_id = $this->Auth->user('id');
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $banks = $this->Accounts->Banks->find('list', ['limit' => 200]);
        $this->set(compact('account', 'banks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id, [
            'conditions' => ['Accounts.user_id' => $this->Auth->user('id')],
        ]);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
