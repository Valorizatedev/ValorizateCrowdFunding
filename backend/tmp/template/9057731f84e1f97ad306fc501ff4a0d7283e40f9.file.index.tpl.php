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
<?php if ($_valid && !is_callable('content_5909b03f71c906_36245235')) {function content_5909b03f71c906_36245235($_smarty_tpl) {?><form id="form1">
admin/rol/nuevo"><i class="icon-plus"> </i> Crear un nuevo Rol.</a-->
 $_from = $_smarty_tpl->tpl_vars['datos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>

admin/rol/detalles/<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
">Permisos</a>
','<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_nombre'];?>
')" >Modificar</a-->
admin/rol/editar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
" class="btn btn-primary" title="Modificar el Nombre">Modificar</a>
admin/rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['rol_key'];?>
">Eliminar</a>

admin/rol/editar/" autocomplete="off">
" required="true" />
admin/rol">Cancelar</a>
admin/rol/nuevo" autocomplete="off">
admin/rol">Cancelar</a>