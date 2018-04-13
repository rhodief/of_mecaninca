<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Servico Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $setor_id
 * @property int $horas
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Setor $setor
 * @property \App\Model\Entity\ItensDeServico[] $itens_de_servico
 */
class Servico extends Entity
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
        'descricao' => true,
        'setor_id' => true,
        'horas' => true,
        'created' => true,
        'modified' => true,
        'setor' => true,
        'itens_de_servico' => true
    ];
}
