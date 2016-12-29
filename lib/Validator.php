<?php namespace lib;

include_once __DIR__  . '/ValidationObject.php';
include_once __DIR__  . '/BaseSchema.php';

use lib\ValidatorObject;
use lib\BaseSchema;

class Validator {
    public function __construct() {

    }

    public function processObject ($schema, $payload) {
        $valid = true;
        $errors = [];

        foreach ($schema->getSchema() as $field => $attribute) {
            $valid = $this->_validType($field, $payload, $attribute['type'], $attribute['required'], $valid, $errors);
        }
        return new ValidatorObject($valid, $errors);
    }

    protected function _validType ($field, $data, $type, $required, $valid, &$errors) {
        if (!$required) {
            return $valid && true;
        }

        if (!array_key_exists($field, $data)) {
            $errors[$field]['messages'][] = "$field is required";
            return $valid && false;
        }

        switch ($type) {
            case BaseSchema::$NUMBER:
                if (!is_int($data[$field])){
                    $errors[$field]['messages'][] = "$field is not an integer";
                    return $valid && false;                    
                }
                break;
            case BaseSchema::$TEXT:
                if (!is_string($data[$field])){
                    $errors[$field]['messages'][] = "$field is not a string";
                    return $valid && false;                    
                }
                break;
            case BaseSchema::$FLOAT:
                if (!is_float($data[$field])){
                    $errors[$field]['messages'][] = "$field is not a float";
                    return $valid && false;                    
                }
                break;
            case BaseSchema::$BOOLEAN:
                if (!is_bool($data[$field])){
                    $errors[$field]['messages'][] = "$field is not a boolean";
                    return $valid && false;                    
                }
                break;
            
            default:
                break;
        }

        return $valid;
    }
}