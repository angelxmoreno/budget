<?php

namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Query;

/**
 * Tags Controller
 *
 * @property Table\TagsTable $Tags
 *
 * @method Entity\Tag[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 10,
        ];
        $tags = $this->paginate($this->Tags
            ->find('forUser', ['user_id' => $this->Auth->user('id')])
        );

        $this->set(compact('tags'));
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|void
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id);

        $query = $this->Tags->Transactions
            ->find()
            ->contain('Accounts')
            ->matching('Tags', function (Query $query) use ($id) {
                return $query->where([
                    'Tags.id' => $id
                ]);
            });
        $tag->transactions = $this->paginate($query);

        $this->set('tag', $tag);
    }
}
