<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItensDeServicoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItensDeServicoTable Test Case
 */
class ItensDeServicoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItensDeServicoTable
     */
    public $ItensDeServico;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.itens_de_servico',
        'app.ordem_servicos',
        'app.servicos',
        'app.setores',
        'app.tecnicos',
        'app.funcionarios',
        'app.atendentes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItensDeServico') ? [] : ['className' => ItensDeServicoTable::class];
        $this->ItensDeServico = TableRegistry::get('ItensDeServico', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItensDeServico);

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
