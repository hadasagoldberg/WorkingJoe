<?php
namespace knifePHP\models;

use \DB;
class Userproj {

    private $tableName = "userproj";
    public $id;
    public $idusuario;
    public $idproyecto;
    public $esadmin;

    public $tableFields = [
        'id',
        'idusuario',
        'idproyecto',
        'esadmin'
    ];
 
    public function __construct() {
        $this->db = DB::get();
        if(!empty($this->db->connect_error)) {
            throw new \Exception('Connect Error (' . $this->db->connect_errno . ') '. $this->db->connect_error);
        }
    }
	

    function read() {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY id";
        return DB::query($sql);
    }
	

    function fetch($id) {
        $row = DB::queryFirstRow("SELECT * FROM " . $this->tableName . " WHERE id = %d", $id);

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
            // if($k != 'id')
                $fields[$k] = $this->{$k};
        }
        return DB::update($this->tableName, $fields, "id=%d", $this->id);
    }
	
    function delete() {
        return DB::delete($this->tableName, "id=%d", $this->id);
    }

    function toArray() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'id')
                $fields[$k] = $this->{$k};
        }
        return $fields;
    }
	

}