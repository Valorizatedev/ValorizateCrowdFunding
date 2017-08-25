<?php

class clienteController extends Controller {

    private $_cliente;
    private $_tdocumento;
    private $_departamento;
    private $_ciudad;
    private $_tipoCliente;
    private $_ecivil;
    private $_relacion;	private $_log;

    public function __construct() {
        parent::__construct();
        $this->_cliente = $this->loadModel('cliente', 'admin');
        $this->_genero = $this->loadModel('genero', 'admin');
        $this->_tdocumento = $this->loadModel('tdocumento', 'admin');
        $this->_departamento = $this->loadModel('departamento', 'admin');
        $this->_ciudad = $this->loadModel('ciudad', 'admin');
        $this->_tipoCliente = $this->loadModel('tcliente', 'admin');
        $this->_ecivil = $this->loadModel('estado', 'admin');
        $this->_relacion = $this->loadModel('relacion', 'admin');		$this->_log = $this->loadModel('logcliente', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_cliente');
        $this->_view->assign('titulo', 'Administraci&oacute:n de Usuarios');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $condicion = "cli_estado!=0 AND cli_tipo=1";
        $this->_view->assign('clientes', $paginador->paginar($this->_cliente->consultar($condicion), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/cliente/index'));
        $this->_view->assign('titulo', 'Nuevo Usuario');

        $this->_view->renderizar('index', 'cliente');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_cliente');
        $condicion = "gen_estado!=0";
        $this->_view->assign('generos', $this->_genero->consultar($condicion));
        $condicion = "tdo_estado!=0";
        $this->_view->assign('tDocumento', $this->_tdocumento->consultar($condicion));
        $condicion = "dep_estado!=0";
        $this->_view->assign('departamento', $this->_departamento->consultar($condicion));
        $condicion = "tcl_estado!=0";
        $this->_view->assign('tipoCliente', $this->_tipoCliente->consultar($condicion));
        $condicion = "eci_estado!=0";
        $ecivil = $this->_ecivil->consultar($condicion);
        $this->_view->assign('ecivil', $ecivil);
        $this->_view->assign('titulo', 'Nuevo Cliente');

        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('ajax', 'validar','addcontacto'));

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
                'cli_nombre' => $this->getTexto('nombre'),
                'cli_num_documento' => $this->getTexto('numDocumento'),
                'cli_direccion' => $this->getTexto('direccion'),
                'cli_telefono' => $this->getTexto('telefono'),
                'cli_email' => $this->getTexto('email'),
                'cli_web' => $this->getTexto('web'),
                'cli_tipo' => 1,
                'tdo_key' => $this->getTexto('tipoDocumento'),
                'tcl_key' => $this->getTexto('tipoCliente'),
                'ciu_key' => $this->getTexto('ciudadRes'),
                'cli_observaciones' => $this->getTexto('observaciones'),
                'cli_latitud' => $latitud,
                'cli_longitud' => $logitud,
            );
            $key = $this->_cliente->crear($datos);
            if ($this->getInt('num_contactos')) {
                for ($i = 1; $i <= $this->getInt('num_contactos'); $i++) {
                    if ($this->getTexto('contacto_key' . $i)) {
                        $contacto = array(
                            'rel_observacion' => $this->getTexto('relacion' . $i),
                            'con_key' => $this->getTexto('contacto_key' . $i),
                            'cli_key' => $key['cli_key']
                        );
                        $this->_relacion->crear($contacto);
                    }
                }
            }
            // $this->_view->assign('datos', array());            // $this->_view->assign('_mensaje', "El cliente '{$this->getTexto('nombre')}' fue creado exitosamente");			$this->redireccionar('admin/cliente/','Cliente creado con exito',3);	
        }
        $this->_view->renderizar('nuevo', 'cliente');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_cliente');        $this->_view->setJs(array('AjaxUpload.2.0.min','actividad'));		$this->_view->setCss(array('DT_bootstrap','style','menu'));		
        $this->_view->assign('titulo', 'Administraci&oacute;n de Usuarios');
        $condicion = "cli_key={$id}";
        $cliente = $this->_cliente->consultar($condicion);
        $this->_view->assign('cliente', $cliente[0]);
        $condicion = "tdo_key={$cliente[0]['tdo_key']}";
        $tdocumento = $this->_tdocumento->consultar($condicion);
        $this->_view->assign('tdocumento', $tdocumento[0]);
        $condicion = "ciu_key={$cliente[0]['ciu_key']}";
        $ciudadRes = $this->_ciudad->consultar($condicion);
        $this->_view->assign('ciudadRes', $ciudadRes[0]);
        $condicion = "dep_key={$ciudadRes[0]['dep_key']}";
        $departamentoRes = $this->_departamento->consultar($condicion);
        $this->_view->assign('departamentoRes', $departamentoRes[0]);
        $condicion = "tcl_key={$cliente[0]['tcl_key']}";
        $tcliente = $this->_tipoCliente->consultar($condicion);
        $this->_view->assign('tcliente', $tcliente[0]);
        $condicion = "cli.cli_key={$id}";
        $contactos = $this->_relacion->consultar($condicion);
        $this->_view->assign('contactos', $contactos);
		$archivos = $this->dir_list("public/archivos/{$cliente[0]['cli_key']}");				$this->_view->assign('archivos',$archivos);				$condicion = " cli_key={$id}";        $ob = $this->_log->consultarLogc($condicion);        $this->_view->assign('observaciones', $ob);

        $this->_view->renderizar('detalles', 'cliente');
    }

