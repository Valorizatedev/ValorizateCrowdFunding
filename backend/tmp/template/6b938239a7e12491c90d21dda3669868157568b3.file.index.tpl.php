<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 03:54:20
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/producto/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35230965959099abc859086-96600446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b938239a7e12491c90d21dda3669868157568b3' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/producto/index.tpl',
      1 => 1390595522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35230965959099abc859086-96600446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'productos' => 0,
    'producto' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59099abc9728a3_32931900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59099abc9728a3_32931900')) {function content_59099abc9728a3_32931900($_smarty_tpl) {?><div>	<div class="row" >		<div class="col-md-13">			<div class="col-md-4" >				<font class="brand" style="font-size:22px;" ><b>Productos</b></font>											</div>			<div class="col-md-4" >						<div class="col-md-5 pull-right" >						<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('crear_producto')){?>					<!--a href="javascript:$('#modal-3').modal('show');" class="btn btn-blue" > Nuevo producto</a-->					<a class="btn btn-blue" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/nuevo" formmethod="POST"><i class="icon-plus"> </i> Nuevo Producto</a>				<?php }?>			</div>				</div>			<div class="col-md-4 pull-right" >											<div class="input-group" >					<div class="input-group-addon">						<i class="entypo-search"></i>					</div>						<input type="text" class="form-control" name="buscar" id="buscar"  placeholder="Buscar">					</div>			</div>		</div>	</div>	<hr>
<table class="table table-bordered table-hover" align="center" style="width: 100%;">
    <tr>        <th>Referencia</th>        <th>Nombre</th>        <th>Valor</th>        <th colspan=""></th>    </tr>    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value){
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>        <tr>            <td>                <?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_referencia'];?>
            </td>            <td>                <?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_nombre'];?>
            </td>            <td>                $ <?php echo number_format($_smarty_tpl->tpl_vars['producto']->value['pro_valor'],0,',','.');?>
            </td>            <td class="opcion" align="right">                <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/detalles/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
"><i class="icon-eye-open"> </i> Detalles</a>            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_producto')){?>                    <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/editar/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
"><i class="icon-pencil"> </i> Modificar</a>            <?php }?>            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_producto')){?>                    <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/eliminar/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
"><i class="icon-trash"> </i> Eliminar</a>            <?php }?>			</td>        </tr>    <?php } ?></table><div class="col-md-12 pull-right" >		<div align="right" >		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
	</div>	</div><?php }} ?>