<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 03:52:22
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/producto/nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142856725559099a466d74d1-55995587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de99770fcb644577d694f627e6176edd71319642' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/producto/nuevo.tpl',
      1 => 1390595568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142856725559099a466d74d1-55995587',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
    'impuestos' => 0,
    'impuesto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59099a4671b1a0_37054183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59099a4671b1a0_37054183')) {function content_59099a4671b1a0_37054183($_smarty_tpl) {?><form id="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/producto/nuevo" autocomplete="off">
    <input class="form-control"  type="hidden" name="guardar" value="1" />
<div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Crear producto</b></font>											</div>			<div class="col-md-6" align="right">							<button class="btn btn-blue"><i class="icon-ok"> </i> Crear producto</button>				<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/cliente">Cancelar</a>			</div>				</div>				</div>	<hr>
    <table class="" style="width: 100%;"  cellpadding="8" >        <tr>            <th class="etiqueta">Nombre: </th>            <td><input class="form-control"  type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Referencia: </th>            <td><input class="form-control"  type="text" name="referencia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['referencia'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Valor: </th>            <td><input class="form-control"  type="text" name="valor" id="valor" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['valor'])===null||$tmp==='' ? '' : $tmp);?>
" required="true" /></td>        </tr>        <tr>            <th class="etiqueta">Impuesto: </th>            <td><select  class="form-control"  name="impuesto" required="true">                    <option value="" >Seleccione el impuesto</option>                    <?php  $_smarty_tpl->tpl_vars['impuesto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['impuesto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['impuestos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['impuesto']->key => $_smarty_tpl->tpl_vars['impuesto']->value){
$_smarty_tpl->tpl_vars['impuesto']->_loop = true;
?>                        <option value="<?php echo $_smarty_tpl->tpl_vars['impuesto']->value['imp_key'];?>
"><?php echo $_smarty_tpl->tpl_vars['impuesto']->value['imp_nombre'];?>
</option>                    <?php } ?>                </select>        </tr>		<tr>            <th class="etiqueta">Descripci&oacute;n: </th>		</tr>		<tr >            <td colspan="2"><textarea class="form-control" style="width:100%;height:70px;" name="descripcion" ><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['descripcion'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>        </tr>    </table>    <br/>    </form><?php }} ?>