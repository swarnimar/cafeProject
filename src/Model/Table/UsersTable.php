<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Inflector;
use Cake\Utility\Text;


/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property |\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\ResetPasswordHashesTable|\Cake\ORM\Association\HasMany $ResetPasswordHashes
 * @property \App\Model\Table\UserOldPasswordsTable|\Cake\ORM\Association\HasMany $UserOldPasswords
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('InterestedUsers', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasOne('UserAppInfos', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('ResetPasswordHashes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserOldPasswords', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('ADmad/HybridAuth.SocialProfiles');

        \Cake\Event\EventManager::instance()->on('HybridAuth.newUser', [$this, 'createUser']);
    }

    public function createUser(\Cake\Event\Event $event) {
        // Entity representing record in social_profiles table
        $profile = $event->data()['profile'];

        // Make sure here that all the required fields are actually present
        $data = [
          'email' => $profile->email,
          'first_name' => $profile->first_name,
          'last_name' => $profile->last_name,
          'password' => $this->getPassword(),
          'status' => 1,
          'role_id' => 2
        ];

        if(isset($profile->phone) && !in_array($profile->phone, [null, false, ''])){
         $data['phone'] = $profile->phone;          
        }

        $data['username'] = $this->getUsername($data);

        $user = $this->newEntity($data);
        $user = $this->save($user);

        if (!$user) {
            throw new \RuntimeException('Unable to save new user');
        }

        return $user;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('first_name')
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->scalar('uuid')
            ->allowEmpty('phone');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->dateTime('is_deleted')
            ->allowEmpty('is_deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    public function beforeSave( \Cake\Event\Event $event, $entity, \ArrayObject $options){
      if ($entity->isNew()){
           $entity->uuid = Text::uuid();
       }
    }

    public function getUsername($data){

      $proposedUsername = $data['email'];
      $usernameExists = $this->find('all')->where(['username'=> $proposedUsername])->count();

      //check if username generated from email
      if($usernameExists > 0){
        $proposedUsername1 = $data['first_name'].$data['last_name'];
        $proposedUsername1 = Inflector::slug(strtolower($proposedUsername1));
        $username = $proposedUsername1;
        $usernameExists1 = $this->find('all')->where(['username LIKE'=>$proposedUsername1.'%'])->count();

        //check if username from first and last name already  exists
        if($usernameExists1 > 0){
          $auto = 1;
          $countIncrement = $usernameExists1+$auto;
          $username = $proposedUsername1.$countIncrement;
        }

        return $username;

      }else{

        return $proposedUsername;
      } 
    }

    public function getPassword( $type = 'alnum', $length = 8 ){
        switch ( $type ) {
          case 'alnum':
          $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          break;
          case 'alpha':
          $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          break;
          case 'hexdec':
          $pool = '0123456789abcdef';
          break;
          case 'numeric':
          $pool = '0123456789';
          break;
          case 'nozero':
          $pool = '123456789';
          break;
          case 'distinct':
          $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
          break;
          default:
          $pool = (string) $type;
          break;
        }


        $crypto_rand_secure = function ( $min, $max ) {
          $range = $max - $min;
          if ( $range < 0 ) return $min; // not so random...
          $log    = log( $range, 2 );
          $bytes  = (int) ( $log / 8 ) + 1; // length in bytes
          $bits   = (int) $log + 1; // length in bits
          $filter = (int) ( 1 << $bits ) - 1; // set all lower bits to 1
          do {
            $rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
            $rnd = $rnd & $filter; // discard irrelevant bits
          } while ( $rnd >= $range );
          return $min + $rnd;
        };

        $token = "";
        $max   = strlen( $pool );
        for ( $i = 0; $i < $length; $i++ ) {
          $token .= $pool[$crypto_rand_secure( 0, $max )];
        }
        return $token;
    }
}
