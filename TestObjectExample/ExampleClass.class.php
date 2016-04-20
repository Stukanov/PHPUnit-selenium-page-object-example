<?php
class ExampleClass
{
    private static $_instance = null;

    private function __clone()
    {
    }

    private function __construct()
    {
    }

    static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new ExampleClass();
        }
        return self::$_instance;
    }

    function show($name)
    {
        return "<h1>This $name was called from singleton</h1>";
    }
}