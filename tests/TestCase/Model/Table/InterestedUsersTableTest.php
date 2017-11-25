<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterestedUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterestedUsersTable Test Case
 */
class InterestedUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InterestedUsersTable
     */
    public $InterestedUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.interested_users',
        'app.users',
        'app.roles',
        'app.products',
        'app.business_product_categories',
        'app.businesses',
        'app.product_categories',
        'app.product_bills',
        'app.product_images',
        'app.reset_password_hashes',
        'app.user_old_passwords'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InterestedUsers') ? [] : ['className' => InterestedUsersTable::class];
        $this->InterestedUsers = TableRegistry::get('InterestedUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InterestedUsers);

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
