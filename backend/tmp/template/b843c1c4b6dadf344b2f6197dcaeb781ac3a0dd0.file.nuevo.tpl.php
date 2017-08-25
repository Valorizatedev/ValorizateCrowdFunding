<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 03:55:59
         compiled from "/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42108758559099a9f4b7183-66085599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b843c1c4b6dadf344b2f6197dcaeb781ac3a0dd0' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/nuevo.tpl',
      1 => 1493801757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42108758559099a9f4b7183-66085599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59099a9f5402f6_31400372',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59099a9f5402f6_31400372')) {function content_59099a9f5402f6_31400372($_smarty_tpl) {?><form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto/nuevo" autocomplete="off">    <input class="form-control"  type="hidden" name="guardar" value="1" />    <div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Crear producto</b></font>											</div>			<div class="col-md-6" align="right">							<button class="btn btn-blue"><i class="icon-ok"> </i> Crear producto</button>				<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto">Cancelar</a>			</div>			</div>			</div>	<hr>    <table class="" style="width: 100%;"  cellpadding="8" >        <tr>            <th class="etiqueta">Nombre: </th>            <td><input class="form-control"  type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Referencia: </th>            <td><input class="form-control"  type="text" name="referencia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['referencia'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Valor: </th>            <td><input class="form-control"  type="text" name="valor" id="valor" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['valor'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Valor al publico: </th>            <td><input class="form-control"  type="text" name="valor_cliente" id="valor_cliente" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['valor_cliente'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Cantidad: </th>            <td><input class="form-control"  type="text" name="cantidad" id="cantidad" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cantidad'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>		<tr>            <th class="etiqueta">Descripci&oacute;n: </th>		</tr>		<tr >            <td colspan="2"><textarea class="form-control" style="width:100%;height:70px;" name="descripcion" ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['descripcion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>        </tr>    </table>    <br/>    </form><?php }} ?>