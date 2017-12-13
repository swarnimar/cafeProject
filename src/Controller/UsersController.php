<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Network\Session;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['login','socialLogin' ,'logout', 'resetPassword', 'signUp']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {   
      
        $query = $this->request->getQueryParams();  

        $columns = $this->Users->schema()->columns();
        foreach ($query as $field => $value) {
          if(!in_array($field, $columns)){
            throw new BadRequestException(__('Field {0} does not exist in Users Table.', $field));
          }
        }
        $users = $this->Users->find()->where($query)->contain(['Roles'])->all();

        $loggedInUser = $this->Auth->user();
        $this->set(compact('users', 'loggedInUser'));        
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
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

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
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $this->request->data['username'] = $this->Users->getUsername($this->request->data);
            
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
              
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find()->all()->combine('id', 'label');
        $this->set(compact('user', 'roles'));
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $roles = $this->Users->Roles->find()->all()->combine('id', 'label');
        $this->set(compact('user', 'roles'));
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
        $this->request->allowMethod(['post', 'delete']);
        if($id == 1){
            $this->Flash->error(__('Super admin cannot be deleted'));
            return;
        }
        if($id == $this->Auth->user('id')){
            $this->Flash->error(__('You cannot delete yourself'));
            return;
        } 
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function socialLogin(){
      if ($this->request->is('post')) {
        $this->_loginUser();
      }
    }

    private function _loginUser(){
        
      $user = $this->Auth->identify();
      if ($user) {
          $role = $this->Users->Roles->findById($user['role_id'])
                                            ->first();
          if($role){
            $user['role'] = $role;
            $this->Auth->setUser($user);
            $session = new Session();
            if(isset($role->login_redirect_url) && $role->login_redirect_url){

              $url = Router::url('/', true);
              $url = $url.$role->login_redirect_url;
              
              return $this->redirect($url);

            }else{
              return $this->redirect(['action' => 'index']);
            }
          
          }else{
             $this->Flash->error(__('Role not found'));
             return $this->logout(); 
          }
      } else {
          $this->Flash->error(__('Unable to identify user.'));
      }

        
    }

    public function login(){
      if ($this->request->is('post')) {
        $this->_loginUser();
      }

      $user = $this->Auth->identify();
      if($user){
        $this->_loginUser();
      }

      $loginData = [];
      $this->viewBuilder()->layout('login');
      $this->set(compact('loginData'));
      $this->set('_serialize', ['loginData']);

    }


    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        $session = $this->request->session();
        $session->destroy();
        $this->redirect($this->Auth->logout());
    }


    public function resetPassword()
    {
        $this->viewBuilder()->layout('login');
        $uuid = $this->request->query('reset-token');
        if ($this->request->is('get') && !$uuid) {
          $this->Flash->error(__('BAD_REQUEST'));
          $this->redirect(['action' => 'login']);
          return;
        }

        if ($this->request->is('post')) {
          $uuid = (isset($this->request->data['reset-token']))?$this->request->data['reset-token']:'';

          if(!$uuid){
            $this->Flash->error(__('BAD_REQUEST'));
            $this->redirect(['action' => 'login']);
            return;
          }
          $password = (isset($this->request->data['new_pwd']))?$this->request->data['new_pwd']:'';
          if(!$password){
            $this->Flash->error(__('PROVIDE_PASSWORD'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
            return;
          }
          $cnfPassword = (isset($this->request->data['cnf_new_pwd']))?$this->request->data['cnf_new_pwd']:'';
          if(!$cnfPassword){
            $this->Flash->error(__('CONFIRM_PASSWORD'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
            return;
          }
          if($password !== $cnfPassword){
            $this->Flash->error(__('MISMATCH_PASSWORD'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
            return;
          }
          $this->loadModel('ResetPasswordHashes');
          $checkExistPasswordHash = $this->ResetPasswordHashes->find()->where(['hash'=>$uuid])->first();

          if(!$checkExistPasswordHash){
            $this->Flash->error(__('INVALID_RESET_PASSWORD'));
            $this->redirect(['action' => 'login']);
            return;
          }

          $userUpdate = $this->Users->findById($checkExistPasswordHash->user_id)->first();
          if(!$userUpdate){
            $this->Flash->error(__('ENTITY_DOES_NOT_EXISTS','User'));
            $this->redirect(['action' => 'login']);
            return;
          }
          if(! preg_match("/^[A-Za-z0-9~!@#$%^*&;?.+_]{8,}$/", $password)){
            $this->Flash->error(__('PASSWORD_CONDITION'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
            return;
          }
          $isContainChars = false;
          for( $i = 0; $i <= strlen($userUpdate->username)-3; $i++ ) {
            $char = substr( $userUpdate->username, $i, 3 );
            if(strpos($password,$char,0) !== false ){
              $isContainChars = true;
              break;
            }
          }
          if($isContainChars){
            $this->Flash->error(__('PASSWORD_USER_CONDITION'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
            return;
          }
          $fullname = $userUpdate->full_name;
          for( $i = 0; $i <= strlen($fullname)-3; $i++ ) {
            $char = substr( $fullname, $i, 3 );
            if(strpos($password,$char,0) !== false ){
              $isContainChars = true;
              break;
            }
          }
          if($isContainChars){
            $this->Flash->error(__('PASSWORD_NAME_CONDITION'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
            return;
          }

      // pr($userUpdate);die;
          $reqData = ['password'=>$password];
          $this->loadModel('UserOldPasswords');
          $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id])->toArray();
          $hasher = new DefaultPasswordHasher();
          foreach ($userOldPasswordCheck as $key => $value) {
      // pr($value);die;
            if($hasher->check( $password,$value['password'])){
              $this->Flash->error(__('PASSWORD_LIMIT'));
              $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
              return;
            }
          }
          $userUpdate = $this->Users->patchEntity($userUpdate,$reqData);
          if($this->Users->save($userUpdate)){

            $reqData = ['user_id'=>$checkExistPasswordHash->user_id,'password'=>$password];

            $userOldPasswordCheck = $this->UserOldPasswords->newEntity($reqData);
            $userOldPasswordCheck = $this->UserOldPasswords->patchEntity($userOldPasswordCheck, $reqData);
            if($this->UserOldPasswords->save($userOldPasswordCheck)){
              $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id]);
              if($userOldPasswordCheck->count() > 6){
                $userOldPasswordCheck =$userOldPasswordCheck->order('created ASC')->first();
                $userOldPasswordCheck = $this->UserOldPasswords->delete($userOldPasswordCheck);

              }
              $this->ResetPasswordHashes->delete($checkExistPasswordHash);

            }else{
      // pr($userOldPasswordCheck->errors());die;
      //log password not changed
      // throw new BadRequestException(__('can not use earlier used 6 passwords'));
    
            }

            $this->Flash->success(__('NEW_PASSWORD_UPDATED'));
            $this->redirect(['action' => 'login']);
          }else{
            $this->Flash->error(__('KINDLY_PROVIDE_VALID_DATA'));
            $this->redirect(['action' => 'resetPassword','?'=>['reset-token'=>$uuid]]);
          }
        }
        $this->set('resetToken',$uuid);
        $this->set('_serialize', ['reset-token']);
    }

    public function dashboard(){
      // $hostUrl = Router::url('/', true);

      // $this->set('hostUrl',$hostUrl);
      $this->set('_serialize', []);
    }

    public function signUp()
    {   
        $this->viewBuilder()->layout('login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $this->request->data['username'] = $this->Users->getUsername($this->request->data);
            $this->request->data['role_id'] = 2;
            $this->request->data['status'] = 1;

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
              
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'login']);
            }
           
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
