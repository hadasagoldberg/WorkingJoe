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
$result = $userproj->delete();

if(!$result) {
    $api->abort(400, 'no se pudo borrar: '.$userproj->id);
}

$api->success([
    'item' => $userproj->toArray()
]);
?>