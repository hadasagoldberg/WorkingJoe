<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Logtarea.php';

use knifePHP\models\Logtarea;

$logtarea = new Logtarea();


$logtarea->idlogtarea = $_REQUEST['idlogtarea'];

$logtarea->fetch($logtarea->idlogtarea);
if(!$logtarea->idlogtarea) {
    $api->abort(400, 'idlogtarea no encontrado!');
}
$result = $logtarea->delete();

if(!$result) {
    $api->abort(400, 'no se pudo borrar: '.$logtarea->idlogtarea);
}

$api->success([
    'item' => $logtarea->toArray()
]);
?>