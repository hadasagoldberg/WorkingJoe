<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Proyecto.php';

use knifePHP\models\Proyecto;

$proyecto = new Proyecto();


$proyecto->idproyecto = $_REQUEST['idproyecto'];
$proyecto->nombre = $_REQUEST['nombre'];
$proyecto->descripcion = $_REQUEST['descripcion'];
$proyecto->id_usuario_creador = $_REQUEST['id_usuario_creador'];

$createdIndex = $proyecto->create();

$api->success([
    'idproyecto' => $createdIndex
]);
?>