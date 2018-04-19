<?php
use Migrations\AbstractMigration;

class CreateOrdemServico extends AbstractMigration
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
        $table = $this->table('ordens_de_servico');
        $table->addColumn('data_abertura', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('data_alteracao', 'datetime', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('data_cancelamento', 'datetime', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('data_finalizacao', 'datetime', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('situacao', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('obs', 'text', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('cliente_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('carro_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
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
