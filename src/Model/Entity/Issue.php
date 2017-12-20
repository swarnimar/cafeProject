<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Issue Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $status
 */
class Issue extends Entity
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
        'name' => true,
        'email' => true,
        'subject' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'status' => true
    ];
}
