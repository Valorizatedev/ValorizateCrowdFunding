<?php

class contactoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT con_key, con_nombre, con_direccion, con_telefono, 
            con_observaciones, con_latitud, con_longitud, con_email, gen_key, con_fecha_nacimiento, 
            eci_key, con_hijos, ciu_key FROM con WHERE " . $condicion);
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO con (con_nombre, con_direccion, con_telefono, con_observaciones, con_email,
            con_latitud, con_longitud, gen_key, con_fecha_nacimiento, eci_key, con_hijos, ciu_key) 
            VALUES (:con_nombre, :con_direccion, :con_telefono, :con_observaciones, :con_email, :con_latitud,
            :con_longitud, :gen_key, :con_fecha_nacimiento, :eci_key, :con_hijos, :ciu_key)")
                ->execute(
                        array(
                            ':con_nombre' => $datos['con_nombre'],
                            ':con_direccion' => $datos['con_direccion'],
                            ':con_telefono' => $datos['con_telefono'],
                            ':con_observaciones' => $datos['con_observaciones'],
                            ':con_latitud' => $datos['con_latitud'],
                            ':con_longitud' => $datos['con_longitud'],
                            ':con_email' => $datos['con_email'],
                            ':gen_key' => $datos['gen_key'],
                            ':con_fecha_nacimiento' => $datos['con_fecha_nacimiento'],
                            ':eci_key' => $datos['eci_key'],
                            ':con_hijos' => $datos['con_hijos'],
                            ':ciu_key' => $datos['ciu_key']
                        )
        );
    }

    public function actualizar($key, $datos) {
        $this->_db->prepare("UPDATE con SET con_nombre = :con_nombre, con_direccion = :con_direccion, 
            con_telefono = :con_telefono, con_observaciones = :con_observaciones, con_latitud = :con_latitud, 
            con_longitud = :con_longitud, con_email = :con_email, gen_key = :gen_key, 
            con_fecha_nacimiento = :con_fecha_nacimiento, eci_key = :eci_key, con_hijos = :con_hijos, ciu_key = :ciu_key 
            WHERE con_key ='{$key}'")
                ->execute(
                        array(
                            ':con_nombre' => $datos['con_nombre'],
                            ':con_direccion' => $datos['con_direccion'],
                            ':con_telefono' => $datos['con_telefono'],
                            ':con_observaciones' => $datos['con_observaciones'],
                            ':con_latitud' => $datos['con_latitud'],
                            ':con_longitud' => $datos['con_longitud'],
                            ':con_email' => $datos['con_email'],
                            ':gen_key' => $datos['gen_key'],
                            ':con_fecha_nacimiento' => $datos['con_fecha_nacimiento'],
                            ':eci_key' => $datos['eci_key'],
                            ':con_hijos' => $datos['con_hijos'],
                            ':ciu_key' => $datos['ciu_key']
                        )
        );
    }

    public function eliminar($con_key) {
        $this->_db->prepare("DELETE FROM rel WHERE con_key = :con_key")
                ->execute(
                        array(
                            ':con_key' => $con_key
                        )
        );
        $this->_db->prepare("DELETE FROM con WHERE con_key = :con_key")
                ->execute(
                        array(
                            ':con_key' => $con_key
                        )
        );
    }

}
?>