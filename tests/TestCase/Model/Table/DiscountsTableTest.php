<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiscountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiscountsTable Test Case
 */
class DiscountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiscountsTable
     */
    public $Discounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.discounts',
        'app.products',
        'app.categories',
        'app.sub_categories',
        'app.carts',
        'app.users',
        'app.orders',
        'app.reviews',
        'app.product_images',
        'app.purchases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Discounts') ? [] : ['className' => DiscountsTable::class];
        $this->Discounts = TableRegistry::get('Discounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Discounts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
