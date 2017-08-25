<?php

class oportunidadModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT opo.opo_key, opo.opo_fecha_ini, opo.opo_fecha_fin, opo.opo_estado, opo.niv_key, 
            opo.med_key, opo.opo_observacion, opo.usu_key, opo.cli_key, SUM(pxo.pxo_estimado_sin_impuesto) as valor 
            FROM opo,pxo WHERE opo.opo_key=pxo.opo_key AND {$condicion} Group By opo.opo_key ORDER BY opo_fecha_fin");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $key = $this->_db->query("select nextval('oportunidad') as id")->fetchall();
        $this->_db->prepare("INSERT INTO opo (opo_key, opo_fecha_ini, opo_fecha_fin, opo_estado, niv_key, med_key, opo_observacion, 
            usu_key, cli_key) VALUES ({$key[0]['id']}, :opo_fecha_ini, :opo_fecha_fin, 1, :niv_key, :med_key, :opo_observacion, :usu_key, 
            :cli_key)")
                ->execute(
                        array(
                            ':opo_fecha_ini' => $datos['opo_fecha_ini'],
                            ':opo_fecha_fin' => $datos['opo_fecha_fin'],
                            ':niv_key' => $datos['niv_key'],
                            ':med_key' => $datos['med_key'],
                            ':opo_observacion' => $datos['opo_observacion'],
                            ':usu_key' => $datos['usu_key'],
                            ':cli_key' => $datos['cli_key']
                        )
        );
        return $key[0]['id'];
    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE opo SET opo_fecha_fin = :opo_fecha_fin, opo_estado = :opo_estado, niv_key = :niv_key, 
            usu_key = :usu_key WHERE opo_key = :opo_key")
                ->execute(
                        array(
                            ':opo_fecha_fin' => $datos['opo_fecha_fin'],
                            ':opo_estado' => $datos['opo_estado'],
                            ':niv_key' => $datos['niv_key'],
                            ':usu_key' => $datos['usu_key'],
                            ':opo_key' => $key
                        )
        );
    }

    public function eliminar($key) {
        $this->_db->prepare("UPDATE opo SET opo_estado='0' WHERE opo_key=:opo_key;")
                ->execute(
                        array(
                            ':opo_key' => $key
                        )
        );
    }
		
}

?>