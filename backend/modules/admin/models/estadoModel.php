<?php

class estadoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion='1') {
        $roles = $this->_db->query("SELECT eci_key, eci_nombre, eci_estado FROM eci WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }
}

?>