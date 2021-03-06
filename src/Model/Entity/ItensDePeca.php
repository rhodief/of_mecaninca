<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItensDePeca Entity
 *
 * @property int $id
 * @property int $ordem_servico_id
 * @property int $peca_id
 * @property int $quatidade
 *
 * @property \App\Model\Entity\OrdemServico $ordem_servico
 * @property \App\Model\Entity\Peca $peca
 */
class ItensDePeca extends Entity
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
        'ordem_servico_id' => true,
        'peca_id' => true,
        'quantidade' => true,
        'ordem_servico' => true,
        'peca' => true
    ];
}
