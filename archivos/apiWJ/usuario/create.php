<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Usuario.php';

use knifePHP\models\Usuario;

$usuario = new Usuario();


$usuario->idusuario = $_REQUEST['idusuario'];
$usuario->nombre = $_REQUEST['nombre'];
$usuario->apellido = $_REQUEST['apellido'];
$usuario->mail = $_REQUEST['mail'];
$usuario->celular = $_REQUEST['celular'];
$usuario->clave = $_REQUEST['clave'];

$createdIndex = $usuario->create();

$api->success([
    'id' => $createdIndex
]);
?>