<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 04:40:33
         compiled from "/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/detalles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1097941415909a591484cb5-48344510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6592474b21361242f4018f6fb701ecf2d66dc0c' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/detalles.tpl',
      1 => 1390838664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1097941415909a591484cb5-48344510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    '_acl' => 0,
    'productos' => 0,
    'impuestos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5909a591575472_54098038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909a591575472_54098038')) {function content_5909a591575472_54098038($_smarty_tpl) {?><form id="form1">

 	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>Vista detallada</b></font>
			 </div>
  <div class="col-md-6 pull-right" align="right">			
		<div class="col-md-10 pull-right"  align="right">	
			<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto"><i class="icon-backward"> </i> Regresar</a>
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_producto')){?>
                    <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/editar/<?php echo $_smarty_tpl->tpl_vars['productos']->value['pro_key'];?>
"><i class="icon-pencil"> </i> Modificar</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_producto')){?>
                    <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/eliminar/<?php echo $_smarty_tpl->tpl_vars['productos']->value['pro_key'];?>
"><i class="icon-trash"> </i> Eliminar</a>
			<?php }?>
		</div>
	</div>
 </div>
 </div>
 <hr/>

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta"><b>Nombre:</b></th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['productos']->value['pro_nombre'];?>

            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Referencia:</b></th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['productos']->value['pro_referencia'];?>

            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Valor: </b></th>
            <td>
                $ <?php echo number_format($_smarty_tpl->tpl_vars['productos']->value['pro_valor'],0,',','.');?>

            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Impuesto: </b></th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['impuestos']->value['imp_nombre'];?>

            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Descripci&oacute;n: </b></th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['productos']->value['pro_descripcion'];?>

            </td>
        </tr>
    </table>
    <br/>
    
</form><?php }} ?>