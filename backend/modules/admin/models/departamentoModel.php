<?php

class departamentoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion='1') {
        $roles = $this->_db->query("SELECT dep_key, dep_codigo, dep_nombre, dep_estado FROM dep WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->consultar("UPPER(dep.dep_nombre)=UPPER('{$datos['dep_nombre']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO dep (dep_codigo, dep_nombre, dep_estado) VALUES (:dep_codigo, :dep_nombre, 1)")
                    ->execute(
                            array(
                                ':dep_nombre' => $datos['dep_nombre'],
                                ':dep_codigo' => $datos['dep_codigo']
                            )
            );
        } else {
            $this->actulizar($key[0]['dep_key'], $datos);
        }
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE dep SET dep_codigo = :dep_codigo, dep_nombre = :dep_nombre, dep_estado = 1 
            WHERE dep_key = :dep_key")
                ->execute(
                        array(
                            ':dep_nombre' => $datos['dep_nombre'],
                            ':dep_codigo' => $datos['dep_codigo'],
                            ':dep_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE dep SET dep_estado='0' WHERE dep_key=:dep_key;")
                ->execute(
                        array(
                            ':dep_key' => $key
                        )
        );
    }
    
}

?>