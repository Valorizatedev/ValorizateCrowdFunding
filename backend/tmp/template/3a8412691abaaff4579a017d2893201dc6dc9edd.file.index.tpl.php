<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 09:14:56
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:868035014590b37609f5862-07639448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a8412691abaaff4579a017d2893201dc6dc9edd' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/usuario/index.tpl',
      1 => 1410189468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '868035014590b37609f5862-07639448',
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
  'unifunc' => 'content_590b3760ad0659_83180442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b3760ad0659_83180442')) {function content_590b3760ad0659_83180442($_smarty_tpl) {?><form id="form1">
admin/usuario/nuevo"><i class="icon-plus"></i> Nuevo usuario</a>
    <table class="table table-bordered table-hover" align="center" style="width: 100%;">
 $_from = $_smarty_tpl->tpl_vars['datos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>



admin/usuario/detalles/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
">Detalles</a>
admin/usuario/editar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
">Modificar</a>
admin/usuario/eliminar/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
">Eliminar</a>
admin/usuario/pass/<?php echo $_smarty_tpl->tpl_vars['dato']->value['usu_key'];?>
" title="Genera una nueva contrase&ntilde;a">Password</a>

</form><?php }} ?>