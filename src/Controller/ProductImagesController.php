<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;

/**
 * ProductImages Controller
 *
 * @property \App\Model\Table\ProductImagesTable $ProductImages
 *
 * @method \App\Model\Entity\ProductImage[] paginate($object = null, array $settings = [])
 */
class ProductImagesController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $data = $this->request->getData();

        if(!isset($data['product_id']) || in_array($data['product_id'], [false, null, ""])){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','product_id'));
        }

        if(!isset($data['image_name']) || in_array($data['image_name'], [false, null, ""])){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','image_name'));
        }

        $product = $this->ProductImages->Products->findById($data['product_id'])->first();

        if(!$product){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Product'));
        }

        if($product->user_id != $this->Auth->user('id') && $this->Auth->user('role_id') != 1){
            throw new UnauthorizedException(__('You are not authorized to do that'));
        }

        $productImage = $this->ProductImages->newEntity();

        $productImage = $this->ProductImages->patchEntity($productImage, $this->request->getData());
        
        if (!$this->ProductImages->save($productImage)) {
            throw new InternalErrorException(__('ENTITY_ERROR', 'Product Image'));
        }

        $response = ['status' => true, 'message' => 'Image has been saved'];

        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productImage = $this->ProductImages->get($id);
        if ($this->ProductImages->delete($productImage)) {
            $this->Flash->success(__('The product image has been deleted.'));
        } else {
            $this->Flash->error(__('The product image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
