<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaturamentoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaturamentoTable Test Case
 */
class FaturamentoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FaturamentoTable
     */
    public $Faturamento;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.faturamento',
        'app.ordens_de_servico',
        'app.clientes',
        'app.pessoas_fisicas',
        'app.pessoas_juridicas',
        'app.carros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Faturamento') ? [] : ['className' => FaturamentoTable::class];
        $this->Faturamento = TableRegistry::get('Faturamento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Faturamento);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
