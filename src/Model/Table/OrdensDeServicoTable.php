<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdensDeServico Model
 *
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\CarrosTable|\Cake\ORM\Association\BelongsTo $Carros
 * @property \App\Model\Table\FaturamentoTable|\Cake\ORM\Association\HasMany $Faturamento
 *
 * @method \App\Model\Entity\OrdensDeServico get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdensDeServico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdensDeServico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdensDeServico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdensDeServico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdensDeServico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdensDeServico findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdensDeServicoTable extends Table
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

        $this->setTable('ordens_de_servico');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Carros', [
            'foreignKey' => 'carro_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('Faturamento', [
            'foreignKey' => 'ordem_de_servico_id'
        ]);
        $this->belongsToMany('Servicos', [
            'through' => 'ItensDeServico',
            'foreignKey' => 'ordem_servico_id'
        ]);
        
        $this->belongsToMany('Pecas', [
            'through' => 'ItensDePeca',
            'foreignKey' => 'ordem_servico_id'
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
            ->dateTime('data_abertura')
            ->requirePresence('data_abertura', 'create')
            ->notEmpty('data_abertura');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmpty('data_alteracao');

        $validator
            ->dateTime('data_cancelamento')
            ->allowEmpty('data_cancelamento');

        $validator
            ->dateTime('data_finalizacao')
            ->allowEmpty('data_finalizacao');

        $validator
            ->integer('situacao')
            ->requirePresence('situacao', 'create')
            ->notEmpty('situacao');

        $validator
            ->scalar('obs')
            ->allowEmpty('obs');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['carro_id'], 'Carros'));

        return $rules;
    }
}
