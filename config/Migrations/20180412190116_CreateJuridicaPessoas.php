<?php
use Migrations\AbstractMigration;

class CreateJuridicaPessoas extends AbstractMigration
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
        $table = $this->table('pessoas_juridicas');
        $table->addColumn('cnpj', 'integer', [
            'default' => null,
            'limit' => 14,
            'null' => false,
        ]);
        $table->addColumn('cliente_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('responsavel', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cpf_responsavel', 'string', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'cnpj',
        ], [
            'name' => 'CNPJ_INDEX',
            'unique' => true,
        ]);
        $table->addIndex([
            'cliente_id',
        ], [
            'name' => 'CLIENTE_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
