<?php

class clienteModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT cli_key, cli_nombre, cli_num_documento, cli_direccion, cli_telefono, cli_email, 
            cli_web, cli_tipo, tdo_key, tcl_key, ciu_key, cli_observaciones, cli_latitud, cli_longitud FROM cli 
            WHERE " . $condicion);
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $condicion = "tdo_key=" . $datos['tdo_key'] . " AND cli_num_documento = '" . $datos['cli_num_documento'] . "'";
        $key = $this->consultar($condicion);
        if (!$key) {
            $this->_db->prepare("INSERT INTO cli (cli_nombre, cli_num_documento, cli_direccion, cli_telefono, cli_email, 
                cli_web, cli_tipo, tdo_key, tcl_key, ciu_key, cli_observaciones, cli_latitud, cli_longitud, cli_estado) 
                VALUES (:cli_nombre, :cli_num_documento, :cli_direccion, :cli_telefono, :cli_email, :cli_web, :cli_tipo, 
                :tdo_key, :tcl_key, :ciu_key, :cli_observaciones, :cli_latitud, :cli_longitud, 1)")
                    ->execute(
                            array(
                                ':cli_nombre' => $datos['cli_nombre'],
                                ':cli_num_documento' => $datos['cli_num_documento'],
                                ':cli_direccion' => $datos['cli_direccion'],
                                ':cli_telefono' => $datos['cli_telefono'],
                                ':cli_email' => $datos['cli_email'],
                                ':cli_web' => $datos['cli_web'],
                                ':cli_tipo' => $datos['cli_tipo'],
                                ':tdo_key' => $datos['tdo_key'],
                                ':tcl_key' => $datos['tcl_key'],
                                ':ciu_key' => $datos['ciu_key'],
                                ':cli_observaciones' => $datos['cli_observaciones'],
                                ':cli_latitud' => $datos['cli_latitud'],
                                ':cli_longitud' => $datos['cli_longitud']
                            )
            );
            $condicion = "tdo_key=" . $datos['tdo_key'] . " AND cli_num_documento = '" . $datos['cli_num_documento'] . "'";
            $key = $this->consultar($condicion);
        } else {
            $this->actualizar($key[0]['cli_key'], $datos);
        }
        return $key[0];
    }

    public function actualizar($key, $datos) {
        $this->_db->prepare("UPDATE cli SET cli_nombre = :cli_nombre, cli_num_documento = :cli_num_documento, 
            cli_direccion = :cli_direccion, cli_telefono = :cli_telefono, cli_email = :cli_email, cli_web = :cli_web, 
            tdo_key = :tdo_key, tcl_key = :tcl_key, ciu_key = :ciu_key, cli_estado = 1, cli_longitud = :cli_longitud,
            cli_observaciones = :cli_observaciones, cli_latitud = :cli_latitud WHERE cli_key ='{$key}'")
                ->execute(
                        array(
                            ':cli_nombre' => $datos['cli_nombre'],
                            ':cli_num_documento' => $datos['cli_num_documento'],
                            ':cli_direccion' => $datos['cli_direccion'],
                            ':cli_telefono' => $datos['cli_telefono'],
                            ':cli_email' => $datos['cli_email'],
                            ':cli_web' => $datos['cli_web'],
                            ':tdo_key' => $datos['tdo_key'],
                            ':tcl_key' => $datos['tcl_key'],
                            ':ciu_key' => $datos['ciu_key'],
                            ':cli_observaciones' => $datos['cli_observaciones'],
                            ':cli_latitud' => $datos['cli_latitud'],
                            ':cli_longitud' => $datos['cli_longitud']
                        )
        );
    }

    public function convertir($key) {
        $this->_db->prepare("UPDATE cli SET cli_tipo = 1 WHERE cli_key ='{$key}'")
                ->execute();
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE cli SET cli_estado = 0 WHERE cli_key ='{$key}'")
                ->execute();
    }

}
?>