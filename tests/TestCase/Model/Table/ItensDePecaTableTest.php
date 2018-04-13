<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItensDePecaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItensDePecaTable Test Case
 */
class ItensDePecaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItensDePecaTable
     */
    public $ItensDePeca;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.itens_de_peca',
        'app.ordem_servicos',
        'app.pecas',
        'app.itens_de_paca'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItensDePeca') ? [] : ['className' => ItensDePecaTable::class];
        $this->ItensDePeca = TableRegistry::get('ItensDePeca', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItensDePeca);

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
