<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 05:26:07
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/rol/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16094609035909b03f60b213-83799394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9057731f84e1f97ad306fc501ff4a0d7283e40f9' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/rol/index.tpl',
      1 => 1406734608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16094609035909b03f60b213-83799394',
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
  'unifunc' => 'content_5909b03f71c906_36245235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909b03f71c906_36245235')) {function content_5909b03f71c906_36245235($_smarty_tpl) {?><form id="form1">	<div class="row" >		<div class="col-md-13">			<div class="col-md-4" >				<font class="brand" style="font-size:22px;" ><b>Roles</b></font>											</div>			<div class="col-md-4" >						<div class="col-md-5 pull-right" >						<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('crear_rol')){?>					<a href="javascript:;" onclick="$('#modal-3').modal('show')" class="btn btn-blue" >Nuevo tipo rol</a>					<!--a class="btn  btn-default" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/nuevo"><i class="icon-plus"> </i> Crear un nuevo Rol.</a-->				<?php }?>			</div>				</div>			<div class="col-md-4 pull-right" >											<div class="input-group" >					<div class="input-group-addon">						<i class="entypo-search"></i>					</div>						<input type="text" class="form-control" name="buscar" id="buscar"  placeholder="Buscar">					</div>			</div>		</div>	</div>		<hr>    <table class="table table-bordered table-hover" align="center">        <tr>            <th>Nombre</th>			<th colspan="3"></th>        </tr>        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>            <tr align="">                <td style ="">                    <?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_nombre'];?>
                </td>                <td class="" align="right">                    <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/detalles/<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
">Permisos</a>                <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_rol')){?>                                            <!--a href="javascript:;" onclick="$('#modal-2').modal('show')" class="btn btn-primary" onclick="datos('<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
','<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_nombre'];?>
')" >Modificar</a-->						<a  href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/editar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
" class="btn btn-primary" title="Modificar el Nombre">Modificar</a>             				                <?php }?>                <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_rol')){?>                    <?php if ((($_smarty_tpl->tpl_vars['dato']->value['rol_key']!=1)&&($_smarty_tpl->tpl_vars['dato']->value['rol_key']!=2))){?>                            <a class="btn  btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
">Eliminar</a>					<?php }?>				<?php }?>				</td>            </tr>        <?php } ?>    </table><div class="col-md-12 pull-right" >		<div align="right" >		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
	</div>	</div>		</form><!-- modal para la modificacion --><div class="modal fade custom-width" id="modal-2" >	<div class="trans" style="">	<div class="modal-dialog" style="width: 60%;">		<div class="modal-content">						<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				<h3 ><b>Editar rol</b></h3>			</div>			<form id="modificar" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/editar/" autocomplete="off">			<div class="modal-body">			    	<input type="hidden" name="guardar" value="1" />					<input type="hidden" id="key" name="key" value="" />					<br>					<div align="">							<b>Nombre:</b>							<input class="form-control"type="text" name="nombre" id="nombreedit" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['rol_nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" />					</div>					<br>			</div>						<div class="modal-footer">   			<button class="btn btn-blue"> Guardar Cambios</button>			  <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol">Cancelar</a>			  </form>			</div>		</div>	</div>	</div></div><div class="modal fade custom-width" id="modal-3" style="">	<div class="trans" style="">	<div class="modal-dialog " style="width: 60%;">		<div class="modal-content" style="">						<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				<h4 ><b>Crear rol</b></h4>			</div>	<form id="formcrear" enctype="multipart/form-data" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/nuevo" autocomplete="off">			<div class="modal-body">				<input type="hidden" name="guardar" value="1" />					<br>						<div align="">								<b>Nombre:</b>								<input class="form-control"type="text" name="nombre"  value="" required="true" />						</div>			</div>			<div class="modal-footer">				<button class="btn btn-blue">Crear Rol</button>				<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol">Cancelar</a>			  </form>			</div>		</div>	</div>	</div></div><?php }} ?>