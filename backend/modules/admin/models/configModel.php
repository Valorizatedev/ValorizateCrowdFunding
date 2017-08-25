<?php



class configModel extends Model {



    public function __construct() {
        parent::__construct();
    }



    public function consultar($condicion = '1') {

        $data = $this->_db->query("SELECT `config_key`, `config_nombre`, `config_cantiad_articulos`, `config_email` FROM `config` WHERE  {$condicion}");
        if ($data)
            return $data->fetchall();

    }

    public function crear($datos) {
        $this->_db->prepare("")
                ->execute(
                            array()
                         );

    }

    public function actulizar($key, $datos) {
        $this->_db->prepare("UPDATE `config` SET `config_nombre`=:config_nombre,`config_cantiad_articulos`=:config_cantiad_articulos,`config_email`=:config_email WHERE `config_key`=$key")
                ->execute(
                          $datos
                         );

    }

}

?>