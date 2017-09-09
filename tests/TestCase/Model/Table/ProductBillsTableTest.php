<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductBillsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductBillsTable Test Case
 */
class ProductBillsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductBillsTable
     */
    public $ProductBills;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_bills',
        'app.products',
        'app.users',
        'app.roles',
        'app.reset_password_hashes',
        'app.user_old_passwords',
        'app.business_product_categories',
        'app.businesses',
        'app.product_categories',
        'app.product_images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductBills') ? [] : ['className' => ProductBillsTable::class];
        $this->ProductBills = TableRegistry::get('ProductBills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductBills);

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
