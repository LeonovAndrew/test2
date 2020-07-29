<?php
/**
 * Copyright © 2020 IT PEOPLE
 * https://itpeople.ru
 * desin@itpeople.ru
 *
 * Mobility
 */

$composerAutoload = $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";
if(file_exists($composerAutoload)){
    require_once $composerAutoload;
}
if(!function_exists('env')){
    function env($var, $default=null){
        $dotenv = Dotenv\Dotenv::createMutable($_SERVER['DOCUMENT_ROOT'] . "/../..");
        $dotenv->load();
        $value = getenv($var);
        return $value ? $value : $default;
    }
}