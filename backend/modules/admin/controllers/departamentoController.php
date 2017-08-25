<?php

class departamentoController extends Controller {

    private $_departamento;

    public function __construct() {
        parent::__construct();
        $this->_departamento = $this->loadModel('departamento', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_departamento');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administracion de Departamento');
        $condicion = "dep_estado!=0";
        $this->_view->assign('datos', $paginador->paginar($this->_departamento->consultar($condicion), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/departamento/index'));
        $this->_view->renderizar('index', 'departamento');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_departamento');
        $this->_view->assign('titulo', 'Registrar Departamento');

        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'dep_codigo' => $this->getTexto('codigo'),
                'dep_nombre' => $this->getTexto('nombre')
            );

            $this->_departamento->crear($datos);
            $this->redireccionar('admin/departamento'.$id_cro,'Aprobación completada',3);
        }
        $this->_view->renderizar('nuevo', 'departamento');
    }

    public function editar($id=false) {
        $this->_acl->acceso('modificar_departamento');
        $this->_view->assign('titulo', 'Actualizar Departamento');
        $condicion = "dep.dep_key='{$id}'";
        $departamento = $this->_departamento->consultar($condicion);
        $this->_view->assign('datos', $departamento[0]);

        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));				if(isset($_POST['key']))		$id=$_POST['key'];

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'dep_codigo' => $this->getTexto('codigo'),
                'dep_nombre' => $this->getTexto('nombre')
            );
            $this->_departamento->actulizar($id, $datos);
            $this->_view->assign('_mensaje', "El departamento '{$this->getTexto('nombre')}' fue Actualizado exitosamente");
            $condicion = "dep.dep_key='{$id}'";
            $departamento = $this->_departamento->consultar($condicion);
            $this->_view->assign('datos', $departamento[0]);
        }$this->redireccionar('admin/departamento');
        //$this->_view->renderizar('editar', 'departamento');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_departamento');
        $this->_view->assign('titulo', 'Detalles de Departamento');$this->_view->setJs(array('ajax'));
        $condicion = "dep.dep_key='{$id}'";
        $departamento = $this->_departamento->consultar($condicion);
        $this->_view->assign('datos', $departamento[0]);

        $this->_view->renderizar('detalles', 'departamento');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_departamento');
        $this->_view->assign('titulo', 'Eliminar Departamento');
        $this->_departamento->eliminar($id);
        $this->redireccionar('admin/departamento');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(dep.dep_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND dep.dep_estado!='0'";
            echo json_encode($this->_departamento->consultar($condicion));
        }
    }

}

?>