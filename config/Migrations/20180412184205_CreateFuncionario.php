<?php
use Migrations\AbstractMigration;

class CreateFuncionario extends AbstractMigration
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
        $table = $this->table('funcionarios');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('data_admissao', 'datetime', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('data_desligamento', 'datetime', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
