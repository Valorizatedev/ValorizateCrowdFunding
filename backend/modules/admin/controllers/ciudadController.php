<?php

class ciudadController extends Controller {

    private $_ciudad;
    private $_departamento;

    public function __construct() {
        parent::__construct();
        $this->_ciudad = $this->loadModel('ciudad', 'admin');
        $this->_departamento = $this->loadModel('departamento', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_ciudad');        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();        $this->_view->setJs(array('ajax'));        $this->_view->assign('titulo', 'Administracion de Ciudades');
        $condicion = "ciu_estado!=0";        $this->_view->assign('datos', $paginador->paginar($this->_ciudad->consultar($condicion), $pagina));		$condicion = "dep_estado!=0";		$this->_view->assign('departamentos', $this->_departamento->consultar($condicion));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/ciudad/index'));
        $this->_view->renderizar('index', 'ciudad');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_ciudad');
        $this->_view->assign('titulo', 'Registrar Ciudad');
        $condicion = "dep_estado!=0";
        $this->_view->assign('departamentos', $this->_departamento->consultar($condicion));
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'ciu_codigo' => $this->getTexto('codigo'),
                'ciu_nombre' => $this->getTexto('nombre'),
                'dep_key' => $this->getTexto('departamento')
            );
            $this->_ciudad->crear($datos);
            $this->_view->assign('datos', array());
            $this->_view->assign('_mensaje', "La ciudad '{$this->getTexto('nombre')}' fue creada exitosamente");			  			$this->redireccionar('admin/ciudad','Ciudad creada con exito',3);
        }//$this->redireccionar('admin/ciudad');
      $this->_view->renderizar('index', 'ciudad');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_ciudad');
        $this->_view->assign('titulo', 'Administracion de Ciudades');		$this->_view->setJs(array('ajax'));
        $condicion = "ciu.ciu_key={$id}";
        $ciudad = $this->_ciudad->consultar($condicion);
        $this->_view->assign('datos', $ciudad[0]);
		$condicion = "dep_estado!=0";		$this->_view->assign('departamentosl', $this->_departamento->consultar($condicion));		        $condicion = "dep.dep_key={$ciudad[0]['dep_key']}";
        $departamento = $this->_departamento->consultar($condicion);
        $this->_view->assign('departamentos', $departamento[0]);		$this->_view->assign('departamentos2', $this->_departamento->consultar($condicion));
        $this->_view->renderizar('detalles', 'ciudad');
    }

    public function editar($id=false) {
        $this->_acl->acceso('modificar_ciudad');
        $this->_view->assign('titulo', 'Actualizar Ciudad');
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar'));		if(isset($_POST['key']))		$id=$_POST['key'];		
        $condicion = "ciu.ciu_key='{$id}'";
        $ciudad = $this->_ciudad->consultar($condicion);
        $this->_view->assign('datos', $ciudad[0]);
        $this->_view->assign('departamentos', $this->_departamento->consultar());

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'ciu_codigo' => $this->getTexto('codigo'),
                'ciu_nombre' => $this->getTexto('nombre'),
                'dep_key' => $this->getTexto('departamento')
            );
            $this->_ciudad->actulizar($id, $datos);
            $this->_view->assign('_mensaje', "La ciudad '{$this->getTexto('nombre')}' fue actualizada exitosamente");
            $condicion = "ciu.ciu_key='{$id}'";
            $ciudad = $this->_ciudad->consultar($condicion);
            $this->_view->assign('datos', $ciudad[0]);
        }$this->redireccionar('admin/ciudad');
       // $this->_view->renderizar('index', 'ciudad');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_ciudad');
        $this->_view->assign('titulo', 'Eliminar Departamento');
        $this->_ciudad->eliminar($id);
        $this->redireccionar('admin/ciudad');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(ciu.ciu_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND ciu.ciu_estado!='0'";
            echo json_encode($this->_ciudad->consultar($condicion));
        }
    }

    public function consultarCiudad() {
        if ($this->getTexto('valor')) {
            $condicion = "ciu.dep_key='{$this->getTexto('valor')}' AND ciu.ciu_estado!='0'";
            echo json_encode($this->_ciudad->consultar($condicion));
        }
    }

}

?>