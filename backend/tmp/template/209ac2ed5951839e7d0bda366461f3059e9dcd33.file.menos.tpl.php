<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 23:27:32
         compiled from "/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/menos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1641549803590bf49b8b4f32-87361754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '209ac2ed5951839e7d0bda366461f3059e9dcd33' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/modules/inventario/views/producto/menos.tpl',
      1 => 1493956381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1641549803590bf49b8b4f32-87361754',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_590bf49ba5a6c3_54125121',
  'variables' => 
  array (
    'productos' => 0,
    'producto' => 0,
    '_acl' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590bf49ba5a6c3_54125121')) {function content_590bf49ba5a6c3_54125121($_smarty_tpl) {?>   <div class="row" >
      <div class="col-md-12">
         <div class="col-md-10" >
            <font class="brand" style="font-size:22px;" ><b>Administración Producto(menos) </b></font>          
         </div>
         
      </div>
   </div>
   <hr>

   <table class="table table-bordered datatable" id="table-4">
      <thead>
         <tr>
              <th>Cod</th>
              <th>Nombre</th>
              <th class="hidden-xs">Valor</th>
              <th class="hidden-xs">Valor publico</th>
              <th class="hidden-xs">Cantidad</th>
              <th class="" style="width: 20%" colspan=""></th>
          </tr>   
      </thead>
      <tbody>
        <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value){
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
                 <tr>
                     <td>
                         <?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_referencia'];?>

                     </td>
                     <td >
                         <?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_nombre'];?>

                     </td>
                     <td class="hidden-xs ">
                         $ <?php echo number_format($_smarty_tpl->tpl_vars['producto']->value['pro_valor'],0,',','.');?>

                     </td>
                     <td class="hidden-xs">
                        $ <?php echo number_format($_smarty_tpl->tpl_vars['producto']->value['pro_valor_venta'],0,',','.');?>

                     </td>
                     <td class="hidden-xs red" style="color: red" >
                         <?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_cantidad'];?>

                     </td>
                     <td class="" align="right" >
                         
                     <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('modificar_producto')){?>
                             <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto/editar/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
">
                             <i class="entypo-arrows-ccw hidden-lg"> </i> <p class="hidden-xs hidden-sm"> Modificar</p></a>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_producto')){?>
                             <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
inventario/producto/eliminar/<?php echo $_smarty_tpl->tpl_vars['producto']->value['pro_key'];?>
">
                              <i class="entypo-trash hidden-lg"> </i> <p class="hidden-xs hidden-sm">Eliminar</p>
                             </a>
                     <?php }?>
                  </td>
                 </tr>
             <?php } ?>
      </tbody>
      <tfoot>
            <tr>
                 <th>Cod</th>
                 <th>Nombre</th>
                 <th class="hidden-xs">Valor</th>
                 <th class="hidden-xs">Valor publico</th>
                 <th class="hidden-xs">Cantidad</th>
                 <th class="" style="width: 20%" colspan=""></th>
             </tr>   
      </tfoot>
   </table>

</div>


<script type="text/javascript">
   jQuery( document ).ready( function( $ ) {
      var $table4 = jQuery( "#table-4" );
      $table4.DataTable( {
      dom: 'Bfrtip',
      buttons: ['excelHtml5','pdfHtml5']
      });
   });
</script> <?php }} ?>