<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carro Entity
 *
 * @property int $id
 * @property string $placa
 * @property string $marca
 * @property string $modelo
 * @property string $cor
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\OrdensDeServico[] $ordens_de_servico
 */
class Carro extends Entity
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
        'placa' => true,
        'marca' => true,
        'modelo' => true,
        'cor' => true,
        'created' => true,
        'modified' => true,
        'ordens_de_servico' => true
    ];
}
