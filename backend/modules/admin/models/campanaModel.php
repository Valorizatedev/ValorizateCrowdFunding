<?php

class campanaModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT cam_key, cam_nombre, cam_fecha_ini, cam_fecha_fin, cam_monto, 
            cam_descripcion, cam_estado, cam_promo_multiplicar, cam_promo_dias FROM cam WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO cam (cam_nombre, cam_fecha_ini, cam_fecha_fin, cam_monto, cam_descripcion, 
            cam_estado, cam_promo_multiplicar, cam_promo_dias) VALUES (:cam_nombre, :cam_fecha_ini, 
            :cam_fecha_fin, :cam_monto, :cam_descripcion, 1, :cam_promo_multiplicar, :cam_promo_dias)")
                ->execute(
                        array(
                            ':cam_nombre' => $datos['cam_nombre'],
                            ':cam_fecha_ini' => $datos['cam_fecha_ini'],
                            ':cam_fecha_fin' => $datos['cam_fecha_fin'],
                            ':cam_monto' => $datos['cam_monto'],
                            ':cam_promo_multiplicar' => $datos['cam_promo_multiplicar'],
                            ':cam_promo_dias' => $datos['cam_promo_dias'],
                            ':cam_descripcion' => $datos['cam_descripcion']
                        )
        );
        $condicion="cam_nombre='{$datos['cam_nombre']}' AND cam_fecha_ini='{$datos['cam_fecha_ini']}' AND
        cam_fecha_fin='{$datos['cam_fecha_fin']}' AND cam_estado!=0";
        $key=$this->consultar($condicion);
        return $key[0];
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE cam SET cam_nombre = :cam_nombre, cam_fecha_ini = :cam_fecha_ini, 
            cam_fecha_fin = :cam_fecha_fin, cam_monto = :cam_monto, cam_descripcion = :cam_descripcion, 
            cam_estado = 1, cam_promo_multiplicar = :cam_promo_multiplicar, 
            cam_promo_dias = :cam_promo_dias WHERE cam_key = :cam_key")
                ->execute(
                        array(
                            ':cam_nombre' => $datos['cam_nombre'],
                            ':cam_fecha_ini' => $datos['cam_fecha_ini'],
                            ':cam_fecha_fin' => $datos['cam_fecha_fin'],
                            ':cam_monto' => $datos['cam_monto'],
                            ':cam_descripcion' => $datos['cam_descripcion'],
                            ':cam_promo_multiplicar' => $datos['cam_promo_multiplicar'],
                            ':cam_promo_dias' => $datos['cam_promo_dias'],
                            ':cam_key' => $key
                        )
        );
    }
    
    public function eliminar($key) {
        $this->_db->prepare("UPDATE cam SET cam_estado='0' WHERE cam_key=:cam_key")
                ->execute(
                        array(
                            ':cam_key' => $key
                        )
        );
    }

}

?>