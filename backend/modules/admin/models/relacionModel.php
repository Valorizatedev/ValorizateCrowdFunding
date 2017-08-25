<?php

class relacionModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion = '1') {
        $roles = $this->_db->query("SELECT rel.rel_key, rel.rel_observacion, rel.con_key, rel.cli_key, con.con_nombre, cli.cli_nombre 
            FROM rel,cli,con WHERE cli.cli_key=rel.cli_key AND con.con_key=rel.con_key AND {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

    public function crear($datos) {
        $this->_db->prepare("INSERT INTO rel (rel_observacion, con_key, cli_key) VALUES (:rel_observacion, :con_key, 
            :cli_key)")
                ->execute(
                        array(
                            ':rel_observacion' => $datos['rel_observacion'],
                            ':con_key' => $datos['con_key'],
                            ':cli_key' => $datos['cli_key']
                        )
        );
    }

    public function eliminar($condicion) {
        $this->_db->prepare("DELETE FROM rel WHERE {$condicion}")
                ->execute();
    }

}

?>