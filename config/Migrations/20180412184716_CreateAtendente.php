<?php
use Migrations\AbstractMigration;

class CreateAtendente extends AbstractMigration
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
        $table = $this->table('atendentes');
        $table->addColumn('funcionario_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('cargo', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
