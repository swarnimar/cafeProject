<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Issues Controller
 *
 * @property \App\Model\Table\IssuesTable $Issues
 *
 * @method \App\Model\Entity\Issue[] paginate($object = null, array $settings = [])
 */
class IssuesController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $issues = $this->Issues->find()->order('status DESC')->all();

        $this->set(compact('issues'));
        $this->set('_serialize', ['issues']);
    }

    /**
     * View method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issue = $this->Issues->findById($id)->first();

        $this->set('issue', $issue);
        $this->set('_serialize', ['issue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issue = $this->Issues->newEntity();
        if ($this->request->is('post')) {

            $issue = $this->Issues->patchEntity($issue, $this->request->getData());
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been received. We will get back to you within 48 hours.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The issue could not be saved. Please, try again.'));
        }
        $this->viewBuilder()->layout('login');
        $this->set(compact('issue'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issue = $this->Issues->get($id);
        $issue->status = false;
        if ($this->Issues->save($issue)) {
            $this->Flash->success(__('The issue has been closed.'));
        } else {
            $this->Flash->error(__('The issue could not be closed. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
