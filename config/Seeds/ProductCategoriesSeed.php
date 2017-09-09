<?php
use Migrations\AbstractSeed;

/**
 * ProductCategories seed.
 */
class ProductCategoriesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                'name' => 'Music System',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Crockery',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Kitchen Setup',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Billing System',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Art Work',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Entire Setup',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ]

        ];

        $table = $this->table('product_categories');
        $table->insert($data)->save();
    }
}
