<?php

class contactoController extends Controller {

    private $_contacto;
    private $_tdocumento;
    private $_departamento;
    private $_ciudad;
    private $_ecivil;

    public function __construct() {
        parent::__construct();
        $this->_contacto = $this->loadModel('contacto', 'admin');
        $this->_genero = $this->loadModel('genero', 'admin');
        $this->_tdocumento = $this->loadModel('tdocumento', 'admin');
        $this->_departamento = $this->loadModel('departamento', 'admin');
        $this->_ciudad = $this->loadModel('ciudad', 'admin');
        $this->_ecivil = $this->loadModel('estado', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_contacto');
        $this->_view->assign('titulo', 'Administraci&oacute:n de Contacto');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('clientes', $paginador->paginar($this->_contacto->consultar(), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/contacto/index'));
        $this->_view->assign('titulo', 'Nuevo contacto');

        $this->_view->renderizar('index', 'contacto');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_contacto');
        $condicion = "gen_estado!=0";
        $this->_view->assign('generos', $this->_genero->consultar($condicion));
        $condicion = "dep_estado!=0";
        $this->_view->assign('departamento', $this->_departamento->consultar($condicion));
        $condicion = "eci_estado!=0";
        $this->_view->assign('ecivil', $this->_ecivil->consultar($condicion));
        $this->_view->assign('titulo', 'Nuevo Contacto');

        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
        $this->_view->setJs(array('ajax', 'validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $condicion = "ciu_key='" . $this->getTexto('ciudadRes') . "'";
            $ciudad = $this->_ciudad->consultar($condicion);
            $condicion = "dep_key='" . $ciudad[0]['dep_key'] . "'";
            $departamento = $this->_departamento->consultar($condicion);
            $addr = $this->getTexto('direccion') . ", " . $ciudad[0]['ciu_nombre'] . ", " . $departamento[0]['dep_nombre'];
            $addr = str_replace("#", "%23", $addr);
            $addr = str_replace(" ", "+", $addr);
            $url = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$addr}&sensor=false");
            $url = json_decode($url, true);
            $latitud = $url['results'][0]['geometry']['location']['lat'];
            $logitud = $url['results'][0]['geometry']['location']['lng'];

            $datos = array(
                'con_nombre' => $this->getTexto('nombre'),
                'con_direccion' => $this->getTexto('direccion'),
                'con_telefono' => $this->getTexto('telefono'),
                'con_observaciones' => $this->getTexto('observaciones'),
                'con_latitud' => $latitud,
                'con_longitud' => $logitud,
                'con_email' => $this->getTexto('email'),
                'gen_key' => $this->getTexto('genero'),
                'con_fecha_nacimiento' => $this->getTexto('fecha_nacimiento'),
                'eci_key' => $this->getTexto('ecivil'),
                'con_hijos' => $this->getTexto('hijos'),
                'ciu_key' => $this->getTexto('ciudadRes')
            );
            $this->_contacto->crear($datos);
            // $this->_view->assign('datos', array());
            // $this->_view->assign('_mensaje', "El contacto '{$this->getTexto('nombre')}' fue creado exitosamente");			$this->redireccionar('admin/contacto/',  'Contacto creado con exito',3);
        }
        $this->_view->renderizar('nuevo', 'cliente');
    }
  public function nuevo2() {        $this->_acl->acceso('crear_contacto');        $condicion = "gen_estado!=0";        $this->_view->assign('generos', $this->_genero->consultar($condicion));        $condicion = "dep_estado!=0";        $this->_view->assign('departamento', $this->_departamento->consultar($condicion));        $condicion = "eci_estado!=0";        $this->_view->assign('ecivil', $this->_ecivil->consultar($condicion));        $this->_view->assign('titulo', 'Nuevo Contacto');        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));        $this->_view->setJs(array('ajax', 'validar'));        if ($this->getInt('guardar') == 1) {            $this->_view->assign('datos', $_POST);            $condicion = "ciu_key='" . $this->getTexto('ciudadc') . "'";            $ciudad = $this->_ciudad->consultar($condicion);            			$condicion = "dep_key='" . $ciudad[0]['dep_key'] . "'";            $departamento = $this->_departamento->consultar($condicion);            			$addr = $this->getTexto('direccionc') . ", " . $ciudad[0]['ciu_nombre'] . ", " . $departamento[0]['dep_nombre'];            $addr = str_replace("#", "%23", $addr);            $addr = str_replace(" ", "+", $addr);            $url = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$addr}&sensor=false");            $url = json_decode($url, true);            $latitud = $url['results'][0]['geometry']['location']['lat'];            $logitud = $url['results'][0]['geometry']['location']['lng'];            $datos = array(                'con_nombre' => $this->getTexto('nombrec'),                'con_direccion' => $this->getTexto('direccionc'),                'con_telefono' => $this->getTexto('telefonoc'),                'con_observaciones' => $this->getTexto('observacionesc'),                'con_latitud' => $latitud,                'con_longitud' => $logitud,                'con_email' => $this->getTexto('emailc'),                'gen_key' => $this->getTexto('generoc'),                'con_fecha_nacimiento' => $this->getTexto('fecha_nacimientoc'),                'eci_key' => $this->getTexto('ecivilc'),                'con_hijos' => $this->getTexto('hijosc'),                'ciu_key' => $this->getTexto('ciudadResc')            );            $this->_contacto->crear($datos);            // $this->_view->assign('datos', array());            // $this->_view->assign('_mensaje', "El contacto '{$this->getTexto('nombre')}' fue creado exitosamente");			$this->redireccionar('admin/contacto',  'Contacto creado con exito',3);        }        $this->_view->renderizar('nuevo', 'cliente');    }
    public function detalles($id) {
        $this->_acl->acceso('ver_contacto');
        $this->_view->assign('titulo', 'Administraci&oacute;n de Usuarios');
        $condicion = "con_key={$id}";
        $cliente = $this->_contacto->consultar($condicion);
        $this->_view->assign('cliente', $cliente[0]);
        $condicion = "ciu_key={$cliente[0]['ciu_key']}";
        $ciudadRes = $this->_ciudad->consultar($condicion);
        $this->_view->assign('ciudadRes', $ciudadRes[0]);
        $condicion = "dep_key={$ciudadRes[0]['dep_key']}";
        $departamentoRes = $this->_departamento->consultar($condicion);
        $this->_view->assign('departamentoRes', $departamentoRes[0]);
        $condicion = "gen_key={$cliente[0]['gen_key']}";
        $genero = $this->_genero->consultar($condicion);
        $this->_view->assign('genero', $genero[0]);
        $condicion = "eci_key={$cliente[0]['eci_key']}";
        $estado = $this->_ecivil->consultar($condicion);
        $this->_view->assign('estado', $estado[0]);
        $this->_view->renderizar('detalles', 'contacto');
    }

    public function editar($id) {
        $this->_acl->acceso('modificar_contacto');
        $this->_view->assign('titulo', 'Administraci&oacute;n de Contactos');
        $condicion = "con_key={$id}";
        $cliente = $this->_contacto->consultar($condicion);
        $this->_view->assign('cliente', $cliente[0]);
        $this->_view->assign('generos', $this->_genero->consultar());
        $this->_view->assign('departamento', $this->_departamento->consultar());
        $condicion = "ciu_key={$cliente[0]['ciu_key']}";
        $ciudadRes = $this->_ciudad->consultar($condicion);
        $this->_view->assign('ciudadRes', $ciudadRes[0]);
        $condicion = "eci_estado!=0";
        $estado = $this->_ecivil->consultar($condicion);
        $this->_view->assign('ecivil', $estado);
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('ajax', 'validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $condicion = "ciu.ciu_key='" . $this->getTexto('ciudadRes') . "'";
            $ciudad = $this->_ciudad->consultar($condicion);
            $condicion = "dep.dep_key='" . $ciudad[0]['dep_key'] . "'";
            $departamento = $this->_departamento->consultar($condicion);
            $addr = $this->getTexto('direccion') . ", " . $ciudad[0]['ciu_nombre'] . ", " . $departamento[0]['dep_nombre'];
            $addr = str_replace("#", "%23", $addr);
            $addr = str_replace(" ", "+", $addr);
            $url = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$addr}&sensor=false");
            $url = json_decode($url, true);
            $latitud = $url['results'][0]['geometry']['location']['lat'];
            $logitud = $url['results'][0]['geometry']['location']['lng'];

            $datos = array(
                'con_nombre' => $this->getTexto('nombre'),
                'con_direccion' => $this->getTexto('direccion'),
                'con_telefono' => $this->getTexto('telefono'),
                'con_observaciones' => $this->getTexto('observaciones'),
                'con_latitud' => $latitud,
                'con_longitud' => $logitud,
                'con_email' => $this->getTexto('email'),
                'gen_key' => $this->getTexto('genero'),
                'con_fecha_nacimiento' => $this->getTexto('fecha_nacimiento'),
                'eci_key' => $this->getTexto('ecivil'),
                'con_hijos' => $this->getTexto('hijos'),
                'ciu_key' => $this->getTexto('ciudadRes')
            );

            $this->_contacto->actualizar($id, $datos);
            // $this->_view->assign('_mensaje', "El contacto '{$this->getTexto('nombre')}' fue actualizado exitosamente");
            // $condicion = "con_key={$id}";
            // $cliente = $this->_contacto->consultar($condicion);
            // $this->_view->assign('cliente', $cliente[0]);				$this->redireccionar('admin/contacto/detalles/'.$id,  'Contacto editado con exito',3);
        }
        $this->_view->renderizar('editar', 'cliente');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_contacto');
        $this->_view->assign('titulo', 'Eliminar Usuarios');
        $this->_contacto->eliminar($id);
        $this->redireccionar('admin/contacto',   'Contacto eliminado con exito',2);
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $consulta = "UPPER(con_nombre) like UPPER('%" . $this->getTexto('valor') . "%') OR 
                UPPER(con_key) like UPPER('%" . $this->getTexto('valor') . "%')";
            echo json_encode($this->_contacto->consultar($consulta));
        }
    }

}

?>