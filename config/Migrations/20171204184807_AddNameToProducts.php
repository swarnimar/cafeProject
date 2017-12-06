<?php
use Migrations\AbstractMigration;

class AddNameToProducts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('products');
        $table->addColumn('name', 'string', [
            'default' => 'Untitled',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