    public function editar($id) {
        $this->_acl->acceso('modificar_cliente');
        $this->_view->assign('titulo', 'Administraci&oacute;n de Usuarios');
        $condicion = "cli_key={$id}";
        $cliente = $this->_cliente->consultar($condicion);
        $this->_view->assign('cliente', $cliente[0]);
        $condicion = "gen_estado!=0";
        $this->_view->assign('generos', $this->_genero->consultar($condicion));
        $condicion = "tdo_estado!=0";
        $this->_view->assign('tDocumento', $this->_tdocumento->consultar($condicion));
        $condicion = "dep_estado!=0";
        $this->_view->assign('departamento', $this->_departamento->consultar($condicion));
        $condicion = "tcl_estado!=0";
        $this->_view->assign('tipoCliente', $this->_tipoCliente->consultar($condicion));
        $condicion = "ciu_key={$cliente[0]['ciu_key']}";
        $ciudadRes = $this->_ciudad->consultar($condicion);
        $this->_view->assign('ciudad', $ciudadRes[0]);
        $condicion = "cli.cli_key={$id}";
        $contactos = $this->_relacion->consultar($condicion);
        $this->_view->assign("contactos", $contactos);
        $this->_view->assign("numcontactos", count($contactos));
        $condicion = "eci_estado!=0";
        $ecivil = $this->_ecivil->consultar($condicion);
        $this->_view->assign('ecivil', $ecivil);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.ui.datepicker'));
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
                'cli_nombre' => $this->getTexto('nombre'),
                'cli_num_documento' => $this->getTexto('numDocumento'),
                'cli_direccion' => $this->getTexto('direccion'),
                'cli_telefono' => $this->getTexto('telefono'),
                'cli_email' => $this->getTexto('email'),
                'cli_web' => $this->getTexto('web'),
                'cli_tipo' => 1,
                'tdo_key' => $this->getTexto('tipoDocumento'),
                'tcl_key' => $this->getTexto('tipoCliente'),
                'ciu_key' => $this->getTexto('ciudadRes'),
                'cli_observaciones' => $this->getTexto('observaciones'),
                'cli_latitud' => $latitud,
                'cli_longitud' => $logitud,
            );
            $key = $this->_cliente->actualizar($id, $datos);
            $condicion = "rel.cli_key={$id}";
            $this->_relacion->eliminar($condicion);
            if ($this->getInt('num_contactos')) {
                for ($i = 1; $i <= $this->getInt('num_contactos'); $i++) {
                    if ($this->getTexto('contacto_key' . $i)) {
                        $contacto = array(
                            'rel_observacion' => $this->getTexto('relacion' . $i),
                            'con_key' => $this->getTexto('contacto_key' . $i),
                            'cli_key' => $id
                        );
                        $this->_relacion->crear($contacto);
                    }
                }
            }
            // $condicion = "cli_key={$id}";            // $cliente = $this->_cliente->consultar($condicion);            // $this->_view->assign('cliente', $cliente[0]);            // $condicion = "cli.cli_key={$id}";            // $contactos = $this->_relacion->consultar($condicion);            // $this->_view->assign("contactos", $contactos);            // $this->_view->assign("numcontactos", count($contactos));            // $this->_view->assign('datos', array());
            // $this->_view->assign('_mensaje', "El cliente '{$this->getTexto('nombre')}' fue actualizado exitosamente");			$this->redireccionar('admin/cliente/detalles/'.$id,'Cliente editado con exito',3);	
        }

        $this->_view->renderizar('editar', 'cliente');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_cliente');
        $this->_view->assign('titulo', 'Eliminar Usuarios');
        $this->_cliente->eliminar($id);
        $this->redireccionar('admin/cliente','Cliente eliminado con exito',2 );
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $consulta = "UPPER(cli_nombre) like UPPER('%" . $this->getTexto('valor') . "%') OR 
                UPPER(cli_num_documento) like UPPER('%" . $this->getTexto('valor') . "%')";
            echo json_encode($this->_cliente->consultar($consulta));
        }
    }
		/*archiivos*/  	function dir_list($dir)    {            if ($dir[strlen($dir)-1] != '/') $dir .= '/';            if (!is_dir($dir)) return array();            $dir_handle  = opendir($dir);            $dir_objects = array();            while ($object = readdir($dir_handle))                if (!in_array($object, array('.','..')))                {                    $filename    = $dir . $object;                    $file_object = array(                                            'name' => $object,                                            'size' => filesize($filename),                                            'time' => date("Y-m-d H:i:s", filemtime($filename))                                        );                    $dir_objects[] = $file_object;                }            return $dir_objects;     }	 	 	 	 function subir($cliente){        $uploaddir = 'public/archivos/'.$cliente.'/';		echo $uploaddir;		$this->directorio($uploaddir);		//$dir = str_replace(" ", "_", $dir);	//	$uploadfile = $uploaddir . basename( str_replace(" ", "_",$_FILES['userfile']['name']));	$uploadfile = $uploaddir . basename(		str_replace("&", "_",		str_replace("ú", "u",			str_replace("ú", "u",				str_replace("ó", "o",					str_replace("í", "i",						str_replace("é", "e",							str_replace("á", "a",								str_replace("ñ", "n",									str_replace(" ", "_",$_FILES['userfile']['name'])))))))))							);		if (move_uploaded_file( str_replace(" ", "_",$_FILES['userfile']['tmp_name']), $uploadfile)) {					echo "success";				} 				else {					echo "error";			    }			}			function delete($cliente,$dir) {	$dir = str_replace(" ", "%20", $dir);	//	echo  $dir;exit;		unlink( ROOT."public".DS."archivos".DS.$cliente.DS.$dir);				$this->redireccionar('admin/cliente/detalles/'.$cliente);    }	function directorio($dir)	{		$ruta = $dir;				if(!file_exists($ruta))					{						mkdir ($ruta);						//subir ();						//echo "Se ha creado el directorio: " . $ruta;					}			//	else {						//echo "la ruta: " . $ruta . " ya existe ";				//	}		}	function nuevaTarea()	{		//print_r($_POST);			$datosTar = array(						'lcl_observacion' =>$_POST['nuevoact'],						'lcl_fecha' =>date("Y-m-d"),						'cli_key' =>$_POST['id_cliente'],						'usu_key' =>Session::get('id_usuario')						);				$this->_log->crearLog($datosTar);		//exit;		 $this->redireccionar('admin/cliente/detalles/'.$_POST['id_cliente'],'Tarea creada con exito',3);	}	
}

?>