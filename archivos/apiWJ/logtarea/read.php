<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Logtarea.php';

use knifePHP\models\Logtarea;

$logtarea = new Logtarea();
 
$results = $logtarea->read();

if (count($results) > 0) {

    $api->success([
        'items' => $results
    ]);
} else {
    $api->abort(400, 'No items found');
}
?>