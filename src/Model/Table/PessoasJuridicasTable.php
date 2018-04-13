<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PessoasJuridicas Model
 *
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 *
 * @method \App\Model\Entity\PessoasJuridica get($primaryKey, $options = [])
 * @method \App\Model\Entity\PessoasJuridica newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PessoasJuridica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PessoasJuridica|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PessoasJuridica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PessoasJuridica[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PessoasJuridica findOrCreate($search, callable $callback = null, $options = [])
 */
class PessoasJuridicasTable extends Table
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

        $this->setTable('pessoas_juridicas');
        $this->setDisplayField('cnpj');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
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
            ->integer('cnpj')
            ->requirePresence('cnpj', 'create')
            ->notEmpty('cnpj')
            ->add('cnpj', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('responsavel')
            ->maxLength('responsavel', 255)
            ->requirePresence('responsavel', 'create')
            ->notEmpty('responsavel');

        $validator
            ->scalar('cpf_responsavel')
            ->maxLength('cpf_responsavel', 11)
            ->requirePresence('cpf_responsavel', 'create')
            ->notEmpty('cpf_responsavel');

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
        $rules->add($rules->isUnique(['cnpj']));
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));

        return $rules;
    }
}
