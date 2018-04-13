<?php
use Migrations\AbstractMigration;

class CreateFisicasPessoas extends AbstractMigration
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
        $table = $this->table('pessoas_fisicas');
        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('cliente_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('data_nascimento', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'cpf',
        ], [
            'name' => 'CPF_INDEX',
            'unique' => true,
        ]);
        $table->create();
    }
}
