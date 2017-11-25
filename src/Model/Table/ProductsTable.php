<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BusinessProductCategoriesTable|\Cake\ORM\Association\BelongsTo $BusinessProductCategories
 * @property \App\Model\Table\ProductBillsTable|\Cake\ORM\Association\HasMany $ProductBills
 * @property \App\Model\Table\ProductImagesTable|\Cake\ORM\Association\HasMany $ProductImages
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BusinessProductCategories', [
            'foreignKey' => 'business_product_category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProductBills', [
            'foreignKey' => 'product_id',
            'dependent' => true,
            'cascadeCallBacks' => true
        ]);
        $this->hasMany('ProductImages', [
            'foreignKey' => 'product_id',
            'dependent' => true,
            'cascadeCallBacks' => true
        ]);
        $this->hasMany('InterestedUsers', [
            'foreignKey' => 'product_id',
            'dependent' => true,
            'cascadeCallBacks' => true
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
            ->scalar('manufacturer')
            ->requirePresence('manufacturer', 'create')
            ->notEmpty('manufacturer');

        $validator
            ->integer('year_of_purchasing')
            ->requirePresence('year_of_purchasing', 'create')
            ->notEmpty('year_of_purchasing');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->decimal('actual_price')
            ->requirePresence('actual_price', 'create')
            ->notEmpty('actual_price');

        $validator
            ->decimal('asking_price')
            ->requirePresence('asking_price', 'create')
            ->notEmpty('asking_price');

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
        $rules->add($rules->existsIn(['business_product_category_id'], 'BusinessProductCategories'));

        return $rules;
    }
}
