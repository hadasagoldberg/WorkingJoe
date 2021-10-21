<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Proyecto.php';

use knifePHP\models\Proyecto;


$proyecto = new Proyecto();
//$proyecto->idproyecto = $_REQUEST['idproyecto'];
$proyecto->fetch($_REQUEST['idproyecto']);
if(!$proyecto->idproyecto) {
    $api->abort(400, 'idproyecto no encontrado!');
}

$proyecto->nombre = $_REQUEST['nombre'];
$proyecto->descripcion = $_REQUEST['descripcion'];
$proyecto->id_usuario_creador = $_REQUEST['id_usuario_creador'];

$result = $proyecto->update();
$proyecto->fetch($proyecto->idproyecto); // update proyecto object

$api->success([
    'item' => $proyecto->toArray()
]);
?>