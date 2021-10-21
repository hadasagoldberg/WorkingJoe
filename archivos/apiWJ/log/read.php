<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Log.php';

use knifePHP\models\Log;

$log = new Log();
 
$results = $log->read();

if (count($results) > 0) {

    $api->success([
        'items' => $results
    ]);
} else {
    $api->abort(400, 'No items found');
}
?>