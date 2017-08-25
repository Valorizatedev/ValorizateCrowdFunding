<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 16:43:17
         compiled from "/Applications/MAMP/htdocs/inventario/modules/admin/views/config/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1545235029590b371f3d3aa1-20096009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd611e5fc8bce8412e217441b536cdc3f344506' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/admin/views/config/index.tpl',
      1 => 1493934191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1545235029590b371f3d3aa1-20096009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590b371f413841_83394773',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b371f413841_83394773')) {function content_590b371f413841_83394773($_smarty_tpl) {?>

<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/config/guardar" novalidate="novalidate">
   <div class="row">
      <div class="col-md-12 ">
         <div class="form-group default-padding text-right" style="margin-left:-80px;">
          <button type="submit" class="btn btn-blue">Guardar Cambios</button>           
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
               <div class="panel-title">
                  Configuración General
               </div>
               <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <label for="field-1" class="col-sm-3 control-label">Nombre de la tienda</label> 
                  <div class="col-sm-5"> <input type="text" class="form-control" id="nombretienda" name="nombretienda" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['config_nombre'];?>
"> </div>
               </div>
               <div class="form-group">
                  <label for="field-4" class="col-sm-3 control-label">Correo Electronico (Admin)</label> 
                  <div class="col-sm-5"> <input type="text" class="form-control" id="email" name="email" id="field-4" data-validate="required,email" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['config_email'];?>
"> <span class="description">Es para enviar las notificaciones.</span> </div>
               </div>
               <div class="form-group">
                  <label for="field-3" class="col-sm-3 control-label">Cantidad de Articulos  Minimo</label> 
                  <div class="col-sm-5"> <input type="text" class="form-control" name="cantidadarticulos" id="cantidadarticulos" data-validate="required,url" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['config_cantiad_articulos'];?>
"> </div>
               </div>
               
            </div>
         </div>
      </div>
   </div>

</form><?php }} ?>