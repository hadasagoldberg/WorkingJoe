<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Logtarea.php';

use knifePHP\models\Logtarea;

$logtarea = new Logtarea();


$logtarea->idlogtarea = $_REQUEST['idlogtarea'];
$logtarea->idusuario = $_REQUEST['idusuario'];
$logtarea->idtarea = $_REQUEST['idtarea'];
$logtarea->horas = $_REQUEST['horas'];
$logtarea->fecha = $_REQUEST['fecha'];
$logtarea->fechainicio = $_REQUEST['fechainicio'];
$logtarea->fechafin = $_REQUEST['fechafin'];

$createdIndex = $logtarea->create();

$api->success([
    'idlogtarea' => $createdIndex
]);
?>