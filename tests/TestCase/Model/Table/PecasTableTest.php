<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PecasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PecasTable Test Case
 */
class PecasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PecasTable
     */
    public $Pecas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Pecas') ? [] : ['className' => PecasTable::class];
        $this->Pecas = TableRegistry::get('Pecas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pecas);

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
}
