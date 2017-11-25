<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InterestedUsers Controller
 *
 * @property \App\Model\Table\InterestedUsersTable $InterestedUsers
 *
 * @method \App\Model\Entity\InterestedUser[] paginate($object = null, array $settings = [])
 */
class InterestedUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];
        $interestedUsers = $this->paginate($this->InterestedUsers);

        $this->set(compact('interestedUsers'));
        $this->set('_serialize', ['interestedUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Interested User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $interestedUser = $this->InterestedUsers->get($id, [
            'contain' => ['Users', 'Products']
        ]);

        $this->set('interestedUser', $interestedUser);
        $this->set('_serialize', ['interestedUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $interestedUser = $this->InterestedUsers->newEntity();
        if ($this->request->is('post')) {
            $interestedUser = $this->InterestedUsers->patchEntity($interestedUser, $this->request->getData());
            if ($this->InterestedUsers->save($interestedUser)) {
                $this->Flash->success(__('The interested user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The interested user could not be saved. Please, try again.'));
        }
        $users = $this->InterestedUsers->Users->find('list', ['limit' => 200]);
        $products = $this->InterestedUsers->Products->find('list', ['limit' => 200]);
        $this->set(compact('interestedUser', 'users', 'products'));
        $this->set('_serialize', ['interestedUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Interested User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $interestedUser = $this->InterestedUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $interestedUser = $this->InterestedUsers->patchEntity($interestedUser, $this->request->getData());
            if ($this->InterestedUsers->save($interestedUser)) {
                $this->Flash->success(__('The interested user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The interested user could not be saved. Please, try again.'));
        }
        $users = $this->InterestedUsers->Users->find('list', ['limit' => 200]);
        $products = $this->InterestedUsers->Products->find('list', ['limit' => 200]);
        $this->set(compact('interestedUser', 'users', 'products'));
        $this->set('_serialize', ['interestedUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Interested User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $interestedUser = $this->InterestedUsers->get($id);
        if ($this->InterestedUsers->delete($interestedUser)) {
            $this->Flash->success(__('The interested user has been deleted.'));
        } else {
            $this->Flash->error(__('The interested user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
