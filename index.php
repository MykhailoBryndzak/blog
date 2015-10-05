<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

//запускаємо сесію
session_start();
define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

function __autoload($class)
{
    $libs = 'libs/' . $class . '.php';
    $models = 'models/' . $class . '.php';
    if (file_exists($libs)) {
        require_once $libs;
    }
    if (file_exists($models)) {
        require_once $models;
    }
}

require_once 'config.php';

$router = new Router();
