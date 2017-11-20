<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $sub_category_id
 * @property string $sku
 * @property string $name
 * @property string $model
 * @property string $description
 * @property float $buy_price
 * @property float $sell_price
 * @property int $units_in_stock
 * @property string $size
 * @property string $color
 * @property float $weight
 * @property int $rating
 * @property string $thumb
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $status
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\SubCategory $sub_category
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Discount[] $discounts
 * @property \App\Model\Entity\ProductImage[] $product_images
 * @property \App\Model\Entity\Purchase[] $purchases
 * @property \App\Model\Entity\Review[] $reviews
 */
class Product extends Entity
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
        'category_id' => true,
        'sub_category_id' => true,
        'sku' => true,
        'name' => true,
        'model' => true,
        'description' => true,
        'buy_price' => true,
        'sell_price' => true,
        'units_in_stock' => true,
        'size' => true,
        'color' => true,
        'weight' => true,
        'rating' => true,
        'thumb' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'category' => true,
        'sub_category' => true,
        'carts' => true,
        'discounts' => true,
        'product_images' => true,
        'purchases' => true,
        'reviews' => true
    ];
}
