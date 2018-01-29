<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form',
                'ADmad/HybridAuth.HybridAuth' => [
                    // All keys shown below are defaults
                    'fields' => [
                        'provider' => 'provider',
                        'openid_identifier' => 'openid_identifier',
                        'email' => 'email'
                    ],

                    'profileModel' => 'ADmad/HybridAuth.SocialProfiles',
                    'profileModelFkField' => 'user_id',

                    'userModel' => 'Users',

                    // The URL Hybridauth lib should redirect to after authentication.
                    // If no value is specified you are redirect to this plugin's
                    // HybridAuthController::authenticated() which handles persisting
                    // user info to AuthComponent and redirection.
                    'hauth_return_to' => ['controller'=> 'Users', 'action' => 'login', 'plugin' => false]
                ]
            ],
            'authorize' => 'Controller',
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'landingPage'
            ],
            // 'redirectUrl' => ['controller'=> 'Users', 'action' => 'Login', 'plugin' => false]
            // 'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);
        
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event){
        $user= $this->Auth->user();
        if($user && $user['role_id'] != 1){
            $this->loadModel('UserAppInfos');
            $userAppInfo = $this->UserAppInfos->findByUserId($user['id'])->first();
            if(!$userAppInfo){
                $intrestedUsersNotification =$this->UserAppInfos->Users
                                                                ->InterestedUsers
                                                                ->find()
                                                                ->matching('Products', function($q) use($user){
                                                                    return $q->where([
                                                                        'Products.user_id' => $user['id']
                                                                    ]);
                                                                })
                                                                ->count();
            }else{
                $intrestedUsersNotification =$this->UserAppInfos->Users
                                                                ->InterestedUsers
                                                                ->find()
                                                                ->matching('Products', function($q) use($user){
                                                                    return $q->where([
                                                                        'Products.user_id' => $user['id']
                                                                    ]);
                                                                })
                                                                ->where([
                                                                    'InterestedUsers.created >' => $userAppInfo->interested_users_visit
                                                                ])
                                                                ->count();
            }

            $this->set('intrestedUsersNotification', $intrestedUsersNotification);
        }
    }

    public function isAuthorized($user){
        return true;
    }

   
}
