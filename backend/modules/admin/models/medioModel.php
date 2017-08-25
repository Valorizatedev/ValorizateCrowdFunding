<?php

class medioModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT med_key, med_nombre, med_estado FROM med WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->consultar("UPPER(med_nombre)=UPPER('{$datos['med_nombre']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO med (med_nombre, med_estado) VALUES (:med_nombre, 1)")
                    ->execute(
                            array(
                                ':med_nombre' => $datos['med_nombre']
                            )
            );
        } else {
            $this->actulizar($key[0]['med_key'], $datos);
        }
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE med SET med_nombre = :med_nombre, med_estado = 1 WHERE med_key = :med_key")
                ->execute(
                        array(
                            ':med_nombre' => $datos['med_nombre'],
                            ':med_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE med SET med_estado='0' WHERE med_key=:med_key")
                ->execute(
                        array(
                            ':med_key' => $key
                        )
        );
    }

}

?>