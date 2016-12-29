<?php namespace lib;

interface ISerializer {
    public static function serialize ($data);
    public static function deSerialize ($data);
    public static function serializeAPI ($data);
}