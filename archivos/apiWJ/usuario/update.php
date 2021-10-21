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

$usuario->nombre = $_REQUEST['nombre'];
$usuario->apellido = $_REQUEST['apellido'];
$usuario->mail = $_REQUEST['mail'];
$usuario->celular = $_REQUEST['celular'];
$usuario->clave = $_REQUEST['clave'];

$result = $usuario->update();
$usuario->fetch($usuario->idusuario); // update usuario object

$api->success([
    'item' => $usuario->toArray()
]);
?>