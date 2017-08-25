<?php

class boletaModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT bol_key, cam_key, vis_key, bol_numero, bol_fecha FROM bol WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO bol (cam_key, vis_key, bol_numero, bol_fecha) VALUES 
            (:cam_key, :vis_key, :bol_numero, now());
")
                ->execute(
                        array(
                            ':cam_key' => $datos['cam_key'],
                            ':bol_numero' => $datos['bol_numero'],
                            ':vis_key' => $datos['vis_key']
                        )
        );
    }

}

?>