<?php namespace lib;

include_once __DIR__  . '/ISerializer.php';
use lib\ISerializer;

class BSerializer {
    public static function serialize ($data) {
        $parts = explode(' ', $data['name']);
        return [
            'id' => $data['id'],
            'first_name' => $parts[0],
            'last_name' => $parts[1]
        ];
    }
    public static function deSerialize ($data) {
        return [
            'id' => $data['id'],
            'name' => $data['first_name'] . ' ' . $data['last_name']
        ];

    }
    public static function serializeAPI ($data) {
        return [
            'id' => $data['id'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'create_date' => time()
        ];
    }    
}