<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tecnicos Model
 *
 * @property \App\Model\Table\FuncionariosTable|\Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \App\Model\Table\SetorsTable|\Cake\ORM\Association\BelongsTo $Setors
 *
 * @method \App\Model\Entity\Tecnico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tecnico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tecnico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tecnico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tecnico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tecnico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tecnico findOrCreate($search, callable $callback = null, $options = [])
 */
class TecnicosTable extends Table
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

        $this->setTable('tecnicos');
        $this->setDisplayField('funcao');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Setores', [
            'foreignKey' => 'setor_id',
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
            ->scalar('funcao')
            ->maxLength('funcao', 255)
            ->requirePresence('funcao', 'create')
            ->notEmpty('funcao');

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
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));
        $rules->add($rules->existsIn(['setor_id'], 'Setores'));
        $rules->add($rules->isUnique(['funcionario_id']));

        return $rules;
    }
}
