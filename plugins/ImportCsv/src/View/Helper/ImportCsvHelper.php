<?php

namespace ImportCsv\View\Helper;


use Cake\Utility\Inflector;
use Cake\View\Helper;

/**
 * ImportCsv helper
 *
 * @property Helper\FormHelper $Form
 */
class ImportCsvHelper extends Helper
{
    public $helpers = ['Form'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function fieldDropDown(string $field, array $csv_fields, array $table_fields = [], array $options = [])
    {
//        dd(func_get_args());
        foreach ($csv_fields as $csv_field) {
            if (Inflector::underscore($csv_field) === $field) {
                $options['default'] = $csv_field;
            }
        }
        $options = array_merge([
            'empty' => 'empty',
            'label' => false,
            'options' => $csv_fields,
        ], $options);


        return $this->Form->control($field, $options);
    }
}
