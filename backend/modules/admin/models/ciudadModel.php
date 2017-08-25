<?php

class ciudadModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT ciu_key, ciu_codigo, ciu_nombre, ciu_estado, dep_key FROM ciu WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
         $this->_db->prepare("INSERT INTO ciu (ciu_codigo, ciu_nombre, ciu_estado, dep_key) VALUES (:ciu_codigo, 
                :ciu_nombre, 1, :dep_key")
                    ->execute(                            array(                                ':ciu_nombre' => $datos['ciu_nombre'],                                ':ciu_codigo' => $datos['ciu_codigo'],                                ':dep_key' => $datos['dep_key']                            )            );    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE ciu SET ciu_codigo = :ciu_codigo, ciu_nombre = :ciu_nombre, ciu_estado = 1, dep_key = :dep_key 
            WHERE ciu_key = :ciu_key")
                ->execute(
                        array(
                            ':ciu_nombre' => $datos['ciu_nombre'],
                            ':ciu_codigo' => $datos['ciu_codigo'],
                            ':dep_key' => $datos['dep_key'],
                            ':ciu_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE ciu SET ciu_estado='0' WHERE ciu_key=:ciu_key;")
                ->execute(
                        array(
                            ':ciu_key' => $key
                        )
        );
    }

}

?>