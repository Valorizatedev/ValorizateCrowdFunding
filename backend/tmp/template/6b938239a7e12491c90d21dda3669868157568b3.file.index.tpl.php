<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 03:54:20
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/producto/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35230965959099abc859086-96600446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b938239a7e12491c90d21dda3669868157568b3' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/producto/index.tpl',
      1 => 1390595522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35230965959099abc859086-96600446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'productos' => 0,
    'producto' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59099abc9728a3_32931900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59099abc9728a3_32931900')) {function content_59099abc9728a3_32931900($_smarty_tpl) {?>
admin/producto/nuevo" formmethod="POST"><i class="icon-plus"> </i> Nuevo Producto</a>
<table class="table table-bordered table-hover" align="center" style="width: 100%;">
    <tr>
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value){
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>



admin/producto/detalles/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
"><i class="icon-eye-open"> </i> Detalles</a>
admin/producto/editar/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
"><i class="icon-pencil"> </i> Modificar</a>
admin/producto/eliminar/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
"><i class="icon-trash"> </i> Eliminar</a>
