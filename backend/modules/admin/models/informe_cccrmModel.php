<?php

class informe_cccrmModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function geo() {
        $roles = $this->_db->query("select vis_key,vis_nombre,vis_direccion,vis_telefono,
            vis_latitud,vis_longitud from vis");
        if ($roles)
            return $roles->fetchall();
    }

    public function evento($condicion) {
        $roles = $this->_db->query("select eve_fecha,eve_nombre,sum(log_valor) as valor ,alm_nombre,
            alm_piso,alm_bloque,alm_local from eve, log, alm where log.alm_key = alm.alm_key 
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
        $roles = $this->_db->query("select ciu.ciu_nombre, dep.dep_nombre, gen.gen_nombre, tdo.tdo_nombre, vis.vis_nombre, 
            vis.vis_num_documento, vis.vis_direccion, vis.vis_telefono, vis.vis_observaciones, 
            vis.vis_email, vis.vis_fecha_nacimiento, eci.eci_nombre, vis.vis_hijos from ciu, dep, gen, tdo, vis, eci
            where ciu.ciu_key = vis.ciu_key AND ciu.dep_key = dep.dep_key AND vis.gen_key = gen.gen_key 
            AND vis.tdo_key = tdo.tdo_key AND vis.eci_key = eci.eci_key {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

}

?>