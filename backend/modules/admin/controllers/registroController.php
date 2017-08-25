<?php

class registroController extends Controller {

    private $_campana;
    private $_almacen;
    private $_tdocumento;
    private $_departamento;
    private $_genero;
    private $_log;
    private $_puntos;
    private $_usuario;
    private $_ciudad;
    private $_secuencia;
    private $_boleta;
    private $_estadoc;

    public function __construct() {
        parent::__construct();
        $this->_campana = $this->loadModel('campana', 'admin');
        $this->_almacen = $this->loadModel('almacen', 'admin');
        $this->_tdocumento = $this->loadModel('tdocumento', 'admin');
        $this->_departamento = $this->loadModel('departamento', 'admin');
        $this->_genero = $this->loadModel('genero', 'admin');
        $this->_log = $this->loadModel('log', 'admin');
        $this->_puntos = $this->loadModel('puntos', 'admin');
        $this->_usuario = $this->loadModel('visitante', 'admin');
        $this->_ciudad = $this->loadModel('ciudad', 'admin');
        $this->_secuencia = $this->loadModel('secuence', 'admin');
        $this->_boleta = $this->loadModel('boleta', 'admin');
        $this->_estadoc = $this->loadModel('estado', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('crear_registro');
        $this->_view->assign('titulo', 'Registro de Facturas');
        $condicion = "cam_estado!=0 AND cam_fecha_ini<=now() AND cam_fecha_fin>=now()";
        $campanas = $this->_campana->consultar($condicion);
        $this->_view->assign("campanas", $campanas);
        $condicion = "alm_estado!=0";
        $almacenes = $this->_almacen->consultar($condicion);
        $this->_view->assign("almacenes", $almacenes);
        $condicion = "tdo_estado!=0";
        $tdocumentos = $this->_tdocumento->consultar($condicion);
        $this->_view->assign("tDocumento", $tdocumentos);
        $condicion = "dep_estado!=0";
        $departamentos = $this->_departamento->consultar($condicion);
        $this->_view->assign("departamento", $departamentos);
        $condicion = "gen_estado!=0";
        $generos = $this->_genero->consultar($condicion);
        $this->_view->assign("generos", $generos);
        $condicion = "eci_estado!=0";
        $ecivil = $this->_estadoc->consultar($condicion);
        $this->_view->assign("ecivil", $ecivil);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.maskMoney', 'jquery.ui.dialog', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('validar', 'ajaxVisitante', 'visitante'));
        if ($this->getInt("guardar") == 1) {
            $total = 0;
            for ($i = 1; $i <= $this->getInt("totalFacturas"); $i++) {
                $log = array(
                    'log_valor' => str_replace(".", "", $this->getTexto("valor{$i}")),
                    'vis_key' => $this->getTexto("keyVisitante"),
                    'log_fecha' => $this->getTexto("fecha"),
                    'alm_key' => $this->getTexto("almacen_key{$i}")
                );
                $total+=str_replace(".", "", $this->getTexto("valor{$i}"));
                $this->_log->crear($log);
            }
            $ticket = array();
            $num_rifa;
            $condicion = "vis_key={$this->getTexto("keyVisitante")}";
            $usuario = $this->_usuario->consultar($condicion);
            $condicion = "ciu_key={$usuario[0]['ciu_key']}";
            $ciudad = $this->_ciudad->consultar($condicion);
            $dia = date("N", strtotime($this->getTexto("fecha"))) - 1;
            for ($i = 0; $i < $this->getInt("totalCampanas"); $i++) {
                if ($this->getTexto("campana" . $i)) {
                    $condicion = "cam_key={$this->getTexto("campana" . $i)}";
                    $campana = $this->_campana->consultar($condicion);
                    $condicion = "cam_key={$this->getTexto("campana" . $i)} AND vis_key={$this->getTexto("keyVisitante")}";
                    $puntos_old = $this->_puntos->consultar($condicion);
                    if (!$puntos_old) {
                        $tempPuntos = intval($total / $campana[0]['cam_monto']);
                        $tempSaldo = $total - ($tempPuntos * $campana[0]['cam_monto']);
                        if (substr($campana[0]['cam_promo_dias'], $dia, 1) == 1) {
                            $tempPuntos = $tempPuntos * $campana[0]['cam_promo_multiplicar'];
                        }
                        $puntos = array(
                            'pun_puntos' => $tempPuntos,
                            'pun_saldo' => $tempSaldo,
                            'cam_key' => $this->getTexto("campana" . $i),
                            'vis_key' => $this->getTexto("keyVisitante")
                        );
                        for ($j = 0; $j < $tempPuntos; $j++) {
                            $num_rifa = $this->_secuencia->consultar("'campana{$campana[0]['cam_key']}'");
                            $tempTicket = array(
                                'nombre' => $usuario[0]['vis_nombre'],
                                'identificacion' => $usuario[0]['vis_num_documento'],
                                'telefono' => $usuario[0]['vis_telefono'],
                                'direccion' => $usuario[0]['vis_direccion'] . ", " . $ciudad[0]['ciu_nombre'],
                                'campana' => $campana[0]['cam_nombre'],
                                'numero' => $num_rifa[0]['id'],
                                'descripcion' => $campana[0]['cam_descripcion']
                            );
                            array_push($ticket, $tempTicket);
                            $boleta = array(
                                'cam_key' => $campana[0]['cam_key'],
                                'bol_numero' => $num_rifa[0]['id'],
                                'vis_key' => $usuario[0]['vis_key']
                            );
                            $this->_boleta->crear($boleta);
                        }
                    } else {
                        $tempTotal = $total + $puntos_old[0]['pun_saldo'];
                        $tempPuntos = intval($tempTotal / $campana[0]['cam_monto']);
                        $tempSaldo = $tempTotal - ($tempPuntos * $campana[0]['cam_monto']);
                        if (substr($campana[0]['cam_promo_dias'], $dia, 1) == 1) {
                            $tempPuntos = $tempPuntos * $campana[0]['cam_promo_multiplicar'];
                        }
                        $nPuntos = intval($tempTotal / $campana[0]['cam_monto']) + $puntos_old[0]['pun_puntos'];
                        $puntos = array(
                            'pun_puntos' => $nPuntos,
                            'pun_saldo' => $tempSaldo,
                            'cam_key' => $this->getTexto("campana" . $i),
                            'vis_key' => $this->getTexto("keyVisitante")
                        );
                        for ($j = 0; $j < $tempPuntos; $j++) {
                            $num_rifa = $this->_secuencia->consultar("'campana{$campana[0]['cam_key']}'");
                            $tempTicket = array(
                                'nombre' => $usuario[0]['vis_nombre'],
                                'identificacion' => $usuario[0]['vis_num_documento'],
                                'telefono' => $usuario[0]['vis_telefono'],
                                'direccion' => $usuario[0]['vis_direccion'] . ", " . $ciudad[0]['ciu_nombre'],
                                'campana' => $campana[0]['cam_nombre'],
                                'numero' => $num_rifa[0]['id'],
                                'descripcion' => $campana[0]['cam_descripcion']
                            );
                            array_push($ticket, $tempTicket);
                            $boleta = array(
                                'cam_key' => $campana[0]['cam_key'],
                                'bol_numero' => $num_rifa[0]['id'],
                                'vis_key' => $usuario[0]['vis_key']
                            );
                            $this->_boleta->crear($boleta);
                        }
                    }
                    $this->_puntos->crear($puntos);
                }
            }
            
            foreach ($ticket as $tickets) {
                $this->_view->assign('tickets', $tickets);
                $this->_view->renderizar('ticket', false, 'blank');
            }
            $this->redireccionar("admin/registro");
            exit;
        }
        $this->_view->renderizar('index', 'registro');
    }

}

?>