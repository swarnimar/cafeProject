<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * UserAppInfos Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserAppInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserAppInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserAppInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserAppInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserAppInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserAppInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserAppInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class UserAppInfosTable extends Table
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

        $this->setTable('user_app_infos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
            ->dateTime('interested_users_visit')
            ->requirePresence('interested_users_visit', 'create')
            ->notEmpty('interested_users_visit');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function updateIntrestedUsersVist($userId){
        
        $userAppInfo = $this->findByUserId($userId)->first();
        if(!$userAppInfo){
            $userAppInfo = $this->newEntity();
            $userAppInfo->user_id = $userId;
        }

        $userAppInfo->interested_users_visit = Time::now();

        $this->save($userAppInfo);

    }
}
