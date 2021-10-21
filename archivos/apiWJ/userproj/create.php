<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Userproj.php';

use knifePHP\models\Userproj;

$userproj = new Userproj();


$userproj->id = $_REQUEST['id'];
$userproj->idusuario = $_REQUEST['idusuario'];
$userproj->idproyecto = $_REQUEST['idproyecto'];
$userproj->esadmin = $_REQUEST['esadmin'];

$createdIndex = $userproj->create();

$api->success([
    'id' => $createdIndex
]);
?>