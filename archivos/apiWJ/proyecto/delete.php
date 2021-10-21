<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Proyecto.php';

use knifePHP\models\Proyecto;

$proyecto = new Proyecto();


$proyecto->idproyecto = $_REQUEST['idproyecto'];

$proyecto->fetch($proyecto->idproyecto);
if(!$proyecto->idproyecto) {
    $api->abort(400, 'idproyecto no encontrado!');
}
$result = $proyecto->delete();

if(!$result) {
    $api->abort(400, 'no se pudo borrar: '.$proyecto->idproyecto);
}

$api->success([
    'item' => $proyecto->toArray()
]);
?>