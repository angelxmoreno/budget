<?php

namespace Axm\Budget\Model\Entity;

/**
 * Account Entity
 *
 * @property int $id
 * @property int $bank_id
 * @property int $user_id
 * @property string $name
 * @property string $account_number
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Axm\Budget\Model\Entity\Bank $bank
 * @property \Axm\Budget\Model\Entity\User $user
 * @property \Axm\Budget\Model\Entity\Transaction[] $transactions
 */
class Account extends EntityBase
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
        'bank_id' => true,
        'user_id' => true,
        'name' => true,
        'account_number' => true,
        'created' => true,
        'modified' => true,
        'bank' => true,
        'user' => true,
        'transactions' => true
    ];
}
