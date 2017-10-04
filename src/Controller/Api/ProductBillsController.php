<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;

/**
 * ProductBills Controller
 *
 * @property \App\Model\Table\ProductBillsTable $ProductBills
 *
 * @method \App\Model\Entity\ProductBill[] paginate($object = null, array $settings = [])
 */
class ProductBillsController extends ApiController
{

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBill = $this->ProductBills->findById($id)->contain('Products')->first();

        if(!$productBill){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Product Image'));
        }

        if(!isset($productBill->product) || ($productBill->product->user_id != $this->Auth->user('id') && $this->Auth->user('role_id') != 1)){
            throw new UnauthorizedException(__('You are not authorized to do that'));
        }

        if (!$this->ProductBills->delete($productBill)) {
            throw new InternalErrorException(__('Product Bill Image could not be deleted'));
        }

        $response = ['status' => true, 'message' => 'Image has been deleted'];

        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }
}
