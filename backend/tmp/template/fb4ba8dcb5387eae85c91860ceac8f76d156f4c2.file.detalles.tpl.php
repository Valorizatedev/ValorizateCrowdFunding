<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 09:05:19
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/rol/detalles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:867916478590b351fe661c0-80697992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb4ba8dcb5387eae85c91860ceac8f76d156f4c2' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/rol/detalles.tpl',
      1 => 1390580074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '867916478590b351fe661c0-80697992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'datos' => 0,
    'datos1' => 0,
    'dato' => 0,
    'uno' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590b35202a1638_79690771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b35202a1638_79690771')) {function content_590b35202a1638_79690771($_smarty_tpl) {?><form id="form1"> 	<div class="row" >		<div class="col-md-13">			 <div class="col-md-6" >				<font class="brand"style="font-size:22px;" ><b>Vista Detallada</b></font>			 </div>  <div class="col-md-6 pull-right" align="right">						<div class="col-md-10 pull-right"  align="right">	      <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('asignar_permisos')){?>			<a class="btn btn-blue" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/asignarPermisos/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">Agregar permisos</a>      <?php }?>      <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('asignar_permisos')){?>			<a class="btn btn-danger"  href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/revocarPermiso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">Revocar permisos</a>      <?php }?>	    <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_rol')){?>		   <a href="javascript:$('#modal-2').modal('show');"  class="btn btn-primary" data-toggle="modal" onclick="datos('<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
','<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_nombre'];?>
')">Modificar rol</a>            <!--a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
" title="Modificar el Nombre">Modificar rol</a*-->        <?php }?>        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_rol')){?>            <?php if ((($_smarty_tpl->tpl_vars['datos']->value['rol_key']!=1)&&($_smarty_tpl->tpl_vars['datos']->value['rol_key']!=2))){?>                <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">Eliminar Rol</a>            <?php }?>        <?php }?>    </div>	</div> </div> </div>  <hr/>    <h4><b> Nombre: </b></h4>	<h4><?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_nombre'];?>
</h4>	<br><br>	<h4><b>Permisos:</b></h4>    		<?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datos1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>                                					<div class="panel panel-dark" data-collapsed="1">								<div class="panel-heading">									<div class="panel-title"><?php echo $_smarty_tpl->tpl_vars['dato']->value['modulo'];?>
</div>									<div class="panel-options">										<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>										<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>										<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>									</div>								</div>																<!-- panel body -->								<div class="panel-body">									<?php  $_smarty_tpl->tpl_vars['uno'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['uno']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dato']->value['permisos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['uno']->key => $_smarty_tpl->tpl_vars['uno']->value){
$_smarty_tpl->tpl_vars['uno']->_loop = true;
?>																					<div class="perfil">												<?php echo $_smarty_tpl->tpl_vars['uno']->value['permiso'];?>
										</div>									<?php } ?>								</div>															</div>								                	<?php } ?>    <!--table class="" style="width: 100%;">		<tr>		        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('asignar_permisos')){?>    <td>        <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/asignarPermisos/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/add.png" /> Agregar Permisos</a></td>        <?php }?>        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('revocar_permisos')){?>    <td>        <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/revocarPermiso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/cancelar_2.png" /> Revocar Permisos</a></td>        <?php }?>    		<td width="40%"> </td>            <td>                <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/rew.png" /> Regresar</a>            </td>            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_rol')){?>                <td>                    <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
" title="Modificar el Nombre"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/edit.png" /> Modificar</a>                </td>            <?php }?>            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_rol')){?>                <?php if ((($_smarty_tpl->tpl_vars['datos']->value['rol_key']!=1)&&($_smarty_tpl->tpl_vars['datos']->value['rol_key']!=2))){?>                    <td>                        <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/bin.png" /> Eliminar</a>                    </td>                <?php }?>            <?php }?>        </tr>    </table--></form><!-- Modal --><div class="modal fade custom-width" id="modal-2" >	<div class="trans" style="">	<div class="modal-dialog" style="width: 60%;">		<div class="modal-content">						<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				<h3 ><b>Editar rol</b></h3>			</div>			<form id="modificar" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/editar/" autocomplete="off">			<div class="modal-body">			    	<input type="hidden" name="guardar" value="1" />					<input type="hidden" id="key" name="key" value="" />					<br>					<div align="center">							<b>Nombre:</b>							<input type="text" name="nombre" id="nombreedit" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['rol_nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" />					</div>					<br>			</div>						<div class="modal-footer">   			<button class="btn btn-blue"> Guardar Cambios</button>			  <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol">Cancelar</a>			  </form>			</div>		</div>	</div>	</div></div><?php }} ?>