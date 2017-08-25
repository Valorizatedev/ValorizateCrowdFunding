<?php

class oportunidadController extends Controller {
    private $_oportunidad;    private $_medio;    private $_oprpro;    private $_usuario;    private $_producto;    private $_bitacora;    private $_nivel;    private $_ciudad;    private $_cliente;	private $_proyecto;
    public function __construct() 	{        parent::__construct();        $this->_oportunidad = $this->loadModel('oportunidad', 'admin');        $this->_medio = $this->loadModel('medio', 'admin');        $this->_oprpro = $this->loadModel('oprpro', 'admin');        $this->_usuario = $this->loadModel('usuario', 'admin');        $this->_cliente = $this->loadModel('cliente', 'admin');        $this->_producto = $this->loadModel('producto', 'admin');        $this->_bitacora = $this->loadModel('bitacora', 'admin');        $this->_nivel = $this->loadModel('nivel', 'admin');        $this->_ciudad = $this->loadModel('ciudad', 'admin');		$this->_proyecto = $this->loadModel('proyecto', 'proyecto');				            }
    public function index($pagina = false) {
        $this->_acl->acceso('crear_oportunidad');        $this->getLibrary('paginador/paginador');        $paginador = new Paginador();        $this->_view->setJs(array('ajax'));        $this->_view->assign('titulo', 'Administraci&oacute;n de Oportunidades');        $condicion = 'opo.opo_estado=1';        if (Session::get('level') != 1) {            $condicion .= ' AND opo.usu_key=' . Session::get('id_usuario');        }		        $oportunidades = $this->_oportunidad->consultar($condicion);        $this->_view->assign('oportunidades', $paginador->paginar($oportunidades, $pagina));        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/oportunidad/index'));        $this->_view->renderizar('index', 'oportunidad');    }

    public function nuevo() {
        $this->_acl->acceso('crear_oportunidad');        $this->_view->assign('titulo', 'Crear oportunidad');	                   $this->_view->setJsPlugin(array('jquery.validate'));        $condicion = "med_estado!=0";        $medios = $this->_medio->consultar($condicion);        $this->_view->assign('medios', $medios);        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.maskMoney', 'jquery.ui.dialog'));        $this->_view->setJs(array('validar', 'ajax'));
        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);
            $datos = array(                'opo_fecha_ini' => $this->getTexto('fecha'),                'opo_fecha_fin' => $this->getTexto('fecha_fin'),                'niv_key' => "1",                'med_key' => $this->getTexto('medio'),                'opo_observacion' => $this->getTexto('observaciones'),                'usu_key' => Session::get("id_usuario"),                'cli_key' => $this->getTexto('solicitante_key')            );
            $noperacion = $this->_oportunidad->crear($datos);            for ($i = 1; $i <= $this->getInt('num_productos'); $i++) {
                $productos = array(                    'pro_key' => $this->getTexto('producto_key' . $i),                    'opo_key' => $noperacion,					'pxo_estimado_sin_impuesto' => $this->getTexto('antesimpuesto' . $i),                    'pxo_estimado_con_impuesto' => $this->getTexto('despuesimpuesto' . $i),                    'pxo_cantidad' => $this->getTexto('cantidad_producto' . $i)                );                $this->_oprpro->crear($productos);
            }
            $bitacora = array(				'bit_fecha_alarma' => date("Y-m-d"),                'usu_key' => Session::get('id_usuario'),                'opo_key' => $noperacion,                'bit_observacion' => 'Creacion de Oportunidad',                'bit_estado' => 0
            );
            $this->_bitacora->crear($bitacora);
            $this->redireccionar('admin/oportunidad/detalles/' . $noperacion,'Oportunidad creada con exito',3);			   
        }
        $this->_view->renderizar('nuevo', 'oportunidad');
    }

    public function detalles($id) {
        $this->_acl->acceso('crear_oportunidad');        $this->_view->assign('titulo', 'Administracion de Productos');        $condicion = "opo.opo_key={$id}";        $oportunidades = $this->_oportunidad->consultar($condicion);        $this->_view->assign('oportunidades', $oportunidades[0]);        $condicion = "cli_key={$oportunidades[0]['cli_key']}";        $solicitante = $this->_cliente->consultar($condicion);        $this->_view->assign('solicitante', $solicitante[0]);        $condicion = "opo_key={$oportunidades[0]['opo_key']}";
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
        $this->_acl->acceso('crear_oportunidad');		$this->_view->assign('titulo','Creación de actividad' );
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
                $this->_oportunidad->actulizar($id, $datos);								$nivel = $this->_nivel->consultar(" niv_key =".$this->getTexto('nivel'));				
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
        $this->_acl->acceso('crear_oportunidad');        $this->_view->assign('titulo', 'Imprimir Cotizaci&oacute;n');        $condicion = "opo.opo_key={$id}";        $oportunidad = $this->_oportunidad->consultar($condicion);        $condicion = "usu_key={$oportunidad[0]['usu_key']}";        $vendedor = $this->_usuario->consultar($condicion);        $condicion = "cli_key={$oportunidad[0]['cli_key']}";        $solicitante = $this->_cliente->consultar($condicion);        $condicion = "opo_key={$oportunidad[0]['opo_key']}";        $tempProductos = $this->_oprpro->consultar($condicion);        $temp = "";        for ($i = 0; $i < count($tempProductos); $i++) {            $temp .= "'" . $tempProductos[$i]['pro_key'] . "',";        }        $temp = trim($temp, ',');        $condicion = "pro_key in ({$temp})";        $productos = $this->_producto->consultar($condicion);        $this->getLibrary("fpdf" . DS . "fpdf");        $pdf = new fpdf();        $total_sin = 0;        $total_con = 0;        $pdf->SetFont('Arial', '', 12);        $pdf->AddPage();        $pdf->SetFillColor(120, 120, 120);        $pdf->Cell(20, 6, "", 0, 0, "");        $pdf->Cell(50, 6, "Fecha", 1, 0, "C", true);        $pdf->Cell(50, 6, "", 0, 0, "C");        $pdf->Cell(50, 6, "Codigo #", 1, 0, "C", true);        $pdf->Ln();        $pdf->Cell(20, 6, "", 0, 0, "");        $pdf->Cell(50, 6, $oportunidad[0]['opo_fecha_ini'], 1, 0, "C");        $pdf->Cell(50, 6, "", 0, 0, "C");        $pdf->Cell(50, 6, "TT-PC-".date("Y")."-".$oportunidad[0]['opo_key'], 1, 0, "C");        $pdf->Ln();        $pdf->Ln();        $pdf->Ln();        $pdf->Cell(30, 6, "Nombre: ", 0, 0, "R");        $pdf->Cell(160, 6, $solicitante[0]['cli_nombre'], "B", 0, "L");        $pdf->Ln();        $pdf->Cell(30, 6, utf8_decode("Teléfono: "), 0, 0, "R");        $pdf->Cell(160, 6, $solicitante[0]['cli_telefono'], "B", 0, "L");        $pdf->Ln();        $pdf->Cell(30, 6, utf8_decode("Dirección: "), 0, 0, "R");        $pdf->Cell(160, 6, $solicitante[0]['cli_direccion'], "B", 0, "L");        $pdf->Ln();        $pdf->Ln();        $pdf->Ln();        $pdf->Ln();        $pdf->Cell(20, 6, "Cantidad", 1, 0, "C", true);        $pdf->Cell(90, 6, "Nombre", 1, 0, "C", true);        $pdf->Cell(40, 6, "V/Unitario", 1, 0, "C", true);        $pdf->Cell(40, 6, "V/Total", 1, 0, "C", true);        $pdf->Ln();        foreach ($tempProductos as $tempProducto) {            $pdf->Cell(20, 6, $tempProducto['pxo_cantidad'], 1, 0, "C");            foreach ($productos as $producto) {                if ($producto['pro_key'] == $tempProducto['pro_key']) {                    $pdf->Cell(90, 6, $producto['pro_nombre'], 1, 0, "L");                }            }            foreach ($productos as $producto) {                if ($producto['pro_key'] == $tempProducto['pro_key']) {                    $pdf->Cell(40, 6, "$ " . number_format($producto['pro_valor'], 0, ',', '.'), 1, 0, "R");                }            }            $pdf->Cell(40, 6, "$ " . number_format($tempProducto['pxo_estimado_sin_impuesto'], 0, ',', '.'), 1, 0, "R");            $total_sin = $total_sin + $tempProducto['pxo_estimado_sin_impuesto'];            $total_con = $total_con + $tempProducto['pxo_estimado_con_impuesto'];            $pdf->Ln();        }        $pdf->Ln();        $pdf->Cell(150, 6, "Total sin impuesto:", 0, 0, "R");        $pdf->Cell(40, 6, "$" . number_format($total_sin, 0, ',', '.'), 0, 0, "R");        $pdf->Ln();        $pdf->Cell(150, 6, "Impuesto:", 0, 0, "R");        $pdf->Cell(40, 6, "$" . number_format($total_con - $total_sin, 0, ',', '.'), 0, 0, "R");        $pdf->Ln();        $pdf->Cell(150, 6, "Total con impuesto:", 0, 0, "R");        $pdf->Cell(40, 6, "$" . number_format($total_con, 0, ',', '.'), 0, 0, "R");        $pdf->Ln();        $pdf->SetY(-40);        $pdf->Cell(30);        $pdf->Ln();        $pdf->Cell(30, 6, "Vendedor: ", 0, 0, "R");        $pdf->Cell(80, 6, $vendedor[0]['usu_nombre'] . " " . $vendedor[0]['usu_apellidos'], "B", 0, "L");		$pdf->Ln();		$pdf->Ln();		$pdf->Cell(7);		$pdf->Cell(30, 6, "Este docuemnto es para uso interno, no debe ser publicado." , 0, 0, "L");        $pdf->Output("Cotizacion No TT-PC-".date("Y")."-{$oportunidad[0]['opo_key']}.pdf", 'D');
    }

    public function cerrar($id) {        $this->_view->assign('titulo', 'Cerrar Cotizaci&oacute;n');
        $this->_view->setJs(array('ajax'));		$this->_view->setCss(array('menu'));				$condicion = "opo.opo_key={$id}";        $oportunidad = $this->_oportunidad->consultar($condicion);		/*usuario*/		$condicion = " usu_key={$oportunidad[0]['usu_key']}";        $usuario = $this->_usuario->consultar($condicion);		$this->_view->assign('usuario', $usuario[0]);				$condicion = "1";        $usuarios = $this->_usuario->consultar($condicion);		$this->_view->assign('usuarios', $usuarios);				/*pxo*/		$condicion = " opo_key={$id} ";        $oprxpro = $this->_oprpro->consultar($condicion);		$this->_view->assign('oxp', $oprxpro);				
        $this->_view->assign('oportunidad', $id);
        if ($this->getInt('guardar') == 1) {
            if ($this->getInt('tipoCierre')==2){
                $this->_cliente->convertir($oportunidad[0]['cli_key']);
            }
            $datos = array(                'opo_fecha_fin' => date("Y-m-d"),                'niv_key' => $oportunidad[0]['niv_key'],                'med_key' => $oportunidad[0]['med_key'],                'opo_estado' => $this->getTexto('tipoCierre'),                'usu_key' => $oportunidad[0]['usu_key']            );
            $this->_oportunidad->actulizar($id, $datos);
            $bitacora = array(                'bit_fecha_alarma' => date("Y-m-d"),                'usu_key' => Session::get('id_usuario'),                'opo_key' => $id,                'bit_estado' => 0,                'bit_observacion' => 'Cierre de oportunidad: ' . $this->getTexto('observaciones')            );
            $this->_bitacora->crear($bitacora);            $this->redireccionar("admin/oportunidad",'Oportunidad cerrada',3);
        }
        $this->_view->renderizar('cerrar', 'oportunidad');
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(opo_observacion) like UPPER('%{$this->getTexto('valor')}%')) AND opo_estado!='0'";
            echo json_encode($this->_oportunidad->consultar($condicion));
        }
    }
		public function calcularFecha()	{			$this->getLibrary('feriados'.DS.'fecha'); 			//	echo 		$_POST['fechaini'],$_POST['duracion']			$fechas = new fechas();			echo json_encode( $fechas->comparaFechas($_POST['fechaini'],$_POST['duracion']) );						//$dompdf->load_html($html);				}
	public function cierreExitoso($id)	{				//print_r($_POST);echo $id;		//print_r( $this->_proyecto->consecutivo());		//exit;				/*cerrar exitoso la oportunidad y generar el proyecto y  mandar a tareas */		/*actualizamos la oportunidad*/						$condicion = " opo.opo_key={$id}";        $oportunidad = $this->_oportunidad->consultar($condicion);					$datos = array(                'opo_fecha_fin' => date("Y-m-d"),                'niv_key' => $oportunidad[0]['niv_key'],                'med_key' => $oportunidad[0]['med_key'],                'opo_estado' => $this->getTexto('tipoCierre'),                'usu_key' => $oportunidad[0]['usu_key']            );            $this->_oportunidad->actulizar($id, $datos);		/*se crea el proyecto*/		/*creacion del id de la oportunidad*/				//$consecutivo=$this->_proyecto->consecutivo();		$ranproyecto = substr(date("Y"),-2).date("m").date("d").rand(1,9999);		$proyecto = array(				'pro_pro_key' => $ranproyecto,                'pro_pro_nombre' => $this->getTexto('nombreProyecto'),                'usu_key' => $this->getTexto('usukey'),                'pro_pro_fecha_ini' => $this->getTexto('FechaInicio'),                'pro_pro_duracion' => $this->getTexto('duracion'),                'pro_pro_descripcion' => $this->getTexto('observacionProyecto')            );		        $this->_proyecto->crearProyecto($proyecto);								/*se crea el directorio del proyecto*/						$ruta = 'public/archivos/proyecto/'.$ranproyecto;		$this -> crearDirectorio($ruta);						$this->redireccionar('proyecto/proyecto/detalles/'.$ranproyecto,'Oportunidad cerrada con exito',3);			}		public function crearDirectorio($ruta){	if(!file_exists($ruta))		{			mkdir ($ruta);		}				}		public function subir($ruta){       // echo "entro";exit;		$uploaddir = $ruta;						$uploadfile = $uploaddir . basename(		str_replace("&", "_",		str_replace("ú", "u",			str_replace("ú", "u",				str_replace("ó", "o",					str_replace("í", "i",						str_replace("é", "e",							str_replace("á", "a",								str_replace("ñ", "n",									str_replace(" ", "_",$_FILES['userfile']['name'])))))))))							);		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {					echo "success";				} 				else {					echo "error";			    }			}		function dir_list($dir){            if ($dir[strlen($dir)-1] != '/') $dir .= '/';            if (!is_dir($dir)) return array();            $dir_handle  = opendir($dir);            $dir_objects = array();            while ($object = readdir($dir_handle))                if (!in_array($object, array('.','..')))                {                   				   $filename    = $dir . $object;                    $file_object = array(                                            'name' => $object,                                            'size' => filesize($filename),                                            'time' => date("Y-m-d H:i:s", filemtime($filename))                                        );                    $dir_objects[] = $file_object;                }		 						  			foreach ($dir_objects as $llave => $fila)				{				$fecha[$llave]  = $fila['time'];								}								array_multisort($fecha, SORT_DESC,  $dir_objects);			  									/*			echo "<pre>";print_r($dir_objects);echo "</pre>";				echo "<pre>";print_r($dir_objects);echo "</pre>";*/		            return $dir_objects;     }			public function delete($dir) {		unlink( ROOT."public".DS."archivos".DS.$dir);		$this->redireccionar('archivo/archivos');    }	}
?>