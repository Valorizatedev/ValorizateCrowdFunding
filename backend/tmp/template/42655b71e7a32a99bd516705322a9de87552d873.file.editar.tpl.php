<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 20:34:28
         compiled from "/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7818081725909a3b1629160-48116220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42655b71e7a32a99bd516705322a9de87552d873' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/editar.tpl',
      1 => 1493804725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7818081725909a3b1629160-48116220',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5909a3b17d3b62_91762484',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'productos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909a3b17d3b62_91762484')) {function content_5909a3b17d3b62_91762484($_smarty_tpl) {?><form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto/editar/<?php echo $_smarty_tpl->tpl_vars['productos']->value['pro_key'];?>
">    <input class="form-control"  type="hidden" name="guardar" value="1" /><div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Editar producto</b></font>											</div>			<div class="col-md-6" align="right">							<button class="btn btn-blue"><i class="icon-ok"> </i> Guardar cambios</button>					<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto">Cancelar</a>			</div>				</div>				</div>	<hr>    <table class="" style="width: 100%;">        <tr>            <th class="etiqueta"><b>Nombre: </b></th>            <td><input class="form-control"  type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['productos']->value['pro_nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta"><b>Referencia: </b></th>            <td><input class="form-control"  type="text" name="referencia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['productos']->value['pro_referencia'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>                <tr>            <th class="etiqueta"><b>Valor: </b></th>            <td><input class="form-control"  type="text" name="valor" id="valor" value="<?php echo (($tmp = @number_format($_smarty_tpl->tpl_vars['productos']->value['pro_valor'],0,',','.'))===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>         <tr>            <th class="etiqueta"><b>Valor al publico: </b></th>            <td><input class="form-control"  type="text" name="valor_cliente" id="valor_cliente" value="<?php echo (($tmp = @number_format($_smarty_tpl->tpl_vars['productos']->value['pro_valor_venta'],0,',','.'))===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta"><b>Cantidad:</b> </th>            <td><input class="form-control"  type="text" name="cantidad" id="cantidad" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['productos']->value['pro_cantidad'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>		<tr>            <th class="etiqueta"><b>Descripci&oacute;n: </b></th>		</tr>		<tr>            <td colspan="2"><textarea class="form-control" style="width:100%;height:70px;" name="descripcion" ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['productos']->value['pro_descripcion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>        </tr>    </table>    <br/>    </form><?php }} ?>