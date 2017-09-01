<?php

class autoloader {
    
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){

        self::requireFile('Controleur/' . $class . '.php');
        self::requireFile('Modele/' . $class . '.php');
        self::requireFile('Vue/' . $class . '.php');

    }
    
    static function requireFile($filename)
    {
        if (false === file_exists($filename)) {
            return false;
        }
        require $filename;
        return true;
    }
}