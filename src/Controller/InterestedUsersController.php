<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * InterestedUsers Controller
 *
 * @property \App\Model\Table\InterestedUsersTable $$interestedUserss
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
    public function index($id = null)
    {   
        $query = $this->InterestedUsers->find()->contain(['Users', 'Products.ProductImages']);

        $requestQuery = $this->request->query;
        $viewSeller = false;
        $viewBuyer = false;
        $loggedInUser = $this->Auth->user();

        if($this->Auth->user('role_id') == 1){
            $interestedUsers = $query->contain(['Products.Users'])->all();
        }elseif(isset($requestQuery['query']) && !in_array($requestQuery['query'], [null, false, ""]) && $requestQuery['query'] == 'liked'){
            $interestedUsers = $query->contain(['Products.Users'])->where(['InterestedUsers.user_id' => $this->Auth->user('id')])->all();
            $viewSeller = true;
        }else{
           $interestedUsers = $query->where(['Products.user_id' => $this->Auth->user('id')])->all();
           $viewBuyer = true;
           $this->InterestedUsers->Users->UserAppInfos->updateIntrestedUsersVist($this->Auth->user('id'));
        }

        if($loggedInUser['role_id'] == 1 || $viewBuyer){
            $interestedUsers = $interestedUsers->groupBy('product_id')->map(function($value, $key){
                $value[0]->users = (new Collection($value))->extract('user')->toArray();
                unset($value[0]->user);
                return $value[0];
            })->toArray();
            $interestedUsers = array_values($interestedUsers);
        }


        $this->set(compact('interestedUsers', 'viewSeller', 'viewBuyer','loggedInUser'));
        $this->set('_serialize', ['interestedUser']);
    }
}
