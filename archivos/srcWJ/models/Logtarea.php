<?php
namespace knifePHP\models;

use \DB;
class Logtarea {

    private $tableName = "logtarea";
    public $idlogtarea;
    public $idusuario;
    public $idtarea;
    public $horas;
    public $fecha;
    public $fechainicio;
    public $fechafin;

    public $tableFields = [
        'idlogtarea',
        'idusuario',
        'idtarea',
        'horas',
        'fecha',
        'fechainicio',
        'fechafin'
    ];
 
    public function __construct() {
        $this->db = DB::get();
        if(!empty($this->db->connect_error)) {
            throw new \Exception('Connect Error (' . $this->db->connect_errno . ') '. $this->db->connect_error);
        }
    }
	

    function read() {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY idlogtarea";
        return DB::query($sql);
    }
	

    function fetch($idlogtarea) {
        $row = DB::queryFirstRow("SELECT * FROM " . $this->tableName . " WHERE idlogtarea = %d", $idlogtarea);

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
            // if($k != 'idlogtarea')
                $fields[$k] = $this->{$k};
        }
        return DB::update($this->tableName, $fields, "idlogtarea=%d", $this->idlogtarea);
    }
	
    function delete() {
        return DB::delete($this->tableName, "idlogtarea=%d", $this->idlogtarea);
    }

    function toArray() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'idlogtarea')
                $fields[$k] = $this->{$k};
        }
        return $fields;
    }
	

}