<?php
namespace QueryFields\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * QueryFields behavior
 */
class QueryFieldsBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'fields' => []
    ];
}
