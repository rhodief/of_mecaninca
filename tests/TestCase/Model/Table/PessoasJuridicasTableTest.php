<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasJuridicasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasJuridicasTable Test Case
 */
class PessoasJuridicasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasJuridicasTable
     */
    public $PessoasJuridicas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas_juridicas',
        'app.clientes',
        'app.ordens_de_servico',
        'app.pessoas_fisicas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PessoasJuridicas') ? [] : ['className' => PessoasJuridicasTable::class];
        $this->PessoasJuridicas = TableRegistry::get('PessoasJuridicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PessoasJuridicas);

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
