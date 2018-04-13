<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItensDeServico Model
 *
 * @property \App\Model\Table\OrdemServicosTable|\Cake\ORM\Association\BelongsTo $OrdemServicos
 * @property \App\Model\Table\ServicosTable|\Cake\ORM\Association\BelongsTo $Servicos
 *
 * @method \App\Model\Entity\ItensDeServico get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItensDeServico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItensDeServico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItensDeServico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItensDeServico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItensDeServico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItensDeServico findOrCreate($search, callable $callback = null, $options = [])
 */
class ItensDeServicoTable extends Table
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

        $this->setTable('itens_de_servico');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('OrdensDeServico', [
            'foreignKey' => 'ordem_servico_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Servicos', [
            'foreignKey' => 'servico_id',
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
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmpty('quantidade');

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
        $rules->add($rules->existsIn(['ordem_servico_id'], 'OrdensDeServico'));
        $rules->add($rules->existsIn(['servico_id'], 'Servicos'));

        return $rules;
    }
}
