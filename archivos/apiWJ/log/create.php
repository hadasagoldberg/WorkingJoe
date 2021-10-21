<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Log.php';

use knifePHP\models\Log;

$log = new Log();


$log->idlog = $_REQUEST['idlog'];
$log->idusuario = $_REQUEST['idusuario'];
$log->fecha = $_REQUEST['fecha'];
$log->bitacora = $_REQUEST['bitacora'];

$createdIndex = $log->create();

$api->success([
    'idlog' => $createdIndex
]);
?>