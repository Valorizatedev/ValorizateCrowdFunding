<?php

class almacenModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT alm_key, alm_nombre, alm_piso, alm_bloque, alm_local 
            FROM alm WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO alm (alm_nombre, alm_piso, alm_bloque, alm_local, alm_estado) 
                VALUES (:alm_nombre, :alm_piso, :alm_bloque, :alm_local, 1)")
                ->execute(
                        array(
                            ':alm_nombre' => $datos['alm_nombre'],
                            ':alm_piso' => $datos['alm_piso'],
                            ':alm_bloque' => $datos['alm_bloque'],
                            ':alm_local' => $datos['alm_local']
                        )
        );
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE alm SET alm_nombre = :alm_nombre, alm_piso = :alm_piso, 
            alm_bloque = :alm_bloque, alm_local = :alm_local, alm_estado = 1 WHERE alm_key = :alm_key")
                ->execute(
                        array(
                            ':alm_nombre' => $datos['alm_nombre'],
                            ':alm_piso' => $datos['alm_piso'],
                            ':alm_bloque' => $datos['alm_bloque'],
                            ':alm_local' => $datos['alm_local'],
                            ':alm_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE alm SET alm_estado='0' WHERE alm_key=:alm_key")
                ->execute(
                        array(
                            ':alm_key' => $key
                        )
        );
    }

}

?>