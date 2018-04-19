<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\EstadoComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\EstadoComponent Test Case
 */
class EstadoComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\EstadoComponent
     */
    public $Estado;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Estado = new EstadoComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estado);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
