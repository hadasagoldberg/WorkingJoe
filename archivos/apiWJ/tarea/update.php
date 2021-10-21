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

$tarea->idproyecto = $_REQUEST['idproyecto'];
$tarea->nombre = $_REQUEST['nombre'];
$tarea->descripcion = $_REQUEST['descripcion'];


$result = $tarea->update();
$tarea->fetch($tarea->idtarea); // update tarea object

$api->success([
    'item' => $tarea->toArray()
]);
?>