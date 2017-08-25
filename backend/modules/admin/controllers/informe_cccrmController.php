<?php

class informe_cccrmController extends Controller {

    private $_informe;
    private $_evento;
    private $_almacen;
    private $_campana;
    private $_genero;
    private $_departamento;
    private $_usuario;

    public function __construct() {
        parent::__construct();
        $this->_informe = $this->loadModel('informe_cccrm', 'admin');
        $this->_evento = $this->loadModel('evento', 'admin');
        $this->_almacen = $this->loadModel('almacen', 'admin');
        $this->_campana = $this->loadModel('campana', 'admin');
        $this->_genero = $this->loadModel('genero', 'admin');
        $this->_departamento = $this->loadModel('departamento', 'admin');
        $this->_usuario = $this->loadModel('usuario', 'admin');
        $this->_view->setCss(array('styles'));
    }

    public function index() {
        $this->_acl->acceso('ver_informe_cccrm');
        $this->_view->setJs(array('geo'));
        if ($this->getInt('consultar') == 1) {
            echo json_encode($this->_informe->geo());
            exit;
        }
        $this->_view->renderizar('index', 'informe');
    }

    public function evento() {
        $this->_acl->acceso('ver_informe_cccrm');
        $condicion = "eve_estado!=0 Order by eve_fecha desc";
        $eventos = $this->_evento->consultar($condicion);
        $this->_view->assign("eventos", $eventos);
        $almacenes = $this->_almacen->consultar();
        $this->_view->assign("almacenes", $almacenes);
        if ($this->getInt('consultar') == 1) {
            $condicion = "AND log.log_fecha='{$this->getTexto('evento')}'";
            if ($this->getTexto('almacen')) {
                $condicion .= " AND alm.alm_key='{$this->getTexto('almacen')}'";
            }
            if ($this->getTexto('bloque')) {
                $condicion .= " AND alm.alm_bloque='{$this->getTexto('bloque')}'";
            }
            if ($this->getTexto('piso')) {
                $condicion .= " AND alm.alm_piso='{$this->getTexto('piso')}'";
            }
            $valores = $this->_informe->evento($condicion);
            //header_remove();
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename='Evento del {$this->getTexto('evento')}.csv';");
            header("Content-Transfer-Encoding: binary");
            echo "Fecha del Evento;Nombre del Evento;Nombre del Almacen;Ubicacion del Almacen;Valor Vendido\n";
            foreach ($valores as $valor) {
                echo "{$valor['eve_fecha']};{$valor['eve_nombre']};{$valor['alm_nombre']};Piso: {$valor['alm_piso']}, {$valor['alm_bloque']}-{$valor['alm_local']};$ " . number_format($valor['valor'], $decimals = 0, ',', '.') . "\n";
            }
            exit;
        }
        $this->_view->renderizar('evento', 'informe');
    }

    public function campana() {
        $this->_acl->acceso('ver_informe_cccrm');
        $condicion = "cam_estado!=0 Order by cam_fecha_ini desc";
        $campanas = $this->_campana->consultar($condicion);
        $this->_view->assign("campanas", $campanas);
        $almacenes = $this->_almacen->consultar();
        $this->_view->assign("almacenes", $almacenes);
        if ($this->getInt('consultar') == 1) {
            $condicion = "cam_key={$this->getTexto('campana')}";
            $campana = $this->_campana->consultar($condicion);
            $condicion = "AND log.log_fecha>='{$campana[0]['cam_fecha_ini']}' AND log.log_fecha<='{$campana[0]['cam_fecha_fin']}'";
            if ($this->getTexto('almacen')) {
                $condicion .= " AND alm.alm_key='{$this->getTexto('almacen')}'";
            }
            if ($this->getTexto('bloque')) {
                $condicion .= " AND alm.alm_bloque='{$this->getTexto('bloque')}'";
            }
            if ($this->getTexto('piso')) {
                $condicion .= " AND alm.alm_piso='{$this->getTexto('piso')}'";
            }
            $valores = $this->_informe->campana($condicion);
            //header_remove();
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename='Campaña {$campana[0]['cam_nombre']}.csv';");
            header("Content-Transfer-Encoding: binary");
            echo "Fecha;" . utf8_decode("Nombre de la Campaña") . ";Nombre del Almacen;Ubicacion del Almacen;Valor Vendido\n";
            foreach ($valores as $valor) {
                echo "{$valor['log_fecha']};".utf8_decode($campana[0]['cam_nombre']).";".utf8_decode($valor['alm_nombre']).";Piso: {$valor['alm_piso']}, {$valor['alm_bloque']}-{$valor['alm_local']};$ " . number_format($valor['valor'], $decimals = 0, ',', '.') . "\n";
            }
            exit;
        }
        $this->_view->renderizar('campana', 'informe');
    }

