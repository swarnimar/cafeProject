<?php
use Migrations\AbstractMigration;

class CreateUserAppInfos extends AbstractMigration
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
        $table = $this->table('user_app_infos');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('interested_users_visit', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
