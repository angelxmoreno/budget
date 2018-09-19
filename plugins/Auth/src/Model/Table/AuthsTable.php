<?php

namespace Auth\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Auths Model
 *
 * @method \Auth\Model\Entity\Auth get($primaryKey, $options = [])
 * @method \Auth\Model\Entity\Auth newEntity($data = null, array $options = [])
 * @method \Auth\Model\Entity\Auth[] newEntities(array $data, array $options = [])
 * @method \Auth\Model\Entity\Auth|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Auth\Model\Entity\Auth|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Auth\Model\Entity\Auth patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Auth\Model\Entity\Auth[] patchEntities($entities, array $data, array $options = [])
 * @method \Auth\Model\Entity\Auth findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthsTable extends Table
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

        $this->setTable('auths');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 200)
            ->allowEmpty('password');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
