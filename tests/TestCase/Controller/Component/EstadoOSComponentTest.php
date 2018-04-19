<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\EstadoOSComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\EstadoOSComponent Test Case
 */
class EstadoOSComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\EstadoOSComponent
     */
    public $EstadoOS;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->EstadoOS = new EstadoOSComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EstadoOS);

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
