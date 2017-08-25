<?php

class eventoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT eve_key, eve_nombre, eve_fecha, eve_descripcion, eve_estado FROM eve 
            WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO eve (eve_nombre, eve_fecha, eve_descripcion, eve_estado) 
                VALUES (:eve_nombre, :eve_fecha, :eve_descripcion, 1)")
                ->execute(
                        array(
                            ':eve_nombre' => $datos['eve_nombre'],
                            ':eve_fecha' => $datos['eve_fecha'],
                            ':eve_descripcion' => $datos['eve_descripcion']
                        )
        );
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE eve SET eve_nombre = :eve_nombre, eve_fecha = :eve_fecha, 
            eve_descripcion = :eve_descripcion, eve_estado = 1 WHERE eve_key = :eve_key")
                ->execute(
                        array(
                            ':eve_nombre' => $datos['eve_nombre'],
                            ':eve_fecha' => $datos['eve_fecha'],
                            ':eve_descripcion' => $datos['eve_descripcion'],
                            ':eve_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE eve SET eve_estado='0' WHERE eve_key=:eve_key")
                ->execute(
                        array(
                            ':eve_key' => $key
                        )
        );
    }

}

?>