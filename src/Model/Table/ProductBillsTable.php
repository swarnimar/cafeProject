<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * ProductBills Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductBill get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductBill newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductBill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductBill|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductBill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBill[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBill findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductBillsTable extends Table
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

        $this->setTable('product_bills');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
                'image_name' => [
                    'path' => Configure::read('ImageUpload.uploadPath'),
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
            ->allowEmpty('image_path');

        $validator
            ->allowEmpty('image_name');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
