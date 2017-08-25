<form id="form1">
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">
                Nombre: &nbsp;
            </th>
            <td>
                {$datos.eve_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Fecha: &nbsp;
            </th>
            <td>
                {$datos.eve_fecha}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Descripci&oacute;n: &nbsp;
            </th>
            <td>
                {$datos.eve_descripcion}
            </td>
        </tr>
    </table>
    <br/>
    <table class="" style="width: 100%;">
        <tr>
            <td>
                <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento"><i class="icon-backward"> </i> Regresar</a>
            </td>
            {if $_acl->permiso('modificar_evento')}
                <td>
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento/editar/{$datos.eve_key}"><i class="icon-pencil"> </i> Modificar</a>
                </td>
            {/if}
            {if $_acl->permiso('eliminar_evento')}
                <td>
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento/eliminar/{$datos.eve_key}"><i class="icon-trash"> </i> Eliminar</a>
                </td>
            {/if}
        </tr>
    </table>
</form>