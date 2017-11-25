<?php
use Migrations\AbstractMigration;

class AddShowContactInfoToProducts extends AbstractMigration
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
        $table->addColumn('show_contact_info', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->update();
    }
}
