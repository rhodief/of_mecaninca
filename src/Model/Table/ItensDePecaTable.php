<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItensDePeca Model
 *
 * @property \App\Model\Table\OrdemServicosTable|\Cake\ORM\Association\BelongsTo $OrdemServicos
 * @property \App\Model\Table\PecasTable|\Cake\ORM\Association\BelongsTo $Pecas
 *
 * @method \App\Model\Entity\ItensDePeca get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItensDePeca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItensDePeca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItensDePeca|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItensDePeca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItensDePeca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItensDePeca findOrCreate($search, callable $callback = null, $options = [])
 */
class ItensDePecaTable extends Table
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

        $this->setTable('itens_de_peca');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('OrdensDeServico', [
            'foreignKey' => 'ordem_servico_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pecas', [
            'foreignKey' => 'peca_id',
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
        $rules->add($rules->existsIn(['peca_id'], 'Pecas'));

        return $rules;
    }
}
