<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $query = $this->Products->find()->contain(['Users', 'BusinessProductCategories.Businesses', 'BusinessProductCategories.ProductCategories', 'ProductBills', 'ProductImages']);

        $requestQuery = $this->request->query;

        $businessProductCategories = [];
        if(isset($requestQuery['category']) && !in_array($requestQuery['category'], [null, false, ""])){
            $businessProductCategory = $this->Products->BusinessProductCategories->findById($requestQuery['category'])->contain('ProductCategories')->first();
            $businessProductCategories = [$requestQuery['category']];
            if($businessProductCategory && $businessProductCategory->product_category->name != "Entire Setup"){

                $businessProductCategories = $this->Products->BusinessProductCategories->findByProductCategoryId($businessProductCategory->product_category_id)->extract('id')->toArray();
            }
        }
        // pr($requestQuery);die;
        if(!empty($businessProductCategories) && $this->Auth->user('role_id') == 1){
            $products = $query->where([
                                        'business_product_category_id IN' => $businessProductCategories,
                                      ])
                               ->all();

        }if(!empty($businessProductCategories) && $this->Auth->user('role_id') != 1){
            $products = $query->where([
                                        'business_product_category_id IN' => $businessProductCategories, 
                                        'user_id IS NOT' => $this->Auth->user('id')
                                      ])
                               ->all();

        }elseif(isset($requestQuery['productType']) && $requestQuery['productType'] == 'myProducts'){
            
            $products = $query->where(['user_id' => $this->Auth->user('id')])->order('Products.created DESC')->all();
        
        }else{
        
            $products = $query->order('Products.created DESC')->all();
        }

        $loggedInUser = $this->Auth->user();

        $this->set(compact('products', 'loggedInUser'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users', 'BusinessProductCategories.ProductCategories','BusinessProductCategories.Businesses', 'ProductBills', 'ProductImages', 'InterestedUsers' => function($q){
                    return $q->where(['user_id' => $this->Auth->user('id')]);
                }]
            ]);

        $userCanEdit = false;
        if($this->Auth->user('role_id') == 1 || (isset($product->user_id) && $product->user_id == $this->Auth->user('id') )){
            $userCanEdit = true;
        }

        $this->set(compact('product', 'userCanEdit'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Auth->user('id');

            if(!isset($this->request->data['business_id']) || !$this->request->data['business_id']){
                $this->Flash->error(__('business_id is required.'));
            }

            if(!isset($this->request->data['product_category_id']) || !$this->request->data['product_category_id']){
                $this->Flash->error(__('product_category_id is required.'));
            }

            $businessProductCategory = $this->Products
            ->BusinessProductCategories
            ->find()
            ->where([
                'business_id' => $this->request->data['business_id'],
                'product_category_id' => $this->request->data['product_category_id']
                ])
            ->first();
            if (!$businessProductCategory) {
                $this->Flash->error(__('Business Product Category not found.'));
            }

            $this->request->data['business_product_category_id'] = $businessProductCategory->id; 

            $product = $this->Products->patchEntity($product, $this->request->data, ['associated' => ['ProductImages', 'ProductBills']]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $businesses = $this->Products->BusinessProductCategories->Businesses->find('list', ['limit' => 200]);
        $productCategories = $this->Products->BusinessProductCategories->ProductCategories->find('list', ['limit' => 200]);

        $this->set(compact('product', 'users', 'businesses', 'productCategories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['BusinessProductCategories']
            ]);


        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['user_id'] = $this->Auth->user('id');

            if(!isset($this->request->data['business_id']) || !$this->request->data['business_id']){
                $this->Flash->error(__('business_id is required.'));
            }

            if(!isset($this->request->data['product_category_id']) || !$this->request->data['product_category_id']){
                $this->Flash->error(__('product_category_id is required.'));
            }

            $businessProductCategory = $this->Products
            ->BusinessProductCategories
            ->find()
            ->where([
                'business_id' => $this->request->data['business_id'],
                'product_category_id' => $this->request->data['product_category_id']
                ])
            ->first();
            if (!$businessProductCategory) {
                $this->Flash->error(__('Business Product Category not found.'));
            }

            $this->request->data['business_product_category_id'] = $businessProductCategory->id;
            $product = $this->Products->patchEntity($product, $this->request->data, ['associated' => ['ProductImages', 'ProductBills']]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $businesses = $this->Products->BusinessProductCategories->Businesses->find('list', ['limit' => 200]);
        $productCategories = $this->Products->BusinessProductCategories->ProductCategories->find('list', ['limit' => 200]);
        $product->business_id = $product->business_product_category->business_id;
        $product->product_category_id = $product->business_product_category->product_category_id;
        
        $this->set(compact('product', 'users', 'businesses', 'productCategories'));        
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
