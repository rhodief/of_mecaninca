<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pecas Model
 *
 * @property \App\Model\Table\ItensDePacaTable|\Cake\ORM\Association\HasMany $ItensDePaca
 *
 * @method \App\Model\Entity\Peca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Peca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Peca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Peca|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Peca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Peca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Peca findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PecasTable extends Table
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

        $this->setTable('pecas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ItensDePeca', [
            'foreignKey' => 'peca_id'
        ]);
        $this->belongsToMany('OrdensDeServico', [
            'through' => 'ItensDePeca',
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 255)
            ->requirePresence('marca', 'create')
            ->notEmpty('marca');

        $validator
            ->scalar('valor')
            ->maxLength('valor', 255)
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        return $validator;
    }
}
