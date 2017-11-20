<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\SubCategoriesTable|\Cake\ORM\Association\BelongsTo $SubCategories
 * @property \App\Model\Table\CartsTable|\Cake\ORM\Association\HasMany $Carts
 * @property \App\Model\Table\DiscountsTable|\Cake\ORM\Association\HasMany $Discounts
 * @property \App\Model\Table\ProductImagesTable|\Cake\ORM\Association\HasMany $ProductImages
 * @property \App\Model\Table\PurchasesTable|\Cake\ORM\Association\HasMany $Purchases
 * @property \App\Model\Table\ReviewsTable|\Cake\ORM\Association\HasMany $Reviews
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
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->belongsTo('SubCategories', [
            'foreignKey' => 'sub_category_id'
        ]);
        $this->hasMany('Carts', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Discounts', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('ProductImages', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Purchases', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'product_id'
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
            ->scalar('sku')
            ->allowEmpty('sku');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('model')
            ->requirePresence('model', 'create')
            ->notEmpty('model');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->numeric('buy_price')
            ->allowEmpty('buy_price');

        $validator
            ->numeric('sell_price')
            ->allowEmpty('sell_price');

        $validator
            ->integer('units_in_stock')
            ->requirePresence('units_in_stock', 'create')
            ->notEmpty('units_in_stock');

        $validator
            ->scalar('size')
            ->allowEmpty('size');

        $validator
            ->scalar('color')
            ->allowEmpty('color');

        $validator
            ->numeric('weight')
            ->allowEmpty('weight');

        $validator
            ->integer('rating')
            ->allowEmpty('rating');

        $validator
            ->scalar('thumb')
            ->allowEmpty('thumb');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['sub_category_id'], 'SubCategories'));

        return $rules;
    }
}
