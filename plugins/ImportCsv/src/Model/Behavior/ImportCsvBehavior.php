<?php

namespace ImportCsv\Model\Behavior;

use Cake\ORM\Behavior;

/**
 * ImportCsv behavior
 */
class ImportCsvBehavior extends Behavior
{
    const NAME = 'ImportCsv';

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'fields' => [],
        'type_map' => [],
        'skip_fields' => [
            'id',
            'created',
            'modified'
        ]
    ];

    public function initialize(array $config)
    {
        parent::initialize($config);

        if (!$this->getConfig('fields')) {
            $this->setConfig('fields', $this->buildFieldsList());
        }

        if (!$this->getConfig('type_map')) {
            $this->setConfig('type_map', $this->buildTypeMap());
        }
    }

    public function getCsvFields()
    {
        return $this->getConfig('type_map');
    }

    public function getFieldType(string $field)
    {
        return $this->getTable()->getSchema()->getColumnType($field);
    }

    protected function buildFieldsList() : array
    {
        $all_fields = $this->getTable()->getSchema()->columns();

        return array_diff($all_fields, $this->getConfig('skip_fields'));
    }

    protected function buildTypeMap() : array
    {
        $map = $this->getTable()->getSchema()->typeMap();

        return array_intersect_key($map, array_flip($this->getConfig('fields')));
    }
}
