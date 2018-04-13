<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtendentesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtendentesTable Test Case
 */
class AtendentesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AtendentesTable
     */
    public $Atendentes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.atendentes',
        'app.funcionarios',
        'app.tecnicos',
        'app.functionarios',
        'app.setors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Atendentes') ? [] : ['className' => AtendentesTable::class];
        $this->Atendentes = TableRegistry::get('Atendentes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Atendentes);

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
