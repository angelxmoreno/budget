<?php

namespace Axm\Budget\Model\Table;

use Cake\Database\Schema\TableSchema;
use Cake\ORM;
use Cake\Validation\Validator;

/**
 * Uploads Model
 *
 * @property \Axm\Budget\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Axm\Budget\Model\Entity\Upload get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\Upload newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\Upload[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Upload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Upload|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Upload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Upload[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Upload findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UploadsTable extends TableBase
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

        $this->setTable('uploads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    protected function _initializeSchema(TableSchema $schema)
    {
        $schema->setColumnType('map', 'json');

        return $schema;
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
            ->isArray('map')
            ->requirePresence('map', 'create')
            ->notEmpty('map');

        $validator
            ->scalar('file')
            ->maxLength('file', 255)
            ->requirePresence('file', 'create')
            ->notEmpty('file');

        $validator
            ->nonNegativeInteger('rows')
            ->requirePresence('rows', 'create')
            ->notEmpty('rows');

        $validator
            ->nonNegativeInteger('progress')
            ->allowEmpty('progress');

        $validator
            ->dateTime('completed')
            ->allowEmpty('completed');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
