<?php

class visitanteModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT vis_key, vis_nombre, vis_num_documento, vis_direccion, vis_telefono, vis_email,             tdo_key, ciu_key, vis_observaciones, vis_latitud, vis_longitud, gen_key, vis_fecha_nacimiento,             eci_key, vis_hijos FROM vis WHERE {$condicion}");
        if ($roles)            return $roles->fetchall();
    }

    public function crear($datos) {
        $condicion = "vis_num_documento='{$datos['vis_num_documento']}' AND tdo_key='{$datos['tdo_key']}'";
        $key = $this->consultar($condicion);
        if (!$key) {
            $this->_db->prepare("INSERT INTO vis (vis_nombre, vis_num_documento, vis_direccion, vis_telefono, vis_email, 
            tdo_key, ciu_key, vis_observaciones, vis_latitud, vis_longitud, gen_key, vis_fecha_nacimiento, 
            eci_key, vis_hijos) VALUES (:vis_nombre, :vis_num_documento, :vis_direccion, :vis_telefono, :vis_email, 
            :tdo_key, :ciu_key, :vis_observaciones, :vis_latitud, :vis_longitud, :gen_key, :vis_fecha_nacimiento, 
            :eci_key, :vis_hijos)")
                    ->execute(
                            array(
                                ':vis_nombre' => $datos['vis_nombre'],
                                ':vis_num_documento' => $datos['vis_num_documento'],
                                ':vis_direccion' => $datos['vis_direccion'],
                                ':vis_telefono' => $datos['vis_telefono'],
                                ':vis_email' => $datos['vis_email'],
                                ':tdo_key' => $datos['tdo_key'],
                                ':ciu_key' => $datos['ciu_key'],
                                ':vis_observaciones' => $datos['vis_observaciones'],
                                ':vis_latitud' => $datos['vis_latitud'],
                                ':vis_longitud' => $datos['vis_longitud'],
                                ':gen_key' => $datos['gen_key'],
                                ':vis_fecha_nacimiento' => $datos['vis_fecha_nacimiento'],
                                ':eci_key' => $datos['eci_key'],
                                ':vis_hijos' => $datos['vis_hijos']
                            )
            );
            $condicion = "vis_num_documento='{$datos['vis_num_documento']}' AND tdo_key='{$datos['tdo_key']}'";
            $key = $this->consultar($condicion);
        } else {
            $this->actualizar($key[0]['vis_key'], $datos);
        }
        return $key;
    }

    public function actualizar($key, $datos) {
        $this->_db->prepare("UPDATE vis SET vis_nombre = :vis_nombre, vis_direccion = :vis_direccion, 
            vis_telefono = :vis_telefono, vis_email = :vis_email, ciu_key = :ciu_key, 
            vis_observaciones = :vis_observaciones, vis_latitud = :vis_latitud, vis_longitud = :vis_longitud, 
            gen_key = :gen_key, vis_fecha_nacimiento = :vis_fecha_nacimiento, eci_key = :eci_key, vis_hijos = :vis_hijos 
            WHERE vis_key = {$key}")
                ->execute(
                        array(
                            ':vis_nombre' => $datos['vis_nombre'],
                            ':vis_direccion' => $datos['vis_direccion'],
                            ':vis_telefono' => $datos['vis_telefono'],
                            ':vis_email' => $datos['vis_email'],
                            ':ciu_key' => $datos['ciu_key'],
                            ':vis_observaciones' => $datos['vis_observaciones'],
                            ':vis_latitud' => $datos['vis_latitud'],
                            ':vis_longitud' => $datos['vis_longitud'],
                            ':gen_key' => $datos['gen_key'],
                            ':vis_fecha_nacimiento' => $datos['vis_fecha_nacimiento'],
                            ':eci_key' => $datos['eci_key'],
                            ':vis_hijos' => $datos['vis_hijos']
                        )
        );
    }

}
?>