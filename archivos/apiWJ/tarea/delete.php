<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Tarea.php';

use knifePHP\models\Tarea;

$tarea = new Tarea();


$tarea->idtarea = $_REQUEST['idtarea'];

$tarea->fetch($tarea->idtarea);
if(!$tarea->idtarea) {
    $api->abort(400, 'idtarea no encontrado!');
}
$result = $tarea->delete();

if(!$result) {
    $api->abort(400, 'no se pudo borrar: '.$tarea->idtarea);
}

$api->success([
    'item' => $tarea->toArray()
]);
?>