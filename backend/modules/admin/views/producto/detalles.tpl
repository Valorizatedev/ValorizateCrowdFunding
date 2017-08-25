<form id="form1">

 	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>Vista detallada</b></font>
			 </div>
  <div class="col-md-6 pull-right" align="right">			
		<div class="col-md-10 pull-right"  align="right">	
			<a class="btn btn-primary" href="{$_layoutParams.root}admin/producto"><i class="icon-backward"> </i> Regresar</a>
            {if $_acl->permiso('modificar_producto')}
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/producto/editar/{$productos.pro_key}"><i class="icon-pencil"> </i> Modificar</a>
            {/if}
            {if $_acl->permiso('eliminar_producto')}
                    <a class="btn btn-danger" href="{$_layoutParams.root}admin/producto/eliminar/{$productos.pro_key}"><i class="icon-trash"> </i> Eliminar</a>
			{/if}
		</div>
	</div>
 </div>
 </div>
 <hr/>

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta"><b>Nombre:</b></th>
            <td>
                {$productos.pro_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Referencia:</b></th>
            <td>
                {$productos.pro_referencia}
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Valor: </b></th>
            <td>
                $ {number_format($productos.pro_valor,0,',','.')}
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Impuesto: </b></th>
            <td>
                {$impuestos.imp_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Descripci&oacute;n: </b></th>
            <td>
                {$productos.pro_descripcion}
            </td>
        </tr>
    </table>
    <br/>
    
</form>