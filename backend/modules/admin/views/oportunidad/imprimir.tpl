<table style="width: 100%">
    <tr>
        <td>
            <table class="table-bordered table-striped" style="margin-left: 10%">
                <tr>
                    <th>Fecha</th>
                </tr>
                <tr>
                    <td>{$oportunidad.opr_fecha_ini}</td>
                </tr>
            </table>
        </td>
        <td>
            <table class="table-bordered table-striped" align='right' style="margin-right: 10%">
                <tr>
                    <th>ID</th>
                </tr>
                <tr>
                    <td># {$oportunidad.opr_key}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table style="width: 100%">
                <tr>
                    <th class="etiqueta">Nombre(s): &nbsp;</th>
                    <td>{$solicitante.usu_nombre} {$solicitante.usu_apellidos}</td>
                </tr>
                <tr>
                    <th class="etiqueta">Tel&eacute;fono: &nbsp;</th>
                    <td>{$solicitante.usu_telefono}</td>
                </tr>
                <tr>
                    <th class="etiqueta">Direcci&oacute;n: &nbsp;</th>
                    <td>{$solicitante.usu_direccion}, {$ciudad.ciu_nombre}</td>
                </tr>
            </table>
        </td>
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
                    <td colspan="4">
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
        <td colspan="2">
            <table style="width: 100%">
                <tr>
                    <th class="etiqueta">
                        Vendedor: &nbsp;
                    </th>
                    <td>
                        {$vendedor.usu_nombre} {$vendedor.usu_apellidos}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>