<?php

namespace Axm\Budget\Model\Table;

use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Axm\Budget\Model\Table\AccountsTable|\Cake\ORM\Association\HasMany $Accounts
 * @property \Axm\Budget\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \Axm\Budget\Model\Entity\User get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends TableBase
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Accounts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'user_id'
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
            ->notEmpty('name');

        return $validator;
    }
}
