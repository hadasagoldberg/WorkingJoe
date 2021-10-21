<?php
include_once '../../srcWJ/app.php';
include_once '../../srcWJ/models/Usuario.php';

use knifePHP\models\Usuario;

$usuario = new Usuario();
 
$results = $usuario->read();

if (count($results) > 0) {

    $api->success([
        'items' => $results
    ]);
} else {
    $api->abort(400, 'No items found');
}
?>