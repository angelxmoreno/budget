<?php

namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use Cake\Datasource\ResultSetInterface;

/**
 * Banks Controller
 *
 * @property Table\BanksTable $Banks
 *
 * @method Entity\Bank[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class BanksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $banks = $this->paginate($this->Banks);

        $this->set(compact('banks'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|void
     */
    public function view($id = null)
    {
        $bank = $this->Banks->get($id, [
            'contain' => [
                'Accounts' => [
                    'conditions' => [
                        'Accounts.user_id' => $this->Auth->user('id')
                    ]
                ]
            ]
        ]);

        $this->set('bank', $bank);
    }
}
