<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Usuario.php';

use knifePHP\models\Usuario;

$usuario = new Usuario();


$usuario->idusuario = $_REQUEST['idusuario'];

$usuario->fetch($usuario->idusuario);
if(!$usuario->idusuario) {
    $api->abort(400, 'idusuario no encontrado!');
}
$result = $usuario->delete();

if(!$result) {
    $api->abort(400, 'no se pudo borrar: '.$usuario->idusuario);
}

$api->success([
    'item' => $usuario->toArray()
]);
?>