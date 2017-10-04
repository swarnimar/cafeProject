<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
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
class ProductImagesController extends ApiController
{


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
        $productImage = $this->ProductImages->findById($id)->contain('Products')->first();

        if(!$productImage){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Product Image'));
        }

        if(!isset($productImage->product) || ($productImage->product->user_id != $this->Auth->user('id') && $this->Auth->user('role_id') != 1)){
            throw new UnauthorizedException(__('You are not authorized to do that'));
        }

        if (!$this->ProductImages->delete($productImage)) {
            throw new InternalErrorException(__('Product Image could not be deleted'));
        }

        $response = ['status' => true, 'message' => 'Image has been deleted'];

        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }
}
