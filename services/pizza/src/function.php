<?php

define('scost',50);
session_start();

function autoloader($class) {
    require_once $class . '.php';
}
spl_autoload_register('autoloader');

$Product = new Product();
$Product->check_sec();

?>
