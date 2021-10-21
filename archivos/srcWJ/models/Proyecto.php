<?php
namespace knifePHP\models;

use \DB;
class Proyecto {

    private $tableName = "proyecto";
    public $idproyecto;
    public $nombre;
    public $descripcion;
    public $id_usuario_creador;

    public $tableFields = [
        'idproyecto',
        'nombre',
        'descripcion',
        'id_usuario_creador'
    ];
 
    public function __construct() {
        $this->db = DB::get();
        if(!empty($this->db->connect_error)) {
            throw new \Exception('Connect Error (' . $this->db->connect_errno . ') '. $this->db->connect_error);
        }
    }
	

    function read() {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY idproyecto";
        return DB::query($sql);
    }
	

    function fetch($idproyecto) {
        $row = DB::queryFirstRow("SELECT * FROM " . $this->tableName . " WHERE idproyecto = %d", $idproyecto);

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
            // if($k != 'idproyecto')
                $fields[$k] = $this->{$k};
        }
        return DB::update($this->tableName, $fields, "idproyecto=%d", $this->idproyecto);
    }
	
    function delete() {
        return DB::delete($this->tableName, "idproyecto=%d", $this->idproyecto);
    }

    function toArray() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'idproyecto')
                $fields[$k] = $this->{$k};
        }
        return $fields;
    }
	

}