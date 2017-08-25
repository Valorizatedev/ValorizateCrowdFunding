<?php

class visitanteController extends Controller {

    private $_vistante;
    private $_departamento;
    private $_ciudad;
    private $_tdocumento;
    private $_ecivil;
    private $_genero;

    public function __construct() {
        parent::__construct();
        $this->_visitante = $this->loadModel('visitante', 'admin');
        $this->_departamento = $this->loadModel('departamento', 'admin');
        $this->_ciudad = $this->loadModel('ciudad', 'admin');
        $this->_tdocumento = $this->loadModel('tdocumento', 'admin');
        $this->_ecivil = $this->loadModel('estado', 'admin');
        $this->_genero = $this->loadModel('genero', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('crear_registro');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('datos', $paginador->paginar($this->_visitante->consultar(), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/visitante/index'));
        $this->_view->assign('titulo', 'Administracion de Visitantes');

        $this->_view->renderizar('index', 'usuario');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_registro');
        $condicion = "tdo_estado!=0";
        $tdocumento = $this->_tdocumento->consultar($condicion);
        $this->_view->assign("tdocumento", $tdocumento);
        $condicion = "eci_estado!=0";
        $ecivil = $this->_ecivil->consultar($condicion);
        $this->_view->assign("ecivil", $ecivil);
        $condicion = "gen_estado!=0";
        $genero = $this->_genero->consultar($condicion);
        $this->_view->assign("generos", $genero);
        $condicion = "dep_estado!=0";
        $departamentos = $this->_departamento->consultar($condicion);
        $this->_view->assign("departamento", $departamentos);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('ajax', 'validar'));

        if ($this->getInt('guardar')) {
            $this->_view->assign('datos', $_POST);

            $condicion = "ciu.ciu_key='" . $this->getTexto('ciudadRes') . "'";
            $ciudad = $this->_ciudad->consultar($condicion);
            $addr = $this->getTexto('direccion') . ", " . $ciudad[0]['ciu_nombre'];
            $addr = str_replace("#", "%23", $addr);
            $addr = str_replace(" ", "+", $addr);
            $url = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$addr}&sensor=false");
            $url = json_decode($url, true);
            $latitud = $url['results'][0]['geometry']['location']['lat'];
            $logitud = $url['results'][0]['geometry']['location']['lng'];
            $datos = array(
                'vis_nombre' => $this->getTexto('nombre'),
                'vis_num_documento' => $this->getTexto('numDocumento'),
                'vis_direccion' => $this->getTexto('direccion'),
                'vis_telefono' => $this->getTexto('telefono'),
                'vis_email' => $this->getTexto('email'),
                'tdo_key' => $this->getTexto('tipoDocumento'),
                'ciu_key' => $this->getTexto('ciudadRes'),
                'vis_observaciones' => $this->getTexto('observaciones'),
                'vis_latitud' => $latitud,
                'vis_longitud' => $logitud,
                'gen_key' => $this->getTexto('genero'),
                'vis_fecha_nacimiento' => $this->getTexto('fecha_nacimiento'),
                'eci_key' => $this->getTexto('estado'),
                'vis_hijos' => $this->getTexto('hijos')
            );
            $key = $this->_visitante->crear($datos);
            if ($this->getInt('guardar') == 1) {
                if ($key) {
                    echo "1";
                } else {
                    echo "0";
                }
                exit;
            }
        }
        $this->_view->renderizar('nuevo', 'usuario');
    }

    public function detalles($id) {
        $this->_acl->acceso('crear_registro');
        $condicion = "vis_key={$id}";
        $visitante = $this->_visitante->consultar($condicion);
        $this->_view->assign("visitante", $visitante[0]);
        $condicion = "tdo_key={$visitante[0]['tdo_key']}";
        $tdocumento = $this->_tdocumento->consultar($condicion);
        $this->_view->assign("tdocumento", $tdocumento[0]);
        $condicion = "eci_key={$visitante[0]['eci_key']}";
        $ecivil = $this->_ecivil->consultar($condicion);
        $this->_view->assign("ecivil", $ecivil[0]);
        $condicion = "gen_key={$visitante[0]['gen_key']}";
        $genero = $this->_genero->consultar($condicion);
        $this->_view->assign("genero", $genero[0]);
        $condicion = "ciu_key={$visitante[0]['ciu_key']}";
        $ciudad = $this->_ciudad->consultar($condicion);
        $this->_view->assign("ciudad", $ciudad[0]);
        $condicion = "dep_key={$ciudad[0]['dep_key']}";
        $departamento = $this->_departamento->consultar($condicion);
        $this->_view->assign("departamento", $departamento[0]);


        $this->_view->renderizar('detalles', 'usuario');
    }

    public function editar($id) {
        $this->_acl->acceso('crear_registro');
        $condicion = "vis_key={$id}";
        $visitante = $this->_visitante->consultar($condicion);
        $this->_view->assign("visitante", $visitante[0]);
        $condicion = "tdo_estado!=0";
        $tdocumento = $this->_tdocumento->consultar($condicion);
        $this->_view->assign("tdocumento", $tdocumento);
        $condicion = "eci_estado!=0";
        $ecivil = $this->_ecivil->consultar($condicion);
        $this->_view->assign("ecivil", $ecivil);
        $condicion = "gen_estado!=0";
        $genero = $this->_genero->consultar($condicion);
        $this->_view->assign("generos", $genero);
        $condicion = "ciu_key={$visitante[0]['ciu_key']}";
        $ciudad = $this->_ciudad->consultar($condicion);
        $this->_view->assign("ciudad", $ciudad[0]);
        $condicion = "dep_estado!=0";
        $departamento = $this->_departamento->consultar($condicion);
        $this->_view->assign("departamento", $departamento);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('ajax', 'validar'));
        if ($this->getInt('guardar')) {
            $this->_view->assign('datos', $_POST);

            $condicion = "ciu.ciu_key='" . $this->getTexto('ciudadRes') . "'";
            $ciudad = $this->_ciudad->consultar($condicion);
            $addr = $this->getTexto('direccion') . ", " . $ciudad[0]['ciu_nombre'];
            $addr = str_replace("#", "%23", $addr);
            $addr = str_replace(" ", "+", $addr);
            $url = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$addr}&sensor=false");
            $url = json_decode($url, true);
            $latitud = $url['results'][0]['geometry']['location']['lat'];
            $logitud = $url['results'][0]['geometry']['location']['lng'];
            $datos = array(
                'vis_nombre' => $this->getTexto('nombre'),
                'vis_num_documento' => $this->getTexto('numDocumento'),
                'vis_direccion' => $this->getTexto('direccion'),
                'vis_telefono' => $this->getTexto('telefono'),
                'vis_email' => $this->getTexto('email'),
                'tdo_key' => $this->getTexto('tipoDocumento'),
                'ciu_key' => $this->getTexto('ciudadRes'),
                'vis_observaciones' => $this->getTexto('observaciones'),
                'vis_latitud' => $latitud,
                'vis_longitud' => $logitud,
                'gen_key' => $this->getTexto('genero'),
                'vis_fecha_nacimiento' => $this->getTexto('fecha_nacimiento'),
                'eci_key' => $this->getTexto('estado'),
                'vis_hijos' => $this->getTexto('hijos')
            );
            $key = $this->_visitante->actualizar($id,$datos);
            $this->redireccionar('admin/visitante');
        }
        $this->_view->renderizar('editar', 'usuario');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $consulta = "UPPER(vis_nombre) like UPPER('%" . $this->getTexto('valor') . "%') OR 
                UPPER(vis_num_documento) like UPPER('%" . $this->getTexto('valor') . "%')";
            echo json_encode($this->_visitante->consultar($consulta));
        }
    }

}

?>