<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 09:31:48
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1875967795590b3b54326d27-77538342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e1c8b197d48ec83ab88208408fe1a1bb4e191ba' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/nuevo.tpl',
      1 => 1390837706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1875967795590b3b54326d27-77538342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'tDocumento' => 0,
    'nombre' => 0,
    'roles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590b3b5447e629_44396936',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b3b5447e629_44396936')) {function content_590b3b5447e629_44396936($_smarty_tpl) {?><form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/nuevo" autocomplete="off"><input class="form-control"  type="hidden" name="guardar" value="1" /><div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Crear usuario</b></font>											</div>			<div class="col-md-6" align="right">							<button class="btn btn-blue">Crear usuario</button>				<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario">Cancelar</a>			</div>				</div>				</div>	<hr>    <table class="" style="width: 100%;" cellpadding="8" >
        <tr align="left">            <th class=""><b>Nombre: </b></th>            <td>                <input class="form-control"  type="text" id="nombre" name="nombre" value="" required="true" />            </td>			<th class=""><b>Apellidos: </b></th>            <td>                <input class="form-control"  type="text" id="apellidos" name="apellidos" value="" />            </td>        </tr>
        <tr  align="left">            <th class=""><b>Tipo de documento: </b></th>            <td>                <select  class="form-control"  name='tipoDocumento' id="tipoDocumento" required="true">                    <option value="">Elija el tipo de documento</option>                    <?php  $_smarty_tpl->tpl_vars['nombre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nombre']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tDocumento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nombre']->key => $_smarty_tpl->tpl_vars['nombre']->value){
$_smarty_tpl->tpl_vars['nombre']->_loop = true;
?>                        <option value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value['tdo_key'];?>
"><?php echo $_smarty_tpl->tpl_vars['nombre']->value['tdo_nombre'];?>
</option>                    <?php } ?>                </select>            </td>            <th class=""><b>Numero de documento: </b></th>            <td>                <input class="form-control"  id="numDocumento" type="text" name="numDocumento" value="" required="true" />            </td>        </tr>
        <tr align="left">            <th class=""><b>E-mail: </b></th>            <td>                <input class="form-control"  id="email" type="email" name="email" value="" required="true" />            </td>            <th class=""><b>Rol:</b> </th>            <td>                <select  class="form-control"  id="rol" name='rol' required="true">                    <option value="">Elija un rol</option>                    <?php  $_smarty_tpl->tpl_vars['nombre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nombre']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nombre']->key => $_smarty_tpl->tpl_vars['nombre']->value){
$_smarty_tpl->tpl_vars['nombre']->_loop = true;
?>                        <option value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value['rol_key'];?>
"><?php echo $_smarty_tpl->tpl_vars['nombre']->value['rol_nombre'];?>
</option>                    <?php } ?>                </select>            </td>        </tr>        <tr align="left">            <th class=""><b>Imagen: </b></th>            <td colspan="">                <input class="form-control"  id="imagen" type="file" name="imagen" style="width:200px;" />            </td>                    <th class=""><b>Login: </b></th>            <td>                <input class="form-control"  id="login" type="texto" name="login" value="" required="true"/>            </td>        </tr>        <tr align="left">            <th class=""><b>Observaciones: </b></th>                   </tr>		  <tr align="left">            <td colspan="5">                <textarea class="form-control" id="observaciones" name="observaciones" style="width:100%;height:70px;"></textarea>            </td>        </tr>    </table>
</form><?php }} ?>