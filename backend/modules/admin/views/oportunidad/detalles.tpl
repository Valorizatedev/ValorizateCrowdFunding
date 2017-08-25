

<div class="row" >
		<div class="col-md-13">
			<div class="col-md-6" >
				<font class="brand" style="font-size:22px;" ><b>Vista detallada</b></font>
				
				
			</div>
			<div class="col-md-6" align="right">			
					<a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad"><i class="icon-backward"> </i> Regresar</a>
					<a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad/imprimir/{$oportunidades.opo_key}"><i class="icon-print"> </i> Imprimir</a>
					<a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad/actividad/{$oportunidades.opo_key}"><i class="icon-bell"> </i> Actividades</a>
				{if $_acl->permiso('eliminar_oportunidad')}
					<a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad/cerrar/{$oportunidades.opo_key}"><i class="icon-folder-close"> </i> Cerrar</a>
				{/if}
				
			</div>	
			</div>
		
		</div>
	<hr>

<table class="" style="">
    <tr>
        <th class="etiqueta"><h4>ID: </h4></th>
        <td>
            {$oportunidades.opo_key}
        </td>
		    <tr>
        <th class="etiqueta"><h4>Titulo: </h4></th>
        <td>
            {$oportunidades.opo_observacion}
        </td>
    </tr>
    </tr>
	
</table>
<table class="" style="width: 100%;">
    <tr>
        <th class="etiqueta"><h4>Solicitante:</h4></th>
	</tr>
	<tr>
        <td colspan="2">
            <table style="width: 100%" class="table-bordered table-striped">
                <tr>
                    <th>
                        Identificacion
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Direcci&oacute;n
                    </th>
                    <th>
                        Tel&eacute;fono
                    </th>
                </tr>
                <tr>
                    <td>
                        {$solicitante.cli_num_documento}
                    </td>
                    <td>
                        {$solicitante.cli_nombre}
                    </td>
                    <td>
                        {$solicitante.cli_direccion}
                    </td>
                    <td>
                        {$solicitante.cli_telefono}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th class="etiqueta"><h4>Productos:</h4></th>
	</tr>
	<tr>
        <td colspan="2">
            <table style="width: 100%" class="table-bordered table-striped">
                <tr>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Valor Unitario
                    </th>
                    <th>
                        Valor Total
                    </th>
                </tr>
                {$total_sin='0'}
                {$total_con='0'}
                {foreach $tempProductos as $tempProducto}
                    <tr>
                        <td>
                            {$tempProducto.pxo_cantidad}
                        </td>
                        <td>
                            {foreach $productos as $producto}
                                {if $producto.pro_key == $tempProducto.pro_key}
                                    {$producto.pro_nombre}
                                {/if}
                            {/foreach}
                        </td>
                        <td style="text-align: right">
                            {foreach $productos as $producto}
                                {if $producto.pro_key == $tempProducto.pro_key}
                                    $ {number_format($producto.pro_valor,0,',','.')}
                                {/if}
                            {/foreach}
                        </td>
                        <td style="text-align: right">
                            $ {number_format($tempProducto.pxo_estimado_sin_impuesto,0,',','.')}
                        </td>
                    </tr>
                    {$total_sin= $total_sin+$tempProducto.pxo_estimado_sin_impuesto}
                    {$total_con= $total_con+$tempProducto.pxo_estimado_con_impuesto}
                {/foreach}
                <tr>
                    <td colspan="3">
                        &nbsp;
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr style="text-align: right; font-weight: bold">
                    <td colspan="3">
                        Valor Total
                    </td>
                    <td>
                        $ {number_format($total_sin,0,',','.')}
                    </td>
                </tr>
                <tr style="text-align: right; font-weight: bold">
                    <td colspan="3">
                        Impuestos
                    </td>
                    <td>
                        $ {number_format($total_con - $total_sin,0,',','.')}
                    </td>
                </tr>
                <tr style="text-align: right; font-weight: bold">
                    <td colspan="3">
                        Valor Total con Impuestos
                    </td>
                    <td>
                        $ {number_format($total_con,0,',','.')}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <th class="etiqueta"><h4>Fecha de Compromiso: </h4></th>
        <td>
            {$oportunidades.opo_fecha_fin}
        </td>
    </tr>
</table>
<hr/>
<h4>Bitacora de Actividades</h4>
<table style="width: 100%" class="table-bordered table-striped">
    <tr>
        <th>Fecha de registro</th>
        <th>Actividad</th>
        <th>Fecha del evento</th>
        <th>Operaci&oacute;n</th>
    </tr>
    {foreach $actividades as $actividad}
        <tr>
            <td>
                {$actividad.bit_fecha}
            </td>
            <td>
                {$actividad.bit_observacion}
            </td>
            <td>
                {$actividad.bit_fecha_alarma}
            </td>
            <td>
                {if $actividad.bit_estado==1}
                    <form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/oportunidad/detalles/{$oportunidades.opo_key}">
                        <input type="hidden" name="guardar" value="1">
                        <input type="hidden" name="actividad" value="{$actividad.bit_key}">
                        <button class="btn btn-primary">Cerrar Actividad</button>
                    </form>
                {else}
                    Actividad Cerrada
                {/if}

            </td>
        </tr>
    {/foreach}
</table>