    public function visitantes() {
        $this->_acl->acceso('ver_informe_cccrm');
        $condicion = "gen.gen_estado!=0";
        $generos = $this->_genero->consultar($condicion);
        $this->_view->assign("generos", $generos);
        $condicion = "dep.dep_estado!=0 ORDER BY dep.dep_nombre";
        $departamentos = $this->_departamento->consultar($condicion);
        $this->_view->assign("departamentos", $departamentos);
        $this->_view->setJs(array('ajax'));
        if ($this->getInt('consultar') == 1) {
            $condicion = "";
            if ($this->getTexto('estado')) {
                $condicion .= " AND vis.eci_key={$this->getTexto('estado')}";
            }
            if ($this->getTexto('hijos')) {
                if ($this->getTexto('hijos') == '1') {
                    $condicion .= " AND vis.vis_hijos>0";
                }
                if ($this->getInt('hijos') == 2) {
                    $condicion .= " AND vis.vis_hijos<=0";
                }
            }
            if ($this->getTexto('genero')) {
                $condicion .= " AND vis.gen_key={$this->getTexto('genero')}";
            }
            if ($this->getTexto('ciudad')) {
                $condicion .= " AND vis.ciu_key={$this->getTexto('ciudad')}";
            }
            if ($this->getTexto('mes_cumple')) {
                $condicion .= " AND vis.vis_fecha_nacimiento like '%-{$this->getTexto('mes_cumple')}-%'";
            }
            if ($this->getTexto('edad_desde') && $this->getTexto('edad_hasta')) {
                $mes_dia = date('-m-d');
                $ano_desde = (date('Y') - $this->getTexto('edad_hasta') - 1);
                $ano_hasta = (date('Y') - $this->getTexto('edad_desde'));
                $condicion .= " AND vis.vis_fecha_necimiento>=('{$ano_desde}{$mes_dia}' + INTERVAL 1 DAY) AND vis.vis_fecha_nacimiento<='{$ano_hasta}{$mes_dia}'";
            }
            $usuarios = $this->_informe->visitante($condicion);
//            header_remove();
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename='Visitantes.csv';");
            header("Content-Transfer-Encoding: binary");
            echo utf8_decode("Tipo de Identificación").";".utf8_decode("Numero de Identificación").";Nombre;Telefono;Direccion;Ciudad;Departamento;Email;Fecha de Nacimiento;Estado Civil;Numero de Hijos\n";
            foreach ($usuarios as $usuario) {
                echo "{$usuario['tdo_nombre']};{$usuario['vis_num_documento']};{$usuario['vis_nombre']};{$usuario['vis_telefono']};{$usuario['vis_direccion']};" . utf8_decode($usuario['ciu_nombre']) . ";{$usuario['dep_nombre']};{$usuario['vis_email']};{$usuario['vis_fecha_nacimiento']};{$usuario['eci_nombre']};{$usuario['vis_hijos']}\n";
            }
            exit;
        }
        $this->_view->renderizar('visitante', 'informe');
    }

}

?>