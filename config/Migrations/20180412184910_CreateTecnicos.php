<?php
use Migrations\AbstractMigration;

class CreateTecnicos extends AbstractMigration
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
        $table = $this->table('tecnicos');
        $table->addColumn('funcionario_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('setor_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('funcao', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
