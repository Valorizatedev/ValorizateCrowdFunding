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
admin/usuario/nuevo" autocomplete="off">
admin/usuario">Cancelar</a>
        <tr align="left">
        <tr  align="left">
 $_from = $_smarty_tpl->tpl_vars['tDocumento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nombre']->key => $_smarty_tpl->tpl_vars['nombre']->value){
$_smarty_tpl->tpl_vars['nombre']->_loop = true;
?>
"><?php echo $_smarty_tpl->tpl_vars['nombre']->value['tdo_nombre'];?>
</option>
        <tr align="left">
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nombre']->key => $_smarty_tpl->tpl_vars['nombre']->value){
$_smarty_tpl->tpl_vars['nombre']->_loop = true;
?>
"><?php echo $_smarty_tpl->tpl_vars['nombre']->value['rol_nombre'];?>
</option>
</form><?php }} ?>