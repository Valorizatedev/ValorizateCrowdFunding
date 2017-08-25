<?php

class nivelController extends Controller {

    private $_nivel;

    public function __construct() {
        parent::__construct();
        $this->_nivel = $this->loadModel('nivel', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_nivel');
        $niveles = $this->_nivel->consultar($condicion);
        $this->_view->assign('niveles', $paginador->paginar($niveles, $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/nivel/index'));
        $this->_view->renderizar('index', 'nivel');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_nivel');
        $this->_view->assign('titulo', 'Registrar Nivel');
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('validar','ajax'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $datos = array(
                'niv_nombre' => $this->getTexto('nombre'),
                'niv_descipcion' => $this->getTexto('descripcion'),
                'niv_nivel' => $this->getTexto('nivel')
            );
            $this->_nivel->crear($datos);
            // $this->_view->assign('datos', array());
            // $this->_view->assign('_mensaje', "El nivel '{$this->getTexto('nombre')}' fue creado exitosamente");
        }

        //$this->_view->renderizar('nuevo', 'nivel');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_nivel');
        $this->_view->assign('titulo', 'Administracion de Niveles');
        $condicion = "niv_key={$id}";
        $niveles = $this->_nivel->consultar($condicion);
        $this->_view->assign('niveles', $niveles[0]);
        $this->_view->renderizar('detalles', 'nivel');
    }

    public function editar($id=false) {
        $this->_acl->acceso('modificar_nivel');
        $this->_view->assign('titulo', 'Actualizar Niveles');
        $condicion = "niv_key={$id}";
        if ($this->getInt('guardar') == 1) {
            $datos = array(
            );
            $this->_nivel->actulizar($id, $datos);
        }
        
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_nivel');
        $this->_view->assign('titulo', 'Eliminar Medio');
        $this->_nivel->eliminarNivel($id);
        $this->redireccionar('admin/nivel','Nivel eliminado con exito',2);
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(niv_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND niv_estado!='0'";
            echo json_encode($this->_nivel->consultarNivel($condicion));
        }
    }

}

?>