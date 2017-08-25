<?php

class productoController extends Controller {

    private $_producto;
    private $_impuesto;

    public function __construct() {
        parent::__construct();
        $this->_producto = $this->loadModel('producto', 'admin');
        $this->_impuesto = $this->loadModel('impuesto', 'admin');
    }

    public function index($pagina = false) {
        $this->_acl->acceso('ver_producto');
        $this->getLibrary('paginador/paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('ajax'));
        $this->_view->assign('titulo', 'Administraci&oacute;n de Productos');
        $condicion = 'pro_estado!=0';
        $productos = $this->_producto->consultar($condicion);
        $this->_view->assign('productos', $paginador->paginar($productos, $pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginas', 'admin/producto/index'));
        $this->_view->renderizar('index', 'producto');
    }

    public function nuevo() {
        $this->_acl->acceso('crear_producto');
        $this->_view->assign('titulo', 'Registrar Producto');
        $condicion = "imp_estado!=0";
        $impuestos = $this->_impuesto->consultar($condicion);
        $this->_view->assign('impuestos', $impuestos);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.maskMoney'));
        //$this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);
            $datos = array(
                'pro_nombre' => $this->getTexto('nombre'),
                'pro_descripcion' => $this->getTexto('descripcion'),
                'pro_valor' => str_replace(".", "", $this->getTexto('valor')),
                'pro_referencia' => $this->getTexto('referencia'),
                'imp_key' => $this->getTexto('impuesto')
            );
            $this->_producto->crear($datos);
            // $this->_view->assign('datos', array());
            // $this->_view->assign('_mensaje', "El producto '{$this->getTexto('nombre')}' fue creado exitosamente");			  $this->redireccionar('admin/producto',   'Producto creado con exito',3);
        }
        $this->_view->renderizar('nuevo', 'producto');
    }

    public function detalles($id) {
        $this->_acl->acceso('ver_producto');
        $this->_view->assign('titulo', 'Administracion de Productos');
        $condicion = "pro_key={$id}";
        $productos = $this->_producto->consultar($condicion);
        $this->_view->assign('productos', $productos[0]);
        $condicion = "imp_key={$productos[0]['imp_key']}";
        $impuestos = $this->_impuesto->consultar($condicion);
        $this->_view->assign('impuestos', $impuestos[0]);
        $this->_view->renderizar('detalles', 'producto');
    }

    public function editar($id) {
        $this->_acl->acceso('modificar_producto');
        $this->_view->assign('titulo', 'Actualizar Productos');
        $condicion = "pro_key={$id}";
        $productos = $this->_producto->consultar($condicion);
        $this->_view->assign('productos', $productos[0]);
        $impuestos = $this->_impuesto->consultar();
        $this->_view->assign('impuestos', $impuestos);
        $this->_view->setJsPlugin(array('jquery.validate', 'jquery.maskMoney'));
        $this->_view->setJs(array('validar'));

        if ($this->getInt('guardar') == 1) {

            $datos = array(
                'pro_nombre' => $this->getTexto('nombre'),
                'pro_descripcion' => $this->getTexto('descripcion'),
                'pro_valor' => str_replace(".", "", $this->getTexto('valor')),
                'pro_referencia' => $this->getTexto('referencia'),
                'imp_key' => $this->getTexto('impuesto')
            );
            $this->_producto->actulizar($id, $datos);
            $this->_view->assign('_mensaje', "El producto '{$this->getTexto('nombre')}' fue actualizado exitosamente");
            $condicion = "pro_key={$id}";
            $productos = $this->_producto->consultar($condicion);
            $this->_view->assign('productos', $productos[0]);
            $this->redireccionar('admin/producto/detalles/'.$id,   'Producto editado con exito',3);
        }
        $this->_view->renderizar('editar', 'producto');
    }

    public function eliminar($id) {
        $this->_acl->acceso('eliminar_producto');
        $this->_view->assign('titulo', 'Eliminar Producto');
        $this->_producto->eliminar($id);
      //  $this->redireccionar('admin/producto');$this->redireccionar('admin/producto',   'Producto eliminado con exito',2);
    }

    public function consultaAjax() {
        if ($this->getTexto('valor')) {
            $condicion = "(UPPER(pro_nombre) like UPPER('%{$this->getTexto('valor')}%') OR
                UPPER(pro_referencia) like UPPER('%{$this->getTexto('valor')}%')) AND pro_estado!='0'";
            echo json_encode($this->_producto->consultar($condicion));
        }
    }

}

?>