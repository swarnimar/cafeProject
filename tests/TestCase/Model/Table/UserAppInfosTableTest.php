<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserAppInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserAppInfosTable Test Case
 */
class UserAppInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserAppInfosTable
     */
    public $UserAppInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_app_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserAppInfos') ? [] : ['className' => UserAppInfosTable::class];
        $this->UserAppInfos = TableRegistry::get('UserAppInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserAppInfos);

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
}
