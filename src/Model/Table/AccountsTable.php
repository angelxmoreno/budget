<?php

namespace Axm\Budget\Model\Table;

use Cake\ORM;
use Cake\Validation\Validator;

/**
 * Accounts Model
 *
 * @property \Axm\Budget\Model\Table\BanksTable|\Cake\ORM\Association\BelongsTo $Banks
 * @property \Axm\Budget\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \Axm\Budget\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \Axm\Budget\Model\Entity\Account get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\Account newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\Account[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Account|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Account|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Account patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Account[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Account findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccountsTable extends TableBase
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

        $this->setTable('accounts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'account_id'
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

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('account_number')
            ->maxLength('account_number', 100)
            ->allowEmpty('account_number');

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
        $rules->add($rules->isUnique(['name']));
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
