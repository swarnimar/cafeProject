<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusinessProductCategory Entity
 *
 * @property int $id
 * @property int $business_id
 * @property int $product_category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\Product[] $products
 */
class BusinessProductCategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
