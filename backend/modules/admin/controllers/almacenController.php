<?php

class almacenController extends Controller {

    private $_almacen;

    public function __construct() {
        parent::__construct();
        $this->_almacen = $this->loadModel('almacen', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_almacen');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administracion de Almacenes');
        $condicion = "alm_estado!=0";
        $this->_view->assign('datos', $paginador->paginar($this->_almacen->consultar($condicion), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/almacen/index'));
        $this->_view->renderizar('index', 'almacen');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_almacen');
        $this->_view->assign('titulo', 'Registrar Almacen');
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'alm_nombre' => $this->getTexto('nombre'),
                'alm_piso' => $this->getTexto('piso'),
                'alm_bloque' => $this->getTexto('bloque'),
                'alm_local' => $this->getTexto('local')
            );

            $this->_almacen->crear($datos);
            $this->_view->assign('datos', array());
            $this->_view->assign('_mensaje', "El almacen '{$this->getTexto('nombre')}' fue creado exitosamente");
        }

        $this->_view->renderizar('nuevo', 'almacen');
    }

    public function editar($id) {
        $this->_acl->acceso('modificar_almacen');
        $this->_view->assign('titulo', 'Actualizar Almacen');
        $condicion = "alm_key='{$id}'";
        $almacen = $this->_almacen->consultar($condicion);
        $this->_view->assign('datos', $almacen[0]);

        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'alm_nombre' => $this->getTexto('nombre'),
                'alm_piso' => $this->getTexto('piso'),
                'alm_bloque' => $this->getTexto('bloque'),
                'alm_local' => $this->getTexto('local')
            );
            $this->_almacen->actulizar($id, $datos);
            $this->_view->assign('_mensaje', "El almacen '{$this->getTexto('nombre')}' fue actualizado exitosamente");
            $condicion = "alm_key='{$id}'";
            $almacen = $this->_almacen->consultar($condicion);
            $this->_view->assign('datos', $almacen[0]);
        }
        $this->_view->renderizar('editar', 'almacen');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_almacen');
        $this->_view->assign('titulo', 'Detalles de Almacen');
        $condicion = "alm_key='{$id}'";
        $almacen = $this->_almacen->consultar($condicion);
        $this->_view->assign('datos', $almacen[0]);

        $this->_view->renderizar('detalles', 'almacen');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_almacen');
        $this->_view->assign('titulo', 'Eliminar Almacen');
        $this->_almacen->eliminar($id);
        $this->redireccionar('admin/almacen');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(alm_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND alm_estado!='0'";
            echo json_encode($this->_almacen->consultar($condicion));
        }
    }

}

?>