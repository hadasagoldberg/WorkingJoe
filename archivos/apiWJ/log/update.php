<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Log.php';

use knifePHP\models\Log;


$log = new Log();
$log->idlog = $_REQUEST['idlog'];
$log->fetch($log->idlog);
//$log->fetch($_REQUEST['idlog']);
//echo $log->idlog;
if(!$log->idlog) {
    $api->abort(400, 'idlog no encontrado!');
}


$log->idusuario = $_REQUEST['idusuario'];
$log->fecha = $_REQUEST['fecha'];
$log->bitacora = $_REQUEST['bitacora'];


$result = $log->update();
$log->fetch($log->idlog); // update log object

$api->success([
    'item' => $log->toArray()
]);
?>