<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 22:46:07
         compiled from "/Applications/MAMP/htdocs/inventario/views/login/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:522054305909b01cc8db36-35413497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f56ae4d4ecbeb096de80d0bee6b648a8632d6ec' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/views/login/panel.tpl',
      1 => 1493955965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '522054305909b01cc8db36-35413497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5909b01cec93c1_63817074',
  'variables' => 
  array (
    'alertinventario' => 0,
    '_layoutParams' => 0,
    '_acl' => 0,
    'prospectos' => 0,
    'productos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5909b01cec93c1_63817074')) {function content_5909b01cec93c1_63817074($_smarty_tpl) {?>
<hr>


<div class="row">
   <div class="col-md-12">
   	  <?php if ($_smarty_tpl->tpl_vars['alertinventario']->value==1){?> 
      	<div class="alert alert-danger">
      		<i class="entypo-alert"></i>
      		<strong>Alerta de inventario!</strong> 
      		Tienes productos con menos de la cantidad mínima en la configuración
      		(<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto/menos">Ver mas</a>).
      	</div>
      <?php }?>
   </div>
</div>
<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto">
<div class="row col-sm-3">
	<div class="col-sm-12">
	
		<div class="tile-stats tile-primary text-center">
		<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('crear_producto')){?> 
			<div class="icon"><i class="entypo-briefcase"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $_smarty_tpl->tpl_vars['prospectos']->value;?>
" data-postfix="" data-duration="1500" data-delay="0"><?php echo $_smarty_tpl->tpl_vars['productos']->value;?>
</div>
			
			<h3>Productos</h3>
		<?php }?>
		</div>
		
	</div>
		
</div>
</a>

<?php }} ?>