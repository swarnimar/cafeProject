<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempImagesTable Test Case
 */
class TempImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempImagesTable
     */
    public $TempImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_images',
        'app.users',
        'app.roles',
        'app.products',
        'app.business_product_categories',
        'app.businesses',
        'app.product_categories',
        'app.product_bills',
        'app.product_images',
        'app.interested_users',
        'app.user_app_infos',
        'app.reset_password_hashes',
        'app.user_old_passwords',
        'app.social_profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TempImages') ? [] : ['className' => TempImagesTable::class];
        $this->TempImages = TableRegistry::get('TempImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempImages);

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
