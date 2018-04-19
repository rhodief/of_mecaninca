<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * EstadoOS component
 */
class EstadoOSComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    protected $estados = [
        'ABERTA',
        'EM EXECUÇÃO',
        'FINALIZADO'
    ];

    public function estados(){
        return $this->estados;
    }

    public function setEstado($estadoIndex){
        
    }

}
