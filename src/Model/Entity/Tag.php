<?php

namespace Axm\Budget\Model\Entity;

/**
 * Tag Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Axm\Budget\Model\Entity\ParentTag $parent_tag
 * @property \Axm\Budget\Model\Entity\ChildTag[] $child_tags
 * @property \Axm\Budget\Model\Entity\Transaction[] $transactions
 */
class Tag extends EntityBase
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'created' => true,
        'modified' => true,
        'parent_tag' => true,
        'child_tags' => true,
        'transactions' => true
    ];
}
