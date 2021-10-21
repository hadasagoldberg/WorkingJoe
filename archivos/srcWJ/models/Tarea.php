<?php
namespace knifePHP\models;

use \DB;
class Tarea {

    private $tableName = "tareas";
    public $idtarea;
    public $idproyecto;
    public $nombre;
    public $descripcion;

    public $tableFields = [
        'idtarea',
        'idproyecto',
        'nombre',
        'descripcion'
    ];
 
    public function __construct() {
        $this->db = DB::get();
        if(!empty($this->db->connect_error)) {
            throw new \Exception('Connect Error (' . $this->db->connect_errno . ') '. $this->db->connect_error);
        }
    }
	

    function read() {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY idtarea";
        return DB::query($sql);
    }
	

    function fetch($idtarea) {
        $row = DB::queryFirstRow("SELECT * FROM " . $this->tableName . " WHERE idtarea = %d", $idtarea);

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
            // if($k != 'idtarea')
                $fields[$k] = $this->{$k};
        }
        return DB::update($this->tableName, $fields, "idtarea=%d", $this->idtarea);
    }
	
    function delete() {
        return DB::delete($this->tableName, "idtarea=%d", $this->idtarea);
    }

    function toArray() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'idtarea')
                $fields[$k] = $this->{$k};
        }
        return $fields;
    }
	

}