<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 09:05:22
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/rol/asignarPermisos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1087340373590b352230acc4-40844659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd72f93dff37a0534729ec5226a927d4c0fdb4250' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/rol/asignarPermisos.tpl',
      1 => 1382043994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1087340373590b352230acc4-40844659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
    '_layoutParams' => 0,
    'permisos' => 0,
    'i' => 0,
    'dato' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590b352243eca3_04198033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b352243eca3_04198033')) {function content_590b352243eca3_04198033($_smarty_tpl) {?><p>Seleccione los permisos a asignar para el rol: <?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_nombre'];?>
</p>
<form name="form1" method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/asignarPermisos/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
">
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable("1", null, 0);?>
    <input type="hidden" value="1" name="guardar"/>
    <table style="width: 100%">
        <tr>
            <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permisos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                <td>
                    <input type="checkbox" name="permiso<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value['per_key'];?>
"/>
                    <?php echo $_smarty_tpl->tpl_vars['dato']->value['per_modulo'];?>
-<?php echo $_smarty_tpl->tpl_vars['dato']->value['per_nombre'];?>

                </td>
                <?php if (($_smarty_tpl->tpl_vars['i']->value%3)==0){?>   
                </tr>
                <tr>
                <?php }?>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+"1", null, 0);?>
            <?php } ?>
        </tr>
    </table>
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="totalPermisos"/>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"></i> Asignar</button>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/rol/detalles/<?php echo $_smarty_tpl->tpl_vars['datos']->value['rol_key'];?>
" class="btn btn-primary">Cancelar</a>
    </p>
</form>
<?php }} ?>