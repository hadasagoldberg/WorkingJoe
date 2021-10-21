<?php
namespace knifePHP\models;

use \DB;
class Usuario {

    private $tableName = "usuario";
    public $idusuario;
    public $nombre;
    public $apellido;
    public $mail;
    public $celular;
    public $clave;

    public $tableFields = [
        'idusuario',
        'nombre',
        'apellido',
        'mail',
        'celular',
        'clave'
    ];
 
    public function __construct() {
        $this->db = DB::get();
        if(!empty($this->db->connect_error)) {
            throw new \Exception('Connect Error (' . $this->db->connect_errno . ') '. $this->db->connect_error);
        }
    }
	

    function read() {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY idusuario";
        return DB::query($sql);
    }
	

    function fetch($idusuario) {
        $row = DB::queryFirstRow("SELECT * FROM " . $this->tableName . " WHERE idusuario = %d", $idusuario);

        foreach ($row as $k => $v) {
            $this->{$k} = $v;
        }
        return $row;
    }

    function fetchlogin($mail, $clave) {
        //echo $mail;
        //echo $clave;
        
        $row = DB::queryFirstRow("SELECT * FROM usuario where clave=%s" , $clave , " and mail=%s", $mail);
        //$row = DB::queryFirstRow("SELECT * FROM usuario where clave=%s" , $clave);


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
            // if($k != 'idusuario')
                $fields[$k] = $this->{$k};
        }
        return DB::update($this->tableName, $fields, "idusuario=%d", $this->idusuario);
    }
	
    function delete() {
        return DB::delete($this->tableName, "idusuario=%d", $this->idusuario);
    }

    function toArray() {
        $fields = [];
        foreach ($this->tableFields as $k) {
            // if($k != 'idusuario')
                $fields[$k] = $this->{$k};
        }
        return $fields;
    }
	

}