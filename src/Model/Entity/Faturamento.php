<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Faturamento Entity
 *
 * @property int $id
 * @property int $ordem_de_servico_id
 * @property string $status
 * @property \Cake\I18n\FrozenTime $data_pagamento
 * @property string $forma_pagamento
 * @property float $desconto
 *
 * @property \App\Model\Entity\OrdensDeServico $ordens_de_servico
 */
class Faturamento extends Entity
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
        'ordem_de_servico_id' => true,
        'status' => true,
        'data_pagamento' => true,
        'forma_pagamento' => true,
        'desconto' => true,
        'ordens_de_servico' => true
    ];
}
