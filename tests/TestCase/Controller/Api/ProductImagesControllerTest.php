<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\ProductImagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Api\ProductImagesController Test Case
 */
class ProductImagesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_images',
        'app.products',
        'app.users',
        'app.roles',
        'app.reset_password_hashes',
        'app.user_old_passwords',
        'app.business_product_categories',
        'app.businesses',
        'app.product_categories',
        'app.product_bills'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
