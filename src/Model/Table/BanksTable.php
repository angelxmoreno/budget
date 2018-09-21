<?php

namespace Axm\Budget\Model\Table;

use Cake\ORM;
use Cake\Validation\Validator;

/**
 * Banks Model
 *
 * @property \Axm\Budget\Model\Table\AccountsTable|\Cake\ORM\Association\HasMany $Accounts
 *
 * @method \Axm\Budget\Model\Entity\Bank get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\Bank newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\Bank[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Bank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Bank|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Bank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Bank[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Bank findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BanksTable extends TableBase
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

        $this->setTable('banks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Accounts', [
            'foreignKey' => 'bank_id'
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
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmpty('url');

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

        return $rules;
    }
}
