<form id="form1">
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">
                Nombre: &nbsp;
            </th>
            <td>
                {$datos.alm_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Piso: &nbsp;
            </th>
            <td>
                {$datos.alm_piso}
            </td>
        </tr>
                <tr>
            <th class="etiqueta">
                Bloque: &nbsp;
            </th>
            <td>
                {$datos.alm_bloque}
            </td>
        </tr>
                <tr>
            <th class="etiqueta">
                Local: &nbsp;
            </th>
            <td>
                {$datos.alm_local}
            </td>
        </tr>
    </table>
    <br/>
    <table class="" style="width: 100%;">
        <tr>
            <td>
                <a class="btn btn-primary" href="{$_layoutParams.root}admin/almacen"><i class="icon-backward"> </i> Regresar</a>
            </td>
            {if $_acl->permiso('modificar_almacen')}
                <td>
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/almacen/editar/{$datos.alm_key}"><i class="icon-pencil"> </i> Modificar</a>
                </td>
            {/if}
            {if $_acl->permiso('eliminar_almacen')}
                <td>
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/almacen/eliminar/{$datos.alm_key}"><i class="icon-trash"> </i> Eliminar</a>
                </td>
            {/if}
        </tr>
    </table>
</form>