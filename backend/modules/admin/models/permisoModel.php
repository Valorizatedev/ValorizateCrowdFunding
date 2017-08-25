<?php

class permisoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultarPermisos() {
        $roles = $this->_db->query("SELECT per.per_key,per.per_nombre,per.per_modulo FROM per");
        if ($roles)
            return $roles->fetchall();
    }

    public function consultarPermisosAsignados($condicion='1') {
        $roles = $this->_db->query("SELECT pxr.pxr_key,pxr.rol_key,pxr.per_key,per.per_modulo,per.per_nombre FROM pxr, per WHERE per.per_key=pxr.per_key AND {$condicion} ORDER BY per.per_nombre");
        if ($roles)
            return $roles->fetchall();
    }

    public function consultarPermiso($condicion='1') {
        $roles = $this->_db->query("SELECT per.per_key,per.per_nombre,per.per_modulo FROM per WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function asignarPermiso($datos) {
        foreach ($datos as $valor) {
            $condicion = "pxr.rol_key='{$valor['rol_key']}' AND pxr.per_key='{$valor['per_key']}'";
            $key = $this->consultarPermisosAsignados($condicion);
            if (!$key[0]['pxr_key']) {
                $this->_db->prepare("INSERT INTO pxr (rol_key,per_key) VALUES (:rol_key,:per_key)")
                        ->execute(
                                array(
                                    ':rol_key' => $valor['rol_key'],
                                    ':per_key' => $valor['per_key']
                                )
                );
                $condicion = "pxr.rol_key='{$valor['rol_key']}' AND pxr.per_key='{$valor['per_key']}'";
                $key = $this->consultarPermisosAsignados($condicion);
            }
        }
    }

    public function revocarPermiso($key) {
        $this->_db->prepare("DELETE FROM pxr WHERE pxr_key in ({$key});")
                ->execute();
    }

}

?>