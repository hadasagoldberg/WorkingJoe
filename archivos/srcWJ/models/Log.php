<?php
namespace knifePHP\models;

use \DB;
class Log {

    private $tableName = "log";
    public $idlog;
    public $idusuario;
    public $fecha;
    public $bitacora;

    public $tableFields = [
        'idlog',
        'idusuario',
        'fecha',
        'bitacora'
    ];
 
    public function __construct() {
        $this->db = DB::get();
        if(!empty($this->db->connect_error)) {
            throw new \Exception('Connect Error (' . $this->db->connect_errno . ') '. $this->db->connect_error);
        }
    }
	

    function read() {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY idlog";
        return DB::query($sql);
    }
	

    function fetch($idlog) {
        $row = DB::queryFirstRow("SELECT * FROM " . $this->tableName . " WHERE idlog = %d", $idlog);
        foreach ($row as $k => $v) {
            $this->{$k} = $v;
        }
        return $row;
    }
	

    function create() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            $fields[$k] = $this->{$k};
        }
        DB::insert($this->tableName, $fields);
        return DB::insertId();
    }
	
    function update() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'idlog')
                $fields[$k] = $this->{$k};
        }
        return DB::update($this->tableName, $fields, "idlog=%d", $this->idlog);
    }
	
    function delete() {
        return DB::delete($this->tableName, "idlog=%d", $this->idlog);
    }

    function toArray() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'idlog')
                $fields[$k] = $this->{$k};
        }
        return $fields;
    }
	

}