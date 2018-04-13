<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PessoasJuridica Entity
 *
 * @property int $id
 * @property int $cnpj
 * @property int $cliente_id
 * @property string $responsavel
 * @property string $cpf_responsavel
 *
 * @property \App\Model\Entity\Cliente $cliente
 */
class PessoasJuridica extends Entity
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
        'cnpj' => true,
        'cliente_id' => true,
        'responsavel' => true,
        'cpf_responsavel' => true,
        'cliente' => true
    ];
}
