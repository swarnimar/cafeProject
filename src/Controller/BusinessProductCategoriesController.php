<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessProductCategories Controller
 *
 * @property \App\Model\Table\BusinessProductCategoriesTable $BusinessProductCategories
 *
 * @method \App\Model\Entity\BusinessProductCategory[] paginate($object = null, array $settings = [])
 */
class BusinessProductCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Businesses', 'ProductCategories']
        ];
        $businessProductCategories = $this->paginate($this->BusinessProductCategories);

        $this->set(compact('businessProductCategories'));
        $this->set('_serialize', ['businessProductCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Business Product Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessProductCategory = $this->BusinessProductCategories->get($id, [
            'contain' => ['Businesses', 'ProductCategories', 'Products']
        ]);

        $this->set('businessProductCategory', $businessProductCategory);
        $this->set('_serialize', ['businessProductCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessProductCategory = $this->BusinessProductCategories->newEntity();
        if ($this->request->is('post')) {
            $businessProductCategory = $this->BusinessProductCategories->patchEntity($businessProductCategory, $this->request->getData());
            if ($this->BusinessProductCategories->save($businessProductCategory)) {
                $this->Flash->success(__('The business product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business product category could not be saved. Please, try again.'));
        }
        $businesses = $this->BusinessProductCategories->Businesses->find('list', ['limit' => 200]);
        $productCategories = $this->BusinessProductCategories->ProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('businessProductCategory', 'businesses', 'productCategories'));
        $this->set('_serialize', ['businessProductCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Product Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessProductCategory = $this->BusinessProductCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessProductCategory = $this->BusinessProductCategories->patchEntity($businessProductCategory, $this->request->getData());
            if ($this->BusinessProductCategories->save($businessProductCategory)) {
                $this->Flash->success(__('The business product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business product category could not be saved. Please, try again.'));
        }
        $businesses = $this->BusinessProductCategories->Businesses->find('list', ['limit' => 200]);
        $productCategories = $this->BusinessProductCategories->ProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('businessProductCategory', 'businesses', 'productCategories'));
        $this->set('_serialize', ['businessProductCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Product Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessProductCategory = $this->BusinessProductCategories->get($id);
        if ($this->BusinessProductCategories->delete($businessProductCategory)) {
            $this->Flash->success(__('The business product category has been deleted.'));
        } else {
            $this->Flash->error(__('The business product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
