<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdensDeServicoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdensDeServicoTable Test Case
 */
class OrdensDeServicoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdensDeServicoTable
     */
    public $OrdensDeServico;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ordens_de_servico',
        'app.clientes',
        'app.pessoas_fisicas',
        'app.pessoas_juridicas',
        'app.carros',
        'app.faturamento'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrdensDeServico') ? [] : ['className' => OrdensDeServicoTable::class];
        $this->OrdensDeServico = TableRegistry::get('OrdensDeServico', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrdensDeServico);

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
