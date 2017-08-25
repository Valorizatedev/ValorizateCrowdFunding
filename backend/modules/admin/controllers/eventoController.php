<?php

class eventoController extends Controller {

    private $_campana;

    public function __construct() {
        parent::__construct();
        $this->_campana = $this->loadModel('evento', 'admin');
    }

    public function index($pagina = false) {
//        $this->_acl->acceso('ver_campana');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administracion de Eventos');
        $condicion = "eve_estado!=0";
        $this->_view->assign('datos', $paginador->paginar($this->_campana->consultar($condicion), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/evento/index'));
        $this->_view->renderizar('index', 'evento');
    }

    public function nuevo() {
//        $this->_acl->acceso('crear_campana');
        $this->_view->assign('titulo', 'Registrar Campa&ntilde;a');

        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'eve_nombre' => $this->getTexto('nombre'),
                'eve_fecha' => $this->getTexto('fecha'),
                '
                    eve_descripcion' => $this->getTexto('descripcion')
            );

            $this->_campana->crear($datos);
            $this->_view->assign('datos', array());
            $this->_view->assign('_mensaje', "El evento '{$this->getTexto('nombre')}' fue creado exitosamente");
        }

        $this->_view->renderizar('nuevo', 'evento');
    }

    public function editar($id) {
//        $this->_acl->acceso('modificar_campana');
        $this->_view->assign('titulo', 'Actualizar Evento');
        $condicion = "eve_key='{$id}'";
        $evento = $this->_campana->consultar($condicion);
        $this->_view->assign('datos', $evento[0]);

        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'eve_nombre' => $this->getTexto('nombre'),
                'eve_fecha' => $this->getTexto('fecha'),
                'eve_descripcion' => $this->getTexto('descripcion')
            );
            $this->_campana->actulizar($id, $datos);
            $condicion = "eve_key='{$id}'";
            $evento = $this->_campana->consultar($condicion);
            $this->_view->assign('datos', $evento[0]);
            $this->_view->assign('_mensaje', "El evento '{$this->getTexto('nombre')}' fue actualizado exitosamente");
        }
        $this->_view->renderizar('editar', 'evento');
    }

    public function detalles($id) {
//        $this->_acl->acceso('ver_campana');
        $this->_view->assign('titulo', 'Detalles de Evento');
        $condicion = "eve_key='{$id}'";
        $evento = $this->_campana->consultar($condicion);
        $this->_view->assign('datos', $evento[0]);

        $this->_view->renderizar('detalles', 'evento');
    }

    public function eliminar($id) {
//        $this->_acl->acceso('eliminar_campana');
        $this->_view->assign('titulo', 'Eliminar Evento');
        $this->_campana->eliminar($id);
        $this->redireccionar('admin/evento');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(eve_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND eve_estado!='0'";
            echo json_encode($this->_campana->consultarEvento($condicion));
        }
    }

}

?>