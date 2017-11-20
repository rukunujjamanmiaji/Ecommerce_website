<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Discount Entity
 *
 * @property int $id
 * @property int $product_id
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $start_at
 * @property \Cake\I18n\FrozenTime $end_at
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $status
 *
 * @property \App\Model\Entity\Product $product
 */
class Discount extends Entity
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
        'product_id' => true,
        'amount' => true,
        'start_at' => true,
        'end_at' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'product' => true
    ];
}
