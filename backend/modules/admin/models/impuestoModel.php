<?php

class impuestoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT imp_key, imp_nombre, imp_valor, imp_estado FROM imp WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->consultar("UPPER(imp_nombre)=UPPER('{$datos['imp_nombre']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO imp (imp_nombre, imp_valor, imp_estado) VALUES (:imp_nombre, :imp_valor, 1)")
                    ->execute(
                            array(
                                ':imp_nombre' => $datos['imp_nombre'],
                                ':imp_valor' => $datos['imp_valor']
                            )
            );
        } else {
            $this->actulizar($key[0]['imp_key'], $datos);
        }
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE imp SET imp_nombre = :imp_nombre, imp_valor = :imp_valor, imp_estado = 1 
            WHERE imp_key = :imp_key")
                ->execute(
                        array(
                            ':imp_nombre' => $datos['imp_nombre'],
                            ':imp_valor' => $datos['imp_valor'],
                            ':imp_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE imp SET imp_estado='0' WHERE imp_key=:imp_key;")
                ->execute(
                        array(
                            ':imp_key' => $key
                        )
        );
    }

}

?>