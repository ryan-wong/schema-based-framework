<?php namespace lib;
include_once __DIR__  . '/APIResponse.php';
include_once __DIR__  . '/BSerializer.php';

use lib\APIResponse as APIResponse;
use lib\BSerializer as BSerializer;

class APIHandler {
    protected $_schema;
    protected $_validator;
    protected $_service;

    public function __construct ($schema, $validator, $service) {
        $this->_schema = $schema;
        $this->_validator = $validator;
        $this->_service = $service;
    }

    public function handle($request) {
        $processObject = $this->_validator->processObject($this->_schema, $request);
        if (!$processObject->isValid()){
            return APIResponse::response422(APIResponse::$VALIDATION_ERROR, $processObject->getError());
        }        

        $dto = BSerializer::serialize($request);

        $result = $this->_service->save($dto);

        return APIResponse::response200(BSerializer::serializeAPI($result));

    }
}