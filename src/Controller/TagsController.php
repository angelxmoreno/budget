<?php
namespace Axm\Budget\Controller;

use Cake\Datasource\ResultSetInterface;
use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;

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
            'contain' => ['ParentTags']
        ];
        $tags = $this->paginate($this->Tags);

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
        $tag = $this->Tags->get($id, [
            'contain' => ['ParentTags', 'Transactions', 'ChildTags']
        ]);

        $this->set('tag', $tag);
    }

    /**
     * Add method
     *
     */
    public function add()
    {
        $tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $parentTags = $this->Tags->ParentTags->find('list', ['limit' => 200]);
        $transactions = $this->Tags->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'parentTags', 'transactions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Transactions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $parentTags = $this->Tags->ParentTags->find('list', ['limit' => 200]);
        $transactions = $this->Tags->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'parentTags', 'transactions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
