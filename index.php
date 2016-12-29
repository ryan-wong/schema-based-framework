<?php

$data = !empty($_GET) ? $_GET : ['id' => 1, 'names' => 'a b'];
$data = !empty($_POST) ? array_merge($data, $_POST) : $data;

include_once  __DIR__  . '/lib/APIHandler.php';
include_once  __DIR__  . '/lib/BSchema.php';
include_once  __DIR__  . '/lib/BService.php';
include_once  __DIR__  . '/lib/Validator.php';

use lib\BSchema;
use lib\BService;
use lib\Validator;
use lib\APIHandler;

$bSchema = new BSchema();
$validator = new Validator();
$bService = new BService();

$controller = new APIHandler($bSchema, $validator, $bService);

echo $controller->handle($data);