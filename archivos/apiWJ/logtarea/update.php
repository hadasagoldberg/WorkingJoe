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

$logtarea->idusuario = $_REQUEST['idusuario'];
$logtarea->idtarea = $_REQUEST['idtarea'];
$logtarea->horas = $_REQUEST['horas'];
$logtarea->fecha = $_REQUEST['fecha'];
$logtarea->fechainicio = $_REQUEST['fechainicio'];
$logtarea->fechafin = $_REQUEST['fechafin'];

$result = $logtarea->update();
$logtarea->fetch($logtarea->idlogtarea); // update logtarea object

$api->success([
    'item' => $logtarea->toArray()
]);
?>