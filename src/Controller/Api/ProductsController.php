<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Collection\Collection;
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
        
        $data = $this->request->getData();
        $this->loadModel('TempImages');

        if(isset($data['product_images']) && !empty($data['product_images'])){
            $imageIds = (new Collection($data['product_images']))->extract('id')->toArray();
            $productImages = $this->TempImages->find()->where(['id IN' => $imageIds, 'user_id' => $this->Auth->user('id')])->toArray();
            if(!empty($productImages)){
                $data['product_images'] = (new Collection($productImages))->map(function($value, $key){
                    return [
                        'image_name' => $value->image_name,
                        'image_path' => $value->image_path
                    ];
                })->toArray();
            }
        }

        if(isset($data['product_bills']) && !empty($data['product_bills'])){
            $billIds = (new Collection($data['product_bills']))->extract('id')->toArray();
            $productBills = $this->TempImages->find()->where(['id IN' => $billIds, 'user_id' => $this->Auth->user('id')])->toArray();
            if(!empty($productBills)){
                $data['product_bills'] = (new Collection($productBills))->map(function($value, $key){
                    return [
                        'image_name' => $value->image_name,
                        'image_path' => $value->image_path
                    ];
                })->toArray();
            }
        }

        $data['user_id'] = $this->Auth->user('id');
        $product = $this->Products->newEntity();
        $product = $this->Products->patchEntity($product, $data, ['associated' => ['ProductImages', 'ProductBills']]);
        
        if (!$this->Products->save($product, ['associated' => ['ProductImages', 'ProductBills']])) {
            throw new InternalErrorException(__('Could not be saved')); 
        }

        $this->TempImages->deleteAll(['user_id' => $this->Auth->user('id')]);

        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

}
