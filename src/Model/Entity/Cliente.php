<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $telefone_fixo
 * @property string $telefone_celular
 * @property string $endereco
 * @property string $numero
 * @property string $cep
 * @property string $cidade
 * @property string $uf
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\OrdensDeServico[] $ordens_de_servico
 * @property \App\Model\Entity\PessoasFisica $pessoas_fisica
 * @property \App\Model\Entity\PessoasJuridica $pessoas_juridica
 */
class Cliente extends Entity
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
        'email' => true,
        'telefone_fixo' => true,
        'telefone_celular' => true,
        'endereco' => true,
        'numero' => true,
        'cep' => true,
        'cidade' => true,
        'uf' => true,
        'created' => true,
        'modified' => true,
        'ordens_de_servico' => true,
        'pessoa_fisica' => true,
        'pessoa_juridica' => true
    ];
}
