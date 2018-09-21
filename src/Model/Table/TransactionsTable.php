<?php

namespace Axm\Budget\Model\Table;

use Axm\Budget\Model\Entity\Transaction;
use Cake\ORM;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \Axm\Budget\Model\Table\BanksTable|\Cake\ORM\Association\BelongsTo $Banks
 * @property \Axm\Budget\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Axm\Budget\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends TableBase
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

        $this->setTable('transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('ImportCsv.ImportCsv', [
            'skip_fields' => [
                'id',
                'user_id',
                'bank_id',
                'created',
                'modified'
            ]
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
            ->uuid('id')
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->dateTime('posted')
            ->requirePresence('posted', 'create')
            ->notEmpty('posted');

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->allowEmpty('type');

        $validator
            ->scalar('subtype')
            ->maxLength('subtype', 100)
            ->allowEmpty('subtype');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function createUuid(Transaction $transaction)
    {
        $values = $transaction->toArray();
        ksort($values);
        $serialized = serialize($values);
        $md5 = md5($serialized);
        $uuid = substr($md5, 0, 8) . '-' .
            substr($md5, 8, 4) . '-' .
            substr($md5, 12, 4) . '-' .
            substr($md5, 16, 4) . '-' .
            substr($md5, 20);

        return $uuid;
    }
}
