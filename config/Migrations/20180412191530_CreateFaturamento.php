<?php
use Migrations\AbstractMigration;

class CreateFaturamento extends AbstractMigration
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
        $table = $this->table('faturamento');
        $table->addColumn('ordem_de_servico_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);

        $table->addColumn('status', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('data_pagamento', 'datetime', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('forma_pagamento', 'string', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('desconto', 'decimal', [
            'default' => null,
            'limit' => '13,2',
            'null' => true,
        ]);
        $table->create();
    }
}
