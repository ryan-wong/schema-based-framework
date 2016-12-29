<?php namespace lib;

class ValidatorObject {

    private $_condition = true;
    private $_errors = [];

    public function __construct($valid, $errors) {
        $this->_condition = $valid;
        $this->_errors = $errors;
    }

    public function getError () {
        return $this->_errors;
    }

    public function isValid () {
        return $this->_condition;
    }
}