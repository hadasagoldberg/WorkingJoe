<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Userproj.php';

use knifePHP\models\Userproj;

$userproj = new Userproj();
 
$results = $userproj->read();

if (count($results) > 0) {

    $api->success([
        'items' => $results
    ]);
} else {
    $api->abort(400, 'No items found');
}
?>