<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 09:14:56
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:868035014590b37609f5862-07639448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a8412691abaaff4579a017d2893201dc6dc9edd' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/index.tpl',
      1 => 1410189468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '868035014590b37609f5862-07639448',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'datos' => 0,
    'dato' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590b3760ad0659_83180442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b3760ad0659_83180442')) {function content_590b3760ad0659_83180442($_smarty_tpl) {?><form id="form1">	<div class="row" >		<div class="col-md-13">			<div class="col-md-4" >				<font class="brand" style="font-size:22px;" ><b>Usuarios</b></font>											</div>			<div class="col-md-4" >						<div class="col-md-5 pull-right" >					<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('crear_usuario')){?>					<a class="btn btn-blue" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/nuevo"><i class="icon-plus"></i> Nuevo usuario</a>			<?php }?>			</div>				</div>			<div class="col-md-4 pull-right" >											<div class="input-group" >					<div class="input-group-addon">						<i class="entypo-search"></i>					</div>						<input type="text" class="form-control" name="buscar" id="buscar"  placeholder="Buscar">					</div>			</div>		</div>	</div>		<hr>
    <table class="table table-bordered table-hover" align="center" style="width: 100%;">        <tr>            <th>Usuario de Acceso</th>            <th>Nombre(s)</th>            <th>Apellidos</th>            <th colspan="4"></th>        </tr>        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>            <tr>                <td>                    <?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_login'];?>
                </td>                <td>                    <?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_nombre'];?>
                </td>                <td>                    <?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_apellidos'];?>
                </td>                <td class="opcion" align="right">                    <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/detalles/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
">Detalles</a>                <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_usuario')){?>                    <a class="btn  btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/editar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
">Modificar</a>                <?php }?>                <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_usuario')){?>                    <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/eliminar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
">Eliminar</a>                <?php }?>                <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('cambiar_password')){?>                    <a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/pass/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
" title="Genera una nueva contrase&ntilde;a">Password</a>                <?php }?>				 </td>            </tr>        <?php } ?>    </table>    <div class="col-md-12 pull-right" >		<div align="right" >		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
	</div>	</div>		
</form><?php }} ?>