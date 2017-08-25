<?php

class informeModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function geo() {
        $roles = $this->_db->query("select cli_key,cli_nombre,cli_apellidos,cli_direccion,cli_telefono,
            cli_latitud,cli_longitud from cli where usu_estado!=0");
        if ($roles)
            return $roles->fetchall();
    }

    public function evento($condicion) {
        $roles = $this->_db->query("select eve_fecha,eve_nombre,sum(log_valor) as valor ,alm_nombre,
            alm_piso,alm_bloque,alm_local from eve, log, alm where log.alm_key = alm._alm_key 
            and eve.eve_fecha=log.log_fecha {$condicion} group by log.alm_key");
        if ($roles)
            return $roles->fetchall();
    }

    public function campana($condicion) {
        $roles = $this->_db->query("select log_fecha,sum(log_valor) as valor ,alm_nombre,alm_piso,alm_bloque,
            alm_local from log, alm where log.alm_key = alm.alm_key {$condicion} 
            group by log_fecha,log.alm_key");
        if ($roles)
            return $roles->fetchall();
    }
    public function visitante($condicion) {
        $roles = $this->_db->query("select ciu.ciu_nombre, dep.dep_nombre, gen.gen_nombre, tdo.tdo_nombre, usu.usu_nombre, 
            usu.usu_apellidos, usu.usu_num_documento, usu.usu_direccion, usu.usu_telefono, usu.usu_observaciones, 
            usu.usu_email, usu.usu_fecha_cumple, usu.usu_estado_marital, usu.usu_hijos from ciu, dep, gen, tdo, usu
            where ciu.ciu_key = usu.ciu_key AND ciu.dep_key = dep.dep_key AND usu.gen_key = gen.gen_key 
            AND usu.tdo_key = tdo.tdo_key {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

}

?>