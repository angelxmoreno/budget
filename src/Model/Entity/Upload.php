<?php

namespace Axm\Budget\Model\Entity;

/**
 * Upload Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $map
 * @property string $file
 * @property int $rows
 * @property int $progress
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $completed
 *
 * @property \Axm\Budget\Model\Entity\User $user
 */
class Upload extends EntityBase
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
        'user_id' => true,
        'map' => true,
        'file' => true,
        'rows' => true,
        'progress' => true,
        'created' => true,
        'modified' => true,
        'completed' => true,
        'user' => true
    ];
}
