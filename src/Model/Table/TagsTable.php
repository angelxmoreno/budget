<?php

namespace Axm\Budget\Model\Table;

use Cake\ORM;
use Cake\Validation\Validator;

/**
 * Tags Model
 *
 * @property \Axm\Budget\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $ParentTags
 * @property \Axm\Budget\Model\Table\TagsTable|\Cake\ORM\Association\HasMany $ChildTags
 * @property \Axm\Budget\Model\Table\TransactionsTable|\Cake\ORM\Association\BelongsToMany $Transactions
 *
 * @method \Axm\Budget\Model\Entity\Tag get($primaryKey, $options = [])
 * @method \Axm\Budget\Model\Entity\Tag newEntity($data = null, array $options = [])
 * @method \Axm\Budget\Model\Entity\Tag[] newEntities(array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Tag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Tag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Axm\Budget\Model\Entity\Tag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Tag[] patchEntities($entities, array $data, array $options = [])
 * @method \Axm\Budget\Model\Entity\Tag findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class TagsTable extends TableBase
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

        $this->setTable('tags');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Tree');
        $this->addBehavior('Muffin/Slug.Slug');

        $this->belongsTo('ParentTags', [
            'className' => 'Tags',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildTags', [
            'className' => 'Tags',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsToMany('Transactions', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'transaction_id',
            'joinTable' => 'tags_transactions'
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 100)
            ->allowEmpty('slug');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentTags'));

        return $rules;
    }

    public function buildTagsForUserId(array $tag_names, $user_id)
    {
        $parent_tag = $this->findOrCreate([
            'name' => 'Root:' . $user_id
        ]);

        $tags = [];
        foreach ($tag_names as $tag_name) {
            $tags[] = $this->findOrCreate([
                'name' => $tag_name,
                'parent_id' => $parent_tag->id
            ]);
        }
        array_unique($tags);

        return $tags;
    }
}
