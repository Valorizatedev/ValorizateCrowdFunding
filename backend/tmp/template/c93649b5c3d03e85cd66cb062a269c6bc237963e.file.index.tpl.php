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
<?php if ($_valid && !is_callable('content_590ba1707da2d7_80751835')) {function content_590ba1707da2d7_80751835($_smarty_tpl) {?>
admin/medio/nuevo" formmethod="POST"><i class="icon-plus"> </i> Crear nueva Fuente</a-->
<table class="" style="width: 100%;">
    <tr>
        <th>Nombre</th>
    <?php  $_smarty_tpl->tpl_vars['nivel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nivel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['niveles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nivel']->key => $_smarty_tpl->tpl_vars['nivel']->value){
$_smarty_tpl->tpl_vars['nivel']->_loop = true;
?>

 %
admin/nivel/detalles/<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
"><i class="icon-eye-open"> </i> Detalles</a>
','<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_nombre'];?>
','<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_nivel'];?>
','<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_descripcion'];?>
')" >Modificar</a>
admin/nivel/editar/<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
"><i class="icon-pencil"> </i> Modificar</a-->
admin/nivel/eliminar/<?php echo $_smarty_tpl->tpl_vars['nivel']->value['niv_key'];?>
"><i class="icon-trash"> </i> Eliminar</a>

admin/nivel/nuevo" autocompleted="off">
" required="true" /></td>
" placeholder="Porcentaje de Avance" required="true"/></td>
</textarea></td>
admin/nivel">Cancelar</a>
admin/nivel/editar/">
admin/rol">Cancelar</a>
<?php }} ?>