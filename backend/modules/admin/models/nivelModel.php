<?php

class nivelModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT niv_key, niv_nombre, niv_descripcion, niv_nivel, niv_estado FROM niv 
            WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->consultar("UPPER(niv_nombre)=UPPER('{$datos['niv_nombre']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO niv (niv_nombre, niv_descripcion, niv_nivel, niv_estado) 
                VALUES (:niv_nombre, :niv_descipcion, :niv_nivel, '1')")
                    ->execute(
                            array(
                                ':niv_nombre' => $datos['niv_nombre'],
                                ':niv_descipcion' => $datos['niv_descipcion'],
                                ':niv_nivel' => $datos['niv_nivel']
                            )
            );
        } else {
            $this->actulizar($key[0]['niv_key'], $datos);
        }
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE niv SET niv_nombre = :niv_nombre, niv_descripcion = :niv_descipcion, 
            niv_nivel = :niv_nivel, niv_estado = '1' WHERE niv_key = :niv_key")
                ->execute(
                        array(
                            ':niv_nombre' => $datos['niv_nombre'],
                            ':niv_descipcion' => $datos['niv_descipcion'],
                            ':niv_nivel' => $datos['niv_nivel'],
                            ':niv_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE niv SET niv_estado='0' WHERE niv_key=:niv_key;")
                ->execute(
                        array(
                            ':niv_key' => $key
                        )
        );
    }

}

?>