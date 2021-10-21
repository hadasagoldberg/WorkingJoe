<?php
namespace knifePHP\core;

require_once('API.php');

use \DB;
class WebServiceApplication
{
    public function __construct()
    {
		$this->api = new API();
    }

    public function setDB($databaseName, $user, $password, $ipAddress, $port = null)
    {
        
		
		DB::$encoding = 'utf8';

        DB::$dbName = $databaseName;
        DB::$user = $user;
        DB::$password = $password;
        
        DB::$host = $ipAddress;
        DB::$port = $port;

        DB::$error_handler = array($this, 'handleSQLException');
        DB::$throw_exception_on_error = false;
        DB::$throw_exception_on_nonsql_error = false;
    }


    public function handleSQLException($params)
    {
        $this->api->abort(500, $params['error']);
        exit;
    }
}