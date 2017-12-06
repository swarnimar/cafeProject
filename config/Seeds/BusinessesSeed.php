<?php
use Migrations\AbstractSeed;

/**
 * Businesses seed.
 */
class BusinessesSeed extends AbstractSeed
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
                'name' => 'Cafe & Lounge',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Fine Dining',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Banquet',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Salon',
                'created' => date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ]

        ];

        $table = $this->table('businesses');
        $table->insert($data)->save();
    }
}
