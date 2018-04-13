<?php
use Migrations\AbstractMigration;

class CreateClientes extends AbstractMigration
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
        $table = $this->table('clientes');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('telefone_fixo', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('telefone_celular', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('endereco', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('numero', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('cep', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('cidade', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('uf', 'string', [
            'default' => null,
            'limit' => 255,
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
