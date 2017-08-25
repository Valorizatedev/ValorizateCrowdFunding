<?php

class tclienteModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion='1') {
        $roles = $this->_db->query("SELECT tcl_key, tcl_nombre, tcl_estado FROM tcl WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }
}

?>