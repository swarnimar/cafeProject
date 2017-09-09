<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends ApiController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['resetPasswordLink']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {   
        if(!$this->request->is(['get'])){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }
        
        $query = $this->request->getQueryParams();
        $columns = $this->Users->schema()->columns();
        foreach ($query as $field => $value) {
            if(!in_array($field, $columns)){
                throw new BadRequestException(__('Field {0} does not exist in Users Table.', $field));
            }
        }
        $users = $this->Users->find()->where($query)->contain(['Roles'])->all();
        $this->set(compact('users'));        
        $this->set('_serialize', ['users']);
    }
/**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        if(!$this->request->is(['get'])){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        if(!isset($id) && $id){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','User Id'));
        }

        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        if(!$user){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

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
        
        $this->request->data['username'] = $this->Users->getUsername($this->request->data);

        $user = $this->Users->newEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());
        
        if (!$this->Users->save($user)) {
            throw new InternalErrorException(__('Could not be saved')); 
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if(!$this->request->is(['put'])){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        if(!isset($id) && $id){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','User Id'));
        }

        $user = $this->Users->findById($id)->first();
        $user = $this->Users->patchEntity($user, $this->request->getData());
        
        if (!$this->Users->save($user)){

            throw new InternalErrorException(__('Could not be saved')); 
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if(!$this->request->is(['delete'])){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        if(!isset($id) && $id){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','User Id'));
        }

        if($id == 1){
            throw new BadRequestException(__('Super admin cannot be deleted.'));
            return;
        }
        if($id == $this->Auth->user('id')){
            throw new BadRequestException(__('You cannot delete yourself'));
            return;
        } 
        $user = $this->Users->get($id);
        if (!$this->Users->delete($user)) {
            throw new InternalErrorException(__('Could not be deleted')); 
        }

        $response = ['message' => 'User has been deleted'];
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    /** */
    public function updatePassword(){
        
        if(!$this->request->is(['put'])){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }
        $data = $this->request->data;
        if(!isset($data['new_password'])){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','new_password'));
        }
        if(isset($data['new_password']) && empty($data['new_password'])){
            throw new BadRequestException(__('EMPTY_NOT_ALLOWED','new_password'));
        }
        if(!isset($data['old_password'])){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','old_password'));
        }
        if(isset($data['old_password']) && empty($data['old_password'])){
            throw new BadRequestException(__('EMPTY_NOT_ALLOWED','old_password'));
        }
        if(!isset($data['user_id'])){
            throw new BadRequestException(__('MANDATORY_FIELD_MISSING','user_id'));
        }
        if(isset($data['user_id']) && empty($data['user_id'])){
            throw new BadRequestException(__('EMPTY_NOT_ALLOWED','user_id'));
        }
        $id = $data['user_id'];
        $user = $this->Users->find()->where(['id'=>$id])->first();
        if(!$user){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
        }

        $password = $data['new_password'];
        $oldPassword = $data['old_password'];

        $hasher = new DefaultPasswordHasher();
        // pr($hasher);die('here in hasher');
        if(!$hasher->check( $oldPassword,$user->password)){
            //pr($hasher->check); die('ss');
            throw new BadRequestException(__('UNAUTHORIZED_PROVIDE_OLD_PASSWORD'));
        }
        //pr('qq'); die();
        if(! preg_match("/^[A-Za-z0-9~!@#$%^*&;?.+_]{8,}$/", $password)){
            throw new BadRequestException(__('Only numbers 0-9, alphabets a-z A-Z and special characters ~!@#$%^*&;?.+_ are allowed.'));
        }
        $reqData = ['password'=>$password];
        //pr($reqData);die('ie');

        $isContainChars = false;
        for( $i = 0; $i <= strlen($user->username)-3; $i++ ) {
            $char = substr( $user->username, $i, 3 );
            if(strpos($password,$char,0) !== false ){
                $isContainChars = true;
                break;
            }
        }
        if($isContainChars){
            throw new BadRequestException(__('THREE_CONTIGUOUS_CHARACTERS','username'));
        }
        $fullname = $user->full_name;
        for( $i = 0; $i <= strlen($fullname)-3; $i++ ) {
            $char = substr( $fullname, $i, 3 );
            if(strpos($password,$char,0) !== false ){
                $isContainChars = true;
                break;
            }
        }
        if($isContainChars){
            throw new BadRequestException(__('THREE_CONTIGUOUS_CHARACTERS','full name'));
        }
        $this->loadModel('UserOldPasswords');
        $this->UserOldPasswords->addBehavior('Timestamp');
        $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$id])->toArray();
        foreach ($userOldPasswordCheck as $key => $value) {
            if($hasher->check( $password,$value['password'])){
                throw new BadRequestException(__('SIX_EARLIER_PASSWORD'));
            }
        }
        $user = $this->Users->patchEntity($user, $reqData);
        if($this->Users->save($user)){
            $reqData = ['user_id'=>$id,'password'=>$password];
            
            $userOldPasswordCheck = $this->UserOldPasswords->newEntity();
            $userOldPasswordCheck = $this->UserOldPasswords->patchEntity($userOldPasswordCheck, $reqData);
            if($this->UserOldPasswords->save($userOldPasswordCheck)){
                $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$id]);
                if($userOldPasswordCheck->count() > 6){
                    $userOldPasswordCheck =$userOldPasswordCheck->order('created ASC')->first();
                    $userOldPasswordCheck = $this->UserOldPasswords->delete($userOldPasswordCheck);
                }
                $data =array();
                $data['status']=true;
                $data['data']['id']=$user->id;
                $data['data']['message']='password saved';
                $this->set('response',$data);
                $this->set('_serialize', ['response']);

            }else{
                // pr($userOldPasswordCheck->errors());die;
                //log password not changed
                // throw new BadRequestException(__('can not use earlier used 6 passwords'));
            }
        }else{  
            // pr($user->errors());die;
            throw new BadRequestException(__('BAD_REQUEST'));
        }

    }

     public function resetPasswordLink(){

        if(!$this->request->is('post')){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        if(!isset($this->request->data['username']) || (isset($this->request->data['username']) && $this->request->data['username'] == "") ){

            throw new InternalErrorException(__('MANDATORY_FIELD_MISSING', 'username'));

        }
        $username = $this->request->data['username'];
        $user = $this->Users->find('all')->where(['username'=>$username])->first();
        
        if(!$user){
            throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
        }

        // pr($user->uuid);die;
        $this->loadModel('ResetPasswordHashes');
        $checkExistPasswordHash = $this->ResetPasswordHashes->find()->where(['user_id'=>$user->id])->first();


        if(empty($checkExistPasswordHash)){

            $resetPwdHash = $this->_createResetPasswordHash($user->id,$user->uuid);

        }else{

            $resetPwdHash = $checkExistPasswordHash->hash;
            $time = new Time($checkExistPasswordHash->created);
            if(!$time->wasWithinLast(1)){
              $this->ResetPasswordHashes->delete($checkExistPasswordHash);
              $resetPwdHash =$this->_createResetPasswordHash($user->id,$user->uuid);
            }
        }
        $url = Router::url('/', true);
        $url = $url.'users/resetPassword?reset-token='.$resetPwdHash;
        $user->link = $url;
  
        $response = ['message' => __('VERIFIED_AND_CHANGE_PASSWORD'), 'url' => $url];

        $this->set(compact('response'));
        $this->set('_serialize', ['response']);

    }

    protected function _createResetPasswordHash($userId,$uuid){

        $this->loadModel('ResetPasswordHashes');
        $hasher = new DefaultPasswordHasher();
        $reqData = ['user_id'=>$userId,'hash'=> $hasher->hash($uuid)];
        $createPasswordhash = $this->ResetPasswordHashes->newEntity($reqData);
        $createPasswordhash = $this->ResetPasswordHashes->patchEntity($createPasswordhash,$reqData);
        if($this->ResetPasswordHashes->save($createPasswordhash)){
          return $createPasswordhash->hash;
        }else{
        Log::write('error','error in creating resetpassword hash for user id '.$userId);
        Log::write('error',$createPasswordhash);
      }
        return false;
    }

}
