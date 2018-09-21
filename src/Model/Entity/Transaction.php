<?php

namespace Axm\Budget\Model\Entity;

/**
 * Transaction Entity
 *
 * @property string $id
 * @property int $bank_id
 * @property int $user_id
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $posted
 * @property string $type
 * @property string $subtype
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Axm\Budget\Model\Entity\Bank $bank
 * @property \Axm\Budget\Model\Entity\User $user
 */
class Transaction extends EntityBase
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
        '*' => true
    ];
}
