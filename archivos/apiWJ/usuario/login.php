<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Usuario.php';

use knifePHP\models\Usuario;

$usuario = new Usuario();

$usuario->mail = $_REQUEST['mail'];
$usuario->clave = $_REQUEST['clave'];

$row=$usuario->fetchlogin($usuario->mail, $usuario->clave);


if($row==null) {
    $api->abort(400, 'ingreso incorrecto!');
}else{
    print_r(json_encode($row));
}

/*$api->success([
    echo 'existe!!';
    'item' => $usuario->toArray()
]);*/

?>