<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carros Model
 *
 * @property \App\Model\Table\OrdensDeServicoTable|\Cake\ORM\Association\HasMany $OrdensDeServico
 *
 * @method \App\Model\Entity\Carro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Carro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carro findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarrosTable extends Table
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

        $this->setTable('carros');
        $this->setDisplayField('placa');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OrdensDeServico', [
            'foreignKey' => 'carro_id'
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
            ->scalar('placa')
            ->maxLength('placa', 255)
            ->requirePresence('placa', 'create')
            ->notEmpty('placa');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 255)
            ->requirePresence('marca', 'create')
            ->notEmpty('marca');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 255)
            ->requirePresence('modelo', 'create')
            ->notEmpty('modelo');

        $validator
            ->scalar('cor')
            ->maxLength('cor', 255)
            ->requirePresence('cor', 'create')
            ->notEmpty('cor');

        return $validator;
    }
}
