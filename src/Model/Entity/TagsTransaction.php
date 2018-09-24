<?php

namespace Axm\Budget\Model\Entity;

/**
 * TagsTransaction Entity
 *
 * @property int $id
 * @property int $tag_id
 * @property string $transaction_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Axm\Budget\Model\Entity\Tag $tag
 * @property \Axm\Budget\Model\Entity\Transaction $transaction
 */
class TagsTransaction extends EntityBase
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
        'tag_id' => true,
        'transaction_id' => true,
        'created' => true,
        'modified' => true,
        'tag' => true,
        'transaction' => true
    ];
}
