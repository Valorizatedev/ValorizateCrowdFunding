<?php

class puntosModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT pun_key, pun_puntos, pun_saldo, cam_key, vis_key FROM pun WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->consultar("UPPER(vis_key)=UPPER('{$datos['vis_key']}') AND 
            UPPER(cam_key)=UPPER('{$datos['cam_key']}')");
        if (!$key) {
            $this->_db->prepare("INSERT INTO pun (pun_puntos, pun_saldo, cam_key, vis_key) VALUES 
            (:pun_puntos, :pun_saldo, :cam_key, :vis_key)")
                    ->execute(
                            array(
                                ':pun_puntos' => $datos['pun_puntos'],
                                ':pun_saldo' => $datos['pun_saldo'],
                                ':cam_key' => $datos['cam_key'],
                                ':vis_key' => $datos['vis_key']
                            )
            );
        } else {
            $this->actulizar($key[0]['pun_key'], $datos);
        }
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE pun SET pun_puntos = :pun_puntos, pun_saldo = :pun_saldo, 
            cam_key = :cam_key, vis_key = :vis_key WHERE pun_key = :pun_key")
                ->execute(
                        array(
                            ':pun_puntos' => $datos['pun_puntos'],
                            ':pun_saldo' => $datos['pun_saldo'],
                            ':cam_key' => $datos['cam_key'],
                            ':vis_key' => $datos['vis_key'],
                            ':pun_key' => $key
                        )
        );
    }

}

?>