<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductBills Controller
 *
 * @property \App\Model\Table\ProductBillsTable $ProductBills
 *
 * @method \App\Model\Entity\ProductBill[] paginate($object = null, array $settings = [])
 */
class ProductBillsController extends AppController
{

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

        $product = $this->ProductBills->Products->findById($data['product_id'])->first();

        if(!$product){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Product'));
        }

        if($product->user_id != $this->Auth->user('id') && $this->Auth->user('role_id') != 1){
            throw new UnauthorizedException(__('You are not authorized to do that'));
        }

        $productBillImage = $this->ProductBills->newEntity();

        $productBillImage = $this->ProductBills->patchEntity($productBillImage, $this->request->getData());
        
        if (!$this->ProductBills->save($productBillImage)) {
            throw new InternalErrorException(__('ENTITY_ERROR', 'Product Bill Image'));
        }

        $response = ['status' => true, 'message' => 'Image has been saved', 'image_url' => $productBillImage->image_url, 'id' => $productBillImage->id];

        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Bill id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBill = $this->ProductBills->get($id);
        if ($this->ProductBills->delete($productBill)) {
            $this->Flash->success(__('The product bill has been deleted.'));
        } else {
            $this->Flash->error(__('The product bill could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
