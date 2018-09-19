<?php

namespace Axm\Budget\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Class EntityBase
 * @package Axm\Budget\Model\Entity
 *
 * @property string $display_field
 */
abstract class EntityBase extends Entity
{
    public function _getDisplayField()
    {
        $table_name = $this->getSource();
        $table = TableRegistry::getTableLocator()->get($table_name);
        $display_field = $table->getDisplayField();

        return $this->get($display_field);
    }
}
