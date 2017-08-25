<?php

class impuestoController extends Controller {

    private $_impuesto;

    public function __construct() {
        parent::__construct();
        $this->_impuesto = $this->loadModel('impuesto', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_impuesto');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administracion de Impuestos');
        $condicion = 'imp_estado!=0';
        $impuestos = $this->_impuesto->consultar($condicion);
        $this->_view->assign('impuestos', $paginador->paginar($impuestos, $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/impuesto/index'));
        $this->_view->renderizar('index', 'impuesto');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_impuesto');
        $this->_view->assign('titulo', 'Registrar Impuesto');
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'imp_nombre' => $this->getTexto('nombre'),
                'imp_valor' => $this->getTexto('valor')
            );
            $this->_impuesto->crear($datos);
            // $this->_view->assign('datos', array());
            // $this->_view->assign('_mensaje', "El impuesto '{$this->getTexto('nombre')}' fue creado exitosamente");			$this->redireccionar('admin/impuesto',   'Impuesto creado con exito',3);
        }

        $this->_view->renderizar('nuevo', 'impuesto');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_impuesto');
        $this->_view->assign('titulo', 'Administracion de Impuestos');		$this->_view->setJs(array('ajax'));		
        $condicion = "imp_key={$id}";
        $impuestos = $this->_impuesto->consultar($condicion);
        $this->_view->assign('impuestos', $impuestos[0]);
        $this->_view->renderizar('detalles', 'impuesto');
    }

    public function editar($id=false) {
        $this->_acl->acceso('modificar_impuesto');
        $this->_view->assign('titulo', 'Actualizar Impuestos');		if(isset($_POST['key']))		$id=$_POST['key'];		
        $condicion = "imp_key={$id}";        $impuestos = $this->_impuesto->consultar($condicion);        $this->_view->assign('impuestos', $impuestos[0]);        $this->_view->setJsPlugin(array('jquery.validate'));        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'imp_nombre' => $this->getTexto('nombre'),
                'imp_valor' => $this->getTexto('valor')
            );
            $this->_impuesto->actulizar($id, $datos);
            $condicion = "imp_key={$id}";
            $impuestos = $this->_impuesto->consultar($condicion);
            $this->_view->assign('impuestos', $impuestos[0]);
            $this->_view->assign('_mensaje', "El impuesto '{$this->getTexto('nombre')}' fue actualizado exitosamente");
        }		//$this->redireccionar('admin/impuesto');		$this->redireccionar('admin/impuesto/detalles/'.$id,'Impuesto editado con exito',3);
        //$this->_view->renderizar('index', 'impuesto');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_impuesto');
        $this->_view->assign('titulo', 'Eliminar Impuesto');
        $this->_impuesto->eliminar($id);
        $this->redireccionar('admin/impuesto','Impuesto eliminado con exito',2);
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(imp_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND imp_estado!='0'";
            echo json_encode($this->_impuesto->consultar($condicion));
        }
    }

    public function consultaKeyAjax() {
        if ($this->getTexto('valor')) {            $condicion = "(UPPER(imp_key) like UPPER('%{$this->getTexto('valor')}%')) AND imp_estado!='0'";            echo json_encode($this->_impuesto->consultar($condicion));
        }
    }

}

?>