<?php

class productoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT pro_key, pro_nombre, pro_descripcion, pro_valor, pro_referencia, pro_estado, 
            imp_key FROM pro WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->consultar("UPPER(pro_nombre)=UPPER('{$datos['pro_nombre']}') AND 
            UPPER(pro_referencia)=UPPER('{$datos['pro_referencia']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO pro (pro_nombre, pro_descripcion, pro_valor, pro_referencia, pro_estado, 
                imp_key) VALUES (:pro_nombre, :pro_descripcion, :pro_valor, :pro_referencia, 1, :imp_key)")
                    ->execute(
                            array(
                                ':pro_nombre' => $datos['pro_nombre'],
                                ':pro_descripcion' => $datos['pro_descripcion'],
                                ':pro_valor' => $datos['pro_valor'],
                                ':pro_referencia' => $datos['pro_referencia'],
                                ':imp_key' => $datos['imp_key']
                            )
            );
            $key = $this->consultar("UPPER(pro_nombre)=UPPER('{$datos['pro_nombre']}') AND 
                UPPER(pro_referencia)=UPPER('{$datos['pro_referencia']}')");
        } else {
            $this->actulizar($key[0]['pro_key'], $datos);
        }
        return $key[0];
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE pro SET pro_nombre = :pro_nombre, pro_descripcion = :pro_descripcion, 
            pro_valor = :pro_valor, pro_referencia = :pro_referencia, pro_estado = 1, imp_key = :imp_key 
            WHERE pro_key = :pro_key")
                ->execute(
                        array(
                            ':pro_nombre' => $datos['pro_nombre'],
                            ':pro_descripcion' => $datos['pro_descripcion'],
                            ':pro_valor' => $datos['pro_valor'],
                            ':pro_referencia' => $datos['pro_referencia'],
                            ':imp_key' => $datos['imp_key'],
                            ':pro_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE pro SET pro_estado='0' WHERE pro_key=:pro_key;")
                ->execute(
                        array(
                            ':pro_key' => $key
                        )
        );
    }

}

?>