<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faturamento Model
 *
 * @property \App\Model\Table\OrdensDeServicoTable|\Cake\ORM\Association\BelongsTo $OrdensDeServico
 *
 * @method \App\Model\Entity\Faturamento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Faturamento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Faturamento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Faturamento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faturamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Faturamento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Faturamento findOrCreate($search, callable $callback = null, $options = [])
 */
class FaturamentoTable extends Table
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

        $this->setTable('faturamento');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('OrdensDeServico', [
            'foreignKey' => 'ordem_de_servico_id',
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
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->dateTime('data_pagamento')
            ->allowEmpty('data_pagamento');

        $validator
            ->scalar('forma_pagamento')
            ->maxLength('forma_pagamento', 255)
            ->allowEmpty('forma_pagamento');

        $validator
            ->decimal('desconto')
            ->allowEmpty('desconto');

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
        $rules->add($rules->existsIn(['ordem_de_servico_id'], 'OrdensDeServico'));

        return $rules;
    }
}
