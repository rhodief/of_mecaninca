<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicosTable Test Case
 */
class ServicosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicosTable
     */
    public $Servicos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicos',
        'app.setores',
        'app.tecnicos',
        'app.funcionarios',
        'app.atendentes',
        'app.itens_de_servico'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Servicos') ? [] : ['className' => ServicosTable::class];
        $this->Servicos = TableRegistry::get('Servicos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicos);

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
