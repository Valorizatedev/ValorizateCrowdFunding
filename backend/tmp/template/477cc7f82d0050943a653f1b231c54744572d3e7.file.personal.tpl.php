<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 05:25:12
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2420481625909b008793a87-94541284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '477cc7f82d0050943a653f1b231c54744572d3e7' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/personal.tpl',
      1 => 1390515278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2420481625909b008793a87-94541284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
    'tdocumento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5909b00881c854_09526854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909b00881c854_09526854')) {function content_5909b00881c854_09526854($_smarty_tpl) {?><form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/personal">
    <input class="form-control"  type="hidden" name="guardar" value="1" /><div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Perfil</b></font>											</div>			<div class="col-md-6" align="right">						    <button class="btn btn-blue"><i class="icon-ok"> </i> Guardar</button>				<a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/password"><i class="icon-lock"></i> Cambio de Contrase&ntilde;a</a>				<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Cancelar</a>			</div>			</div></div><hr>		
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td>
                <input class="form-control"  type="text" id="nombre" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usu_nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" />
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Apellidos: &nbsp;</th>
            <td>
                <input class="form-control"  type="text" id="apellidos" name="apellidos" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usu_apellidos'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Tipo de Documento</th>
            <td>
                <input class="form-control"  type="text" id="tipoCedula" name="tipoCedula" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tdocumento']->value['tdo_nombre'])===null||$tmp==='' ? '' : $tmp);?>
" readonly="true"/>
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Numero de Documento: &nbsp;</th>
            <td>
                <input class="form-control"  id="numDocumento" type="text" name="numDocumento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usu_num_documento'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" readonly />
            </td>
        </tr>
        <tr>
            <th class="etiqueta">E-mail: &nbsp;</th>
            <td>
                <input class="form-control"  id="email" type="email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usu_email'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Imagen: &nbsp;</th>
            <td>
                <input class="form-control"  id="imagen" type="file" name="imagen" />
                <input class="form-control"  type="hidden" name="old_imagen" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['usu_foto'];?>
" />
            </td>
        </tr>
    </table>
    <br/>
    <p>
      
    </p>
</form><?php }} ?>