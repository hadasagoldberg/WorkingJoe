<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Tarea.php';

use knifePHP\models\Tarea;

$tarea = new Tarea();
 
$results = $tarea->read();

if (count($results) > 0) {

    $api->success([
        'items' => $results
    ]);
} else {
    $api->abort(400, 'No items found');
}
?>