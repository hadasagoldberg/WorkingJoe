<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Tarea.php';

use knifePHP\models\Tarea;

$tarea = new Tarea();


$tarea->idtarea = $_REQUEST['idtarea'];
$tarea->idproyecto = $_REQUEST['idproyecto'];
$tarea->nombre = $_REQUEST['nombre'];
$tarea->descripcion = $_REQUEST['descripcion'];


$createdIndex = $tarea->create();

$api->success([
    'idtarea' => $createdIndex
]);
?>