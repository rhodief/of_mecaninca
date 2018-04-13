<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tecnico Entity
 *
 * @property int $id
 * @property int $funcionario_id
 * @property int $setor_id
 * @property string $funcao
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 * @property \App\Model\Entity\Setor $setor
 */
class Tecnico extends Entity
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
        'funcionario_id' => true,
        'setor_id' => true,
        'funcao' => true,
        'funcionario' => true,
        'setor' => true
    ];
}
