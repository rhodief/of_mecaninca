<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicos Model
 *
 * @property \App\Model\Table\SetoresTable|\Cake\ORM\Association\BelongsTo $Setores
 * @property \App\Model\Table\ItensDeServicoTable|\Cake\ORM\Association\HasMany $ItensDeServico
 *
 * @method \App\Model\Entity\Servico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servico findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServicosTable extends Table
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

        $this->setTable('servicos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Setores', [
            'foreignKey' => 'setor_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('ItensDeServico', [
            'foreignKey' => 'servico_id'
        ]);
        
        $this->belongsToMany('OrdensDeServico', [
            'through' => 'ItensDeServico',
            'targetForeignKey' => 'ordem_servico_id'
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
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->integer('horas')
            ->requirePresence('horas', 'create')
            ->notEmpty('horas');

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
        $rules->add($rules->existsIn(['setor_id'], 'Setores'));

        return $rules;
    }
}
