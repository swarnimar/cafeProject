<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends ApiController
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
        
        $this->request->data['user_id'] = $this->Auth->user('id');

        $product = $this->Products->newEntity();
        $product = $this->Products->patchEntity($product, $this->request->getData(), ['associated' => ['ProductImages', 'ProductBills']]);
        
        if (!$this->Products->save($product)) {
            throw new InternalErrorException(__('Could not be saved')); 
        }

        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

}
