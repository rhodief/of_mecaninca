<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Setores Model
 *
 * @property \App\Model\Table\ServicosTable|\Cake\ORM\Association\HasMany $Servicos
 * @property \App\Model\Table\TecnicosTable|\Cake\ORM\Association\HasMany $Tecnicos
 *
 * @method \App\Model\Entity\Setor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Setor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SetoresTable extends Table
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

        $this->setTable('setores');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Servicos', [
            'foreignKey' => 'setor_id'
        ]);
        $this->hasMany('Tecnicos', [
            'foreignKey' => 'setor_id'
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
            ->decimal('valor_hora')
            ->requirePresence('valor_hora', 'create')
            ->notEmpty('valor_hora');

        return $validator;
    }
}
