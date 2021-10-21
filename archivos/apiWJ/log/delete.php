<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Log.php';

use knifePHP\models\Log;

$log = new Log();


$log->idlog = $_REQUEST['idlog'];

$log->fetch($log->idlog);
if(!$log->idlog) {
    $api->abort(400, 'idlog no encontrado!');
}
$result = $log->delete();

if(!$result) {
    $api->abort(400, 'no se pudo borrar: '.$log->idlog);
}

$api->success([
    'item' => $log->toArray()
]);
?>