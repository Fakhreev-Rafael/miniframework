<?php

    // includes global settings
    include_once('app/global/global_settings.php');

    // errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // autoload class
    spl_autoload_register(function($class) {
        $path = str_replace('\\', '/', $class.'.php');
        if(file_exists($path)) {
            require $path;
        }
    });

    

?>