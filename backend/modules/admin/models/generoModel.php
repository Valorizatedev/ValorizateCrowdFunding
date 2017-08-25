<?php

class generoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function consultar($condicion='1') {
        $roles = $this->_db->query("SELECT gen.gen_key,gen.gen_nombre,gen.gen_estado FROM gen WHERE {$condicion}");
        if ($roles)
            return $roles->fetchall();
    }
}

?>