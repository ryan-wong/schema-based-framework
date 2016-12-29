<?php namespace lib;

include_once __DIR__  . '/BaseSchema.php';
use lib\BaseSchema;

class BSchema extends BaseSchema {
    protected $_schema = [];

    public function __construct() {
        parent::__construct();
        $this->_addPrimativeProperty('name',[
            'type' => parent::$TEXT,
            'required' => true,
            'validation' => 'min:1'
        ]);
        $this->_addPrimativeProperty('title',[
            'type' => parent::$TEXT,
            'required' => true,
            'validation' => 'min:1'
        ]);
    }
}
