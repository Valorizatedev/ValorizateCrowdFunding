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
<?php if ($_valid && !is_callable('content_590b35202a1638_79690771')) {function content_590b35202a1638_79690771($_smarty_tpl) {?><form id="form1">
admin/rol/asignarPermisos/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">Agregar permisos</a>
admin/rol/revocarPermiso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">Revocar permisos</a>
','<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_nombre'];?>
')">Modificar rol</a>
admin/rol/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
" title="Modificar el Nombre">Modificar rol</a*-->
admin/rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">Eliminar Rol</a>
</h4>
 $_from = $_smarty_tpl->tpl_vars['datos1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
</div>
 $_from = $_smarty_tpl->tpl_vars['dato']->value['permisos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['uno']->key => $_smarty_tpl->tpl_vars['uno']->value){
$_smarty_tpl->tpl_vars['uno']->_loop = true;
?>											

admin/rol/asignarPermisos/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/add.png" /> Agregar Permisos</a></td>
admin/rol/revocarPermiso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/cancelar_2.png" /> Revocar Permisos</a></td>
admin/rol"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/rew.png" /> Regresar</a>
admin/rol/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
" title="Modificar el Nombre"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/edit.png" /> Modificar</a>
admin/rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/layout/2id/img/bin.png" /> Eliminar</a>
admin/rol/editar/" autocomplete="off">
" required="true" />
admin/rol">Cancelar</a>