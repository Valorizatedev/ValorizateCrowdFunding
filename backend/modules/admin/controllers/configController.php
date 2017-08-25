<?php

class configController extends Controller {

    private $_config;

    public function __construct() {
        parent::__construct();
        $this->_config = $this->loadModel('config', 'admin');
    }



    public function index() {

        $this->_acl->acceso('configuracion');
        $this->_view->assign('titulo', '.:: Configuracion ::.');

        $condicion = "config_key=1";
        $config = $this->_config->consultar($condicion);
        $this->_view->assign('datos', $config[0]);
        $this->_view->renderizar('index', 'config');

    }

    public function guardar() {

         $datos = array(
                ':config_nombre' => $this->getTexto('nombretienda'),
                ':config_cantiad_articulos' => $this->getTexto('cantidadarticulos'),
                ':config_email' => $this->getTexto('email')
            );
         $key = $this->_config->actulizar(1,$datos);
         $this->redireccionar('admin/config',   'Actualizacón completada!',3);

    }



}



?>