<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Userproj.php';

use knifePHP\models\Userproj;


$userproj = new Userproj();
$userproj->id = $_REQUEST['id'];
$userproj->fetch($userproj->id);
if(!$userproj->id) {
    $api->abort(400, 'id no encontrado!');
}

$userproj->idusuario = $_REQUEST['idusuario'];
$userproj->idproyecto = $_REQUEST['idproyecto'];
$userproj->esadmin = $_REQUEST['esadmin'];

$result = $userproj->update();
$userproj->fetch($userproj->id); // update userproj object

$api->success([
    'item' => $userproj->toArray()
]);
?>