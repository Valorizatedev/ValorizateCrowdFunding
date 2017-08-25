<?php

class bitacoraModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT bit_key, bit_fecha, bit_fecha_alarma, bit_observacion, usu_key, opo_key, bit_estado 
            FROM bit WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO bit (bit_fecha, bit_fecha_alarma, bit_observacion, usu_key, opo_key, bit_estado) VALUES 
            (now(), :bit_fecha_alarma, :bit_observacion, :usu_key, :opo_key, :bit_estado)")
                ->execute(
                        array(
                            ':bit_fecha_alarma' => $datos['bit_fecha_alarma'],
                            ':usu_key' => $datos['usu_key'],
                            ':opo_key' => $datos['opo_key'],
                            ':bit_estado' => $datos['bit_estado'],
                            ':bit_observacion' => $datos['bit_observacion']
                        )
        );
    }

    public function cerrar($datos) {
        $this->_db->prepare("UPDATE bit SET bit_estado = :bit_estado WHERE bit_key=:bit_key")
                ->execute(
                        array(
                            ':bit_estado' => $datos['bit_estado'],
                            ':bit_key' => $datos['bit_key']
                        )
        );
    }

}

?>