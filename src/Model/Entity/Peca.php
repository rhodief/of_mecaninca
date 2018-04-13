<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Peca Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $marca
 * @property string $valor
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ItensDePaca[] $itens_de_paca
 */
class Peca extends Entity
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
        'marca' => true,
        'valor' => true,
        'created' => true,
        'modified' => true,
        'itens_de_paca' => true
    ];
}
