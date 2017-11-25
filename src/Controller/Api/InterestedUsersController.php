<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;

/**
 * InterestedUsers Controller
 *
 * @property \App\Model\Table\InterestedUsersTable $InterestedUsers
 *
 * @method \App\Model\Entity\InterestedUser[] paginate($object = null, array $settings = [])
 */
class InterestedUsersController extends ApiController
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

        $product = $this->InterestedUsers->Products
                                         ->findById($this->request->data['product_id'])
                                         ->where(['user_id IS NOT' => $this->Auth->user('id')])
                                         ->first();
        if(!$product){
            throw new BadRequestException(__('Product does not exist.'));
        }

        $interestedUser = $this->InterestedUsers->newEntity();
        $interestedUser = $this->InterestedUsers->patchEntity($interestedUser, $this->request->getData());

        if(!$this->InterestedUsers->save($interestedUser)) {
            throw new InternalErrorException(__('Could not be saved')); 
        }
        
        $this->set(compact('interestedUser'));
        $this->set('_serialize', ['interestedUser']);
    }
}
