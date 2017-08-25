<?php

class tdocumentoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion='1') {
        $roles = $this->_db->query("SELECT tdo_key,tdo_nombre,tdo_estado FROM tdo WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }

}

?>