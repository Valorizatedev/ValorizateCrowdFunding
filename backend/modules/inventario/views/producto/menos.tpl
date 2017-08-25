   <div class="row" >
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
        {foreach $productos as $producto}
                 <tr>
                     <td>
                         {$producto.pro_referencia}
                     </td>
                     <td >
                         {$producto.pro_nombre}
                     </td>
                     <td class="hidden-xs ">
                         $ {number_format($producto.pro_valor,0,',','.')}
                     </td>
                     <td class="hidden-xs">
                        $ {number_format($producto.pro_valor_venta,0,',','.')}
                     </td>
                     <td class="hidden-xs red" style="color: red" >
                         {$producto.pro_cantidad}
                     </td>
                     <td class="" align="right" >
                         
                     {if $_acl->permiso('modificar_producto')}
                             <a class="btn btn-primary" href="{$_layoutParams.root}inventario/producto/editar/{$producto.pro_key}">
                             <i class="entypo-arrows-ccw hidden-lg"> </i> <p class="hidden-xs hidden-sm"> Modificar</p></a>
                     {/if}
                     {if $_acl->permiso('eliminar_producto')}
                             <a class="btn btn-danger" href="{$_layoutParams.root}inventario/producto/eliminar/{$producto.pro_key}">
                              <i class="entypo-trash hidden-lg"> </i> <p class="hidden-xs hidden-sm">Eliminar</p>
                             </a>
                     {/if}
                  </td>
                 </tr>
             {/foreach}
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
</script> 