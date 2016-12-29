<?php namespace lib;

class BaseSchema {
    protected $_schema = [];
    public static $NUMBER = 'Int';
    public static $TEXT = 'Text';
    public static $FLOAT = 'Float';
    public static $BOOLEAN = 'Boolean';

    public function __construct() {
        $this->_addPrimativeProperty('id',['type' => self::$NUMBER]);
    }

    protected function _addPrimativeProperty ($name, $options = []) {
        if (!$name) {
            throw new Exception('Missing Primative Name');
        }
        $this->_schema[$name] = [
            'title' => !empty($options['title']) ? $options['title'] : null,
            'type' => !empty($options['type']) ? $options['type'] : null,
            'default' => !empty($options['default']) ? $options['default'] : null,
            'required' => !empty($options['required']) ? $options['required'] : false,
            'validation' => !empty($options['validation']) ? $options['validation'] : ''
        ];
    }

    protected function _addRefProperty ($name, $reference, $options = []) {
        if (!$name) {
            throw new Exception('Missing Primative Name');
        }
        if (!$reference) {
            throw new Exception('Missing Reference');
        }
        
        $this->_schema[$name] = [
            'title' => !empty($options['title']) ? $options['title'] : null,
            'type' => null,
            'ref' => $reference,
            'default' => !empty($options['default']) ? $options['default'] : null,
            'required' => !empty($options['required']) ? $options['required'] : false,
            'validation' => !empty($options['validation']) ? $options['validation'] : ''
        ];
    }  

    public function getSchema () {
        return $this->_schema;
    }  
}