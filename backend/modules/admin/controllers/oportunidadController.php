<?php

class oportunidadController extends Controller {
    private $_oportunidad;
    public function __construct() 
    public function index($pagina = false) {
        $this->_acl->acceso('crear_oportunidad');

    public function nuevo() {
        $this->_acl->acceso('crear_oportunidad');
        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);
            $datos = array(
            $noperacion = $this->_oportunidad->crear($datos);
                $productos = array(
            }
            $bitacora = array(
            );
            $this->_bitacora->crear($bitacora);
            $this->redireccionar('admin/oportunidad/detalles/' . $noperacion,'Oportunidad creada con exito',3);
        }
        $this->_view->renderizar('nuevo', 'oportunidad');
    }

    public function detalles($id) {
        $this->_acl->acceso('crear_oportunidad');
        $tempProductos = $this->_oprpro->consultar($condicion);
        $this->_view->assign('tempProductos', $tempProductos);
        $temp = "";
        for ($i = 0; $i < count($tempProductos); $i++) {
            $temp .= "'" . $tempProductos[$i]['pro_key'] . "',";
        }
        $temp = trim($temp, ',');
        $condicion = "pro_key in ({$temp})";
        $productos = $this->_producto->consultar($condicion);
        $this->_view->assign('productos', $productos);

        $condicion = "opo_key = {$id} ORDER BY bit_fecha DESC";
        $actividades = $this->_bitacora->consultar($condicion);
        $this->_view->assign('actividades', $actividades);

        if ($this->getInt('guardar') == 1) {
            $datos = array(
                'bit_key' => $this->getTexto('actividad'),
                'bit_estado' => 0
            );
            $this->_bitacora->cerrar($datos);
            $this->redireccionar("admin/oportunidad/detalles/{$id}");
        }

        $this->_view->renderizar('detalles', 'oportunidad');
    }
/*
    public function reasignar($id) {
        $this->_acl->acceso('reasignar_oportunidad');
        $condicion = "crm_opr_key={$id}";
        $oportunidades = $this->_oportunidad->consultarOportunidad($condicion);
        $this->_view->assign('oportunidades', $oportunidades[0]);
        $condicion = "rol_key!=2";
        $usuarios = $this->_usuario->consultarUsuario($condicion);
        $this->_view->assign('usuarios', $usuarios);
        if ($this->getInt('guardar') == 1) {
            $datos = array(
                'crm_opr_fecha_fin' => $oportunidades[0]['crm_opr_fecha_fin'],
                'crm_niv_key' => $oportunidades[0]['crm_niv_key'],
                'crm_med_key' => $oportunidades[0]['crm_med_key'],
                'crm_opr_estado' => $oportunidades[0]['crm_opr_estado'],
                'usu_key' => $this->getTexto('usuario')
            );
            $this->_oportunidad->actulizarOportunidad($id, $datos);
            $bitacora = array(
                'crm_bit_fecha_alarma' => date("Y-m-d"),
                'usu_key' => Session::get('id_usuario'),
                'crm_opr_key' => $id,
                'crm_bit_observacion' => 'Reasignacion de usuario'
            );
            $this->_bitacora->crearBitacora($bitacora);
            $this->redireccionar('crm/oportunidad');
        }
        $this->_view->renderizar('reasignar', 'oportunidad');
    }
*/
    public function actividad($id) {
        $this->_acl->acceso('crear_oportunidad');
        $condicion = "opo.opo_key={$id}";
        $oportunidades = $this->_oportunidad->consultar($condicion);
        $this->_view->assign('oportunidades', $oportunidades[0]);
        $niveles = $this->_nivel->consultar();
        $this->_view->assign('niveles', $niveles);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('validar', 'ajax'));
        if ($this->getInt('guardar') == 1) {
            if ($oportunidades[0]['niv_key'] != $this->getTexto('nivel')) {
                $datos = array(
                    'opo_fecha_fin' => $oportunidades[0]['opo_fecha_fin'],
                    'niv_key' => $this->getTexto('nivel'),
                    'med_key' => $oportunidades[0]['med_key'],
                    'usu_key' => $oportunidades[0]['usu_key'],
                    'opo_estado' => 1
                );
                $this->_oportunidad->actulizar($id, $datos);
                $bitacora = array(
                    'bit_fecha_alarma' => date("Y-m-d"),
                    'usu_key' => Session::get('id_usuario'),
                    'opo_key' => $id,
                    'bit_estado' => 0,
                    'bit_observacion' => 'Cambio de Nivel'.$nivel[0]['niv_nombre']
                );
                $this->_bitacora->crear($bitacora);
            }
            if ($this->getTexto('fecha_fin') != date("Y-m-d")) {
                $bitacora = array(
                    'bit_fecha_alarma' => $this->getTexto('fecha_fin'),
                    'usu_key' => Session::get('id_usuario'),
                    'opo_key' => $id,
                    'bit_estado' => 1,
                    'bit_observacion' => $this->getTexto('actividades')
                );
                $this->_bitacora->crear($bitacora);
            }
            if ($this->getTexto('fecha_fin') == date("Y-m-d")) {
                $bitacora = array(
                    'bit_fecha_alarma' => date("Y-m-d"),
                    'usu_key' => Session::get('id_usuario'),
                    'opo_key' => $id,
                    'bit_estado' => 0,
                    'bit_observacion' => $this->getTexto('actividades')
                );
                $this->_bitacora->crear($bitacora);
            }
            $this->redireccionar('admin/oportunidad/detalles/' . $id);
        }
        $this->_view->renderizar('actividad', 'oportunidad');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_oportunidad');
        $this->_view->assign('titulo', 'Eliminar Producto');
        $this->_oportunidad->eliminar($id);
        $this->redireccionar('admin/oportunidad','Oportunidad eliminada con exito',2);
    }

    public function imprimir($id) {
        $this->_acl->acceso('crear_oportunidad');
    }

    public function cerrar($id) {
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('oportunidad', $id);
        if ($this->getInt('guardar') == 1) {
            if ($this->getInt('tipoCierre')==2){
                $this->_cliente->convertir($oportunidad[0]['cli_key']);
            }
            $datos = array(
            $this->_oportunidad->actulizar($id, $datos);
            $bitacora = array(
            $this->_bitacora->crear($bitacora);
        }
        $this->_view->renderizar('cerrar', 'oportunidad');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(opo_observacion) like UPPER('%{$this->getTexto('valor')}%')) AND opo_estado!='0'";
            echo json_encode($this->_oportunidad->consultar($condicion));
        }
    }


?>