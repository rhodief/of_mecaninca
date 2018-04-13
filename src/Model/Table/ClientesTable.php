<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @property \App\Model\Table\OrdensDeServicoTable|\Cake\ORM\Association\HasMany $OrdensDeServico
 * @property \App\Model\Table\PessoasFisicasTable|\Cake\ORM\Association\HasMany $PessoasFisicas
 * @property \App\Model\Table\PessoasJuridicasTable|\Cake\ORM\Association\HasMany $PessoasJuridicas
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('clientes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OrdensDeServico', [
            'foreignKey' => 'cliente_id'
        ]);
        $this->hasOne('PessoasFisicas', [
            'foreignKey' => 'cliente_id'
        ]);
        $this->hasOne('PessoasJuridicas', [
            'foreignKey' => 'cliente_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('telefone_fixo')
            ->maxLength('telefone_fixo', 255)
            ->allowEmpty('telefone_fixo');

        $validator
            ->scalar('telefone_celular')
            ->maxLength('telefone_celular', 255)
            ->allowEmpty('telefone_celular');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->allowEmpty('endereco');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 255)
            ->allowEmpty('numero');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 255)
            ->allowEmpty('cep');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 255)
            ->allowEmpty('cidade');

        $validator
            ->scalar('uf')
            ->maxLength('uf', 255)
            ->allowEmpty('uf');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
