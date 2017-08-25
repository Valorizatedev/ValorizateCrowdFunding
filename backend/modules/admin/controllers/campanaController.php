<?php

class campanaController extends Controller {

    private $_campana;
    private $_secuencia;

    public function __construct() {
        parent::__construct();
        $this->_campana = $this->loadModel('campana', 'admin');
        $this->_secuencia = $this->loadModel('secuence', 'admin');
    }

    public function index($pagina = false) {
//        $this->_acl->acceso('ver_campana');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administracion de Campa&ntilde;as');
        $condicion = "cam_estado!=0";
        $this->_view->assign('datos', $paginador->paginar($this->_campana->consultar($condicion), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/campana/index'));
        $this->_view->renderizar('index', 'campana');
    }

    public function nuevo() {
//        $this->_acl->acceso('crear_campana');
        $this->_view->assign('titulo', 'Registrar Campa&ntilde;a');

        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker', 'jquery.maskMoney'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $dias = "";
            $dias.=$this->getTexto('lunes') ? 1 : 0;
            $dias.=$this->getTexto('martes') ? 1 : 0;
            $dias.=$this->getTexto('miercoles') ? 1 : 0;
            $dias.=$this->getTexto('jueves') ? 1 : 0;
            $dias.=$this->getTexto('viernes') ? 1 : 0;
            $dias.=$this->getTexto('sabado') ? 1 : 0;
            $dias.=$this->getTexto('domingo') ? 1 : 0;
            $datos = array(
                'cam_nombre' => $this->getTexto('nombre'),
                'cam_fecha_ini' => $this->getTexto('fecha_ini'),
                'cam_fecha_fin' => $this->getTexto('fecha_fin'),
                'cam_monto' => str_replace(".", "", $this->getTexto('monto')),
                'cam_promo_multiplicar' => $this->getTexto('multiplicador'),
                'cam_promo_dias' => $dias,
                'cam_descripcion' => $this->getTexto('descripcion')
            );
            $idcampana = $this->_campana->crear($datos);
            $secuencia = array(
                'sequence_name' => "campana" . $idcampana['cam_key'],
                'sequence_increment' => 1,
                'sequence_min_value' => 1,
                'sequence_max_value' => 18446744073709551615,
                'sequence_cur_value' => 1,
                'sequence_cycle' => 0
            );
            $this->_secuencia->crear($secuencia);
            $this->_view->assign('datos', array());
            $this->_view->assign('_mensaje', "La Campa&ntilde;a '{$this->getTexto('nombre')}' fue creada exitosamente");
        }
        $this->_view->renderizar('nuevo', 'campana');
    }

    public function editar($id) {
//        $this->_acl->acceso('modificar_campana');
        $this->_view->assign('titulo', 'Actualizar Campa&ntilde;a');
        $condicion = "cam_key='{$id}'";
        $campana = $this->_campana->consultar($condicion);
        $this->_view->assign('datos', $campana[0]);

        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker', 'jquery.maskMoney'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {

            $dias = "";
            $dias.=$this->getTexto('lunes') ? 1 : 0;
            $dias.=$this->getTexto('martes') ? 1 : 0;
            $dias.=$this->getTexto('miercoles') ? 1 : 0;
            $dias.=$this->getTexto('jueves') ? 1 : 0;
            $dias.=$this->getTexto('viernes') ? 1 : 0;
            $dias.=$this->getTexto('sabado') ? 1 : 0;
            $dias.=$this->getTexto('domingo') ? 1 : 0;
            $datos = array(
                'cam_nombre' => $this->getTexto('nombre'),
                'cam_fecha_ini' => $this->getTexto('fecha_ini'),
                'cam_fecha_fin' => $this->getTexto('fecha_fin'),
                'cam_monto' => str_replace(".", "", $this->getTexto('monto')),
                'cam_promo_multiplicar' => $this->getTexto('multiplicador'),
                'cam_promo_dias' => $dias,
                'cam_descripcion' => $this->getTexto('descripcion')
            );
            $this->_campana->actulizar($id, $datos);
            $this->_view->assign('_mensaje', "La Campa&ntilde;a '{$this->getTexto('nombre')}' fue actualizada exitosamente");
            $condicion = "cam_key='{$id}'";
            $campana = $this->_campana->consultar($condicion);
            $this->_view->assign('datos', $campana[0]);
        }
        $this->_view->renderizar('editar', 'campana');
    }

    public function detalles($id) {
//        $this->_acl->acceso('ver_campana');
        $this->_view->assign('titulo', 'Detalles de Campa&ntilde;a');
        $condicion = "cam_key='{$id}'";
        $almacen = $this->_campana->consultar($condicion);
        $this->_view->assign('datos', $almacen[0]);

        $this->_view->renderizar('detalles', 'campana');
    }

    public function eliminar($id) {
//        $this->_acl->acceso('eliminar_campana');
        $this->_view->assign('titulo', 'Eliminar Campa&ntilde;a');
        $this->_campana->eliminar($id);
        $this->redireccionar('admin/campana');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(cam_nombre) like UPPER('%{$this->getTexto('valor')}%')) AND cam_estado!='0'";
            echo json_encode($this->_campana->consultar($condicion));
        }
    }

}

?>