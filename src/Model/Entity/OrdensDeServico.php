<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Utils\EstadosOs;

/**
 * OrdensDeServico Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $data_abertura
 * @property \Cake\I18n\FrozenTime $data_alteracao
 * @property \Cake\I18n\FrozenTime $data_cancelamento
 * @property \Cake\I18n\FrozenTime $data_finalizacao
 * @property string $situacao
 * @property string $obs
 * @property int $cliente_id
 * @property int $carro_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Carro $carro
 * @property \App\Model\Entity\Faturamento[] $faturamento
 */
class OrdensDeServico extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'data_abertura' => true,
        'data_alteracao' => true,
        'data_cancelamento' => true,
        'data_finalizacao' => true,
        'obs' => true,
        'cliente_id' => true,
        'carro_id' => true,
        'created' => true,
        'modified' => true,
        'cliente' => true,
        'carro' => true,
        'faturamento' => true
    ];

    protected $_virtual = ['estado']; //Precisei colocar para aprecer em Sevicos->OrdensDeServico...

    
    //Virtuals
    protected function _getEstado()
    {
        $situacao = $this->_properties['situacao'];
        $estados = EstadosOs::estados();
        if(isset($estados[$situacao])){
            return $estados[$situacao];
        }
        return 'Situação Inválida';
    }
}
