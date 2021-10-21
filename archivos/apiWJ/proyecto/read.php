<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Proyecto.php';

use knifePHP\models\Proyecto;

$proyecto = new Proyecto();
 
$results = $proyecto->read();

if (count($results) > 0) {

    $api->success([
        'items' => $results
    ]);
} else {
    $api->abort(400, 'No items found');
}
?>