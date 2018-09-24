<?php

namespace Axm\Budget\Model\Table;

use Cake\ORM;
use Cake\Validation\Validator;

/**
 * TagsTransactions Model
 *
 * @property \Axm\Budget\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 * @property \Axm\Budget\Model\Table\TransactionsTable|\Cake\ORM\Association\BelongsTo $Transactions
 *
 * @method \Axm\Budget\Model\Entity\TagsTransaction get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\TagsTransaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TagsTransactionsTable extends TableBase
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

        $this->setTable('tags_transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Transactions', [
            'foreignKey' => 'transaction_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param ORM\RulesChecker $rules The rules object to be modified.
     * @return ORM\RulesChecker
     */
    public function buildRules(ORM\RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        $rules->add($rules->existsIn(['transaction_id'], 'Transactions'));

        return $rules;
    }
}
