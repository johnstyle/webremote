<?php

if (!defined('BASEHREF')) {
    define('BASEHREF', './');
}

spl_autoload_register(
    function ($className) {
        if(strstr($className, 'Webremote\\')) {
            $className = str_replace('Webremote\\', '', $className);
            $className = str_replace('\\', '/', $className);
            $filename = realpath(dirname(__FILE__)) . '/' . $className . '.php';
            if(file_exists($filename)) {
                require $filename;
            }
        }
    }
);
