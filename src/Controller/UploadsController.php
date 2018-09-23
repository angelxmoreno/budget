<?php
namespace Axm\Budget\Controller;

use Cake\Datasource\ResultSetInterface;
use Axm\Budget\Model\Entity;
use Axm\Budget\Model\Table;

/**
 * Uploads Controller
 *
 * @property Table\UploadsTable $Uploads
 *
 * @method Entity\Upload[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class UploadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['Uploads.user_id' => $this->Auth->user('id')],
            'contain' => ['Users']
        ];
        $uploads = $this->paginate($this->Uploads);

        $this->set(compact('uploads'));
    }

    /**
     * View method
     *
     * @param string|null $id Upload id.
     * @return \Cake\Http\Response|void
     */
    public function view($id = null)
    {
        $upload = $this->Uploads->get($id, [
            'conditions' => ['Uploads.user_id' => $this->Auth->user('id')],
            'contain' => ['Users']
        ]);

        $this->set('upload', $upload);
    }
}
