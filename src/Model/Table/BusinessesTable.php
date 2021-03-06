<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
/**
 * Businesses Model
 *
 * @property \App\Model\Table\BusinessProductCategoriesTable|\Cake\ORM\Association\HasMany $BusinessProductCategories
 *
 * @method \App\Model\Entity\Business get($primaryKey, $options = [])
 * @method \App\Model\Entity\Business newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Business[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Business|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Business patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Business[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Business findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BusinessesTable extends Table
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

        $this->setTable('businesses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('BusinessProductCategories', [
            'foreignKey' => 'business_id'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
                'image_name' => [
                    'path' => Configure::read('ImageUpload.uploadPath'),
                    'unlinkPath' => Configure::read('ImageUpload.uploadPath'),
                    'fields' => [
                        'dir' => 'image_path',
                    ],
                'nameCallback' => function ($data, $settings) {
                  return time(). $data['name'];
                }
            ],
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
