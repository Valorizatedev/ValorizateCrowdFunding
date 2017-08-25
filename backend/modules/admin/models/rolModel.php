<?php

class rolModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultarRoles() {
        $roles = $this->_db->query("SELECT rol.rol_key,rol.rol_nombre,rol.rol_estado FROM rol WHERE rol.rol_estado!='0'");
        if ($roles)
            return $roles->fetchall();
    }

    public function consultarRol($condicion='1') {
        $roles = $this->_db->query("SELECT rol.rol_key,rol.rol_nombre,rol.rol_estado FROM rol WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crearRol($datos) {
        $key = $this->consultarRol("UPPER(rol.rol_nombre)=UPPER('{$datos['rol_nombre']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO rol (rol_nombre,rol_estado) VALUES (:rol_nombre,'1')")
                    ->execute(
                            array(
                                ':rol_nombre' => $datos['rol_nombre']
                            )
            );
            $key = $this->consultarRol("UPPER(rol.rol_nombre)=UPPER('{$datos['rol_nombre']}')");
        } else {
            $this->actulizarRol($key[0]['rol_key'], $datos);
        }
        return $key[0];
    }

    public function actulizarRol($key, $datos) {
        $this->_db->prepare("UPDATE rol SET rol_nombre=:rol_nombre, rol_estado='1' WHERE rol_key=:rol_key;")
                ->execute(
                        array(
                            ':rol_nombre' => $datos['rol_nombre'],
                            ':rol_key' => $key
                        )
        );
    }

    public function eliminarRol($key) {
        $this->_db->prepare("UPDATE usu set usu.rol_key='2' WHERE usu.rol_key=:rol_key")
                ->execute(
                        array(
                            ':rol_key' => $key
                        )
        );
        $this->_db->prepare("DELETE FROM rol WHERE rol_key=:rol_key;")
                ->execute(
                        array(
                            ':rol_key' => $key
                        )
        );
    }

}

?>