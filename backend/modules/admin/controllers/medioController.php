<?php

class medioController extends Controller {

    private $_medios;

    public function __construct() {
        parent::__construct();
        $this->_medios = $this->loadModel('medio', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_medio');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administracion de Fuentes');
        $condicion = 'med_estado!=0';
        $medios = $this->_medios->consultar($condicion);
        $this->_view->assign('medios', $paginador->paginar($medios, $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/medio/index'));
        $this->_view->renderizar('index', 'medio');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_medio');
        $this->_view->assign('titulo', 'Registrar Fuente');
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'med_nombre' => $this->getTexto('nombre')
            );
            $this->_medios->crear($datos);
            // $this->_view->assign('datos', array());
            // $this->_view->assign('_mensaje', "La fuente '{$this->getTexto('nombre')}' fue creada exitosamente");			$this->redireccionar('admin/medio',   'Fuente creado con exito',3);
        }$this->redireccionar('admin/medio');
      //  $this->_view->renderizar('index', 'medio');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_medio');
        $this->_view->assign('titulo', 'Administracion de Fuentes');		$this->_view->setJs(array('ajax'));
        $condicion = "med_key={$id}";
        $medios = $this->_medios->consultar($condicion);
        $this->_view->assign('medios', $medios[0]);
        $this->_view->renderizar('detalles', 'medios');
    }

    public function editar($id=false) {
        $this->_acl->acceso('modificar_medio');
        $this->_view->assign('titulo', 'Actualizar Fuente');		if(isset($_POST['key']))		$id=$_POST['key'];				
        $condicion = "med_key={$id}";
        $medios = $this->_medios->consultar($condicion);
        $this->_view->assign('medios', $medios[0]);
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'med_nombre' => $this->getTexto('nombreedit')
            );
            $this->_medios->actulizar($id, $datos);
            // $this->_view->assign('_mensaje', "La fuente '{$this->getTexto('nombre')}' fue actualizada exitosamente");
            // $condicion = "med_key={$id}";
            // $medios = $this->_medios->consultar($condicion);
            // $this->_view->assign('medios', $medios[0]);		$this->redireccionar('admin/medio/detalles/'.$id,   'Fuente editado con exito',3);
        }$this->redireccionar('admin/medio');
        //$this->_view->renderizar('editar', 'medio');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_medio');
        $this->_view->assign('titulo', 'Eliminar Fuente');
        $this->_medios->eliminar($id);
        $this->redireccionar('admin/medio','Fuente eliminada con exito',2);
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(med_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND med_estado!='0'";
            echo json_encode($this->_medios->consultar($condicion));
        }
    }

}

?>