<?php
header('Content-Type: application/json; charset=UTF-8');
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 1);
require_once('lib/DB.php');
require_once('core/Application.php');

use knifePHP\core\WebServiceApplication;
use \lib\DB;
use \lib\MeekroDB;

$app = new WebServiceApplication();

// Setear configuracion de la db
$app->setDB('b9_28850206_app', 'b9_28850206', 'qto1ZRHvE5cTSpusm2Ql', 'sql311.byethost9.com');

$api = $app->api;
