<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 16:47:28
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/nivel/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:690475297590ba17065bb43-82767908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c93649b5c3d03e85cd66cb062a269c6bc237963e' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/nivel/index.tpl',
      1 => 1406737300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '690475297590ba17065bb43-82767908',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'niveles' => 0,
    'nivel' => 0,
    'paginacion' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590ba1707da2d7_80751835',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590ba1707da2d7_80751835')) {function content_590ba1707da2d7_80751835($_smarty_tpl) {?><div class="row" >		<div class="col-md-13">			<div class="col-md-4" >				<font class="brand" style="font-size:22px;" ><b>Niveles</b></font>											</div>			<div class="col-md-4" >						<div class="col-md-5 pull-right" >						<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('crear_medio')){?>				<a href="javascript:;" onclick="$('#modal-3').modal('show')" class="btn btn-blue" > Nuevo nivel</a>					<!--a class="btn btn-blue" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/medio/nuevo" formmethod="POST"><i class="icon-plus"> </i> Crear nueva Fuente</a-->				<?php }?>															</div>				</div>			<div class="col-md-4 pull-right" >											<div class="input-group" >					<div class="input-group-addon">						<i class="entypo-search"></i>					</div>						<input type="text" class="form-control" name="buscar" id="buscar"  placeholder="Buscar">					</div>			</div>		</div>	</div>	<hr>
<table class="" style="width: 100%;">
    <tr>
        <th>Nombre</th>        <th>Porcentaje</th>        <th colspan=""></th>    </tr>
    <?php  $_smarty_tpl->tpl_vars['nivel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nivel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['niveles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nivel']->key => $_smarty_tpl->tpl_vars['nivel']->value){
$_smarty_tpl->tpl_vars['nivel']->_loop = true;
?>        <tr>            <td>                <?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_nombre'];?>
            </td>            <td style="text-align: center">                <?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_nivel'];?>
 %            </td>            <td class="opcion" align="right">                <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/nivel/detalles/<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
"><i class="icon-eye-open"> </i> Detalles</a>            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_nivel')){?>					<a href="javascript:;" class="btn btn-primary" onclick="$('#modal-2').modal('show');datos('<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
','<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_nombre'];?>
','<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_nivel'];?>
','<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_descripcion'];?>
')" >Modificar</a>                    <!--a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/nivel/editar/<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
"><i class="icon-pencil"> </i> Modificar</a-->            <?php }?>            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_nivel')){?>                   <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/nivel/eliminar/<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
"><i class="icon-trash"> </i> Eliminar</a>            <?php }?>			</td>        </tr>    <?php } ?></table><div class="col-md-12 pull-right" >		<div align="right" >		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
	</div>	</div>	<div class="modal fade custom-width" id="modal-3" style="">	<div class="trans" style="">	<div class="modal-dialog " style="width: 60%;">		<div class="modal-content" style="">						<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				<h4 ><b>Crear nivel</b></h4>			</div>	<form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/nivel/nuevo" autocompleted="off">			<div class="modal-body">				<input type="hidden" name="guardar" value="1" />									    <table class="" style="width: 100%;" >							<tr>								<th class="etiqueta"><b>Nombre: </b></th>								<td><input class ="form-control" type="text" name="nombre" id="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>															<th class="etiqueta"><b>Nivel: </b></th>								<td><input class ="form-control" type="text" name="nivel" id="nivel" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nivel'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="Porcentaje de Avance" required="true"/></td>							</tr>							<tr>								<th class="etiqueta"><b>Descripci&oacute;n: </b></th>								<td colspan="3"><textarea class ="form-control" name="descripcion" id="descripcion"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['descripcion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>							</tr>													</table>															</div>			<div class="modal-footer">				<button class="btn btn-blue">Crear nivel</button>				<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/nivel">Cancelar</a>			  </form>			</div>		</div>	</div>	</div></div><!-- modal para la modificacion --><div class="modal fade custom-width" id="modal-2" >	<div class="trans" style="">	<div class="modal-dialog" style="width: 60%;">		<div class="modal-content">						<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				<h3 ><b>Editar nivel</b></h3>			</div>			<form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/nivel/editar/">			<div class="modal-body">			    	<input type="hidden" name="guardar" value="1" />					<input type="hidden" id="key" name="key" value="" />					<br>													<table class="" style="width: 100%;">						<tr>							<th class="etiqueta"><b>Nombre: </b></th>							<td><input class="form-control" type="text" name="nombreedit" id="nombreedit"  value="" required="true" /></td>													<th class="etiqueta"><b>Nivel: </b></th>							<td><input class="form-control"  type="text" name="niveledit" id="niveledit" value="" required="true" /></td>						</tr>						<tr>							<th class="etiqueta"><b>Descripci&oacute;n: <b></th>							<td colspan="3"><textarea class="form-control" name="descripcionedit" id="descripcionedit" ></textarea></td>						</tr>											</table>									<br>			</div>						<div class="modal-footer">   			<button class="btn btn-blue"> Guardar cambios</button>			  <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol">Cancelar</a>			  </form>			</div>		</div>	</div>	</div></div>
<?php }} ?>