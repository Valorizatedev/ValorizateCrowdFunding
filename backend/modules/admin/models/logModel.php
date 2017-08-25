<?php

class logModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT log_key, log_valor, log_fecha, vis_key, alm_key FROM log WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO log (log_valor, log_fecha, vis_key, alm_key) 
            VALUES (:log_valor, :log_fecha, :vis_key, :alm_key)")
                ->execute(
                        array(
                            ':log_valor' => $datos['log_valor'],
                            ':vis_key' => $datos['vis_key'],
                            ':log_fecha' => $datos['log_fecha'],
                            ':alm_key' => $datos['alm_key']
                        )
        );
    }

}

?>