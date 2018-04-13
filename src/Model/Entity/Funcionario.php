<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Funcionario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property \Cake\I18n\FrozenTime $data_admissao
 * @property \Cake\I18n\FrozenTime $data_desligamento
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Atendente $atendente
 * @property \App\Model\Entity\Tecnico $tecnico
 */
class Funcionario extends Entity
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
        'nome' => true,
        'cpf' => true,
        'data_admissao' => true,
        'data_desligamento' => true,
        'created' => true,
        'modified' => true,
        'atendente' => true,
        'tecnico' => true
    ];
}
