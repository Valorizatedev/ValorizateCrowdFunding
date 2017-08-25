<form id="form1">
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">
                Nombre: &nbsp;
            </th>
            <td>
                {$datos.cam_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Fecha inicio: &nbsp;
            </th>
            <td>
                {$datos.cam_fecha_ini}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Fecha Fin: &nbsp;
            </th>
            <td>
                {$datos.cam_fecha_fin}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Monto: &nbsp;
            </th>
            <td>
                $ {number_format($datos.cam_monto|default:"",0,',','.')}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">
                Descripci&oacute;n: &nbsp;
            </th>
            <td>
                {$datos.cam_descripcion}
            </td>
        </tr>
    </table>
    <br/>
    <table class="" style="width: 100%;">
        <tr>
            <td>
                <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana"><i class="icon-backward"> </i> Regresar</a>
            </td>
            {if $_acl->permiso('modificar_campana')}
                <td>
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana/editar/{$datos.cam_key}"><i class="icon-pencil"> </i> Modificar</a>
                </td>
            {/if}
            {if $_acl->permiso('eliminar_campana')}
                <td>
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana/eliminar/{$datos.cam_key}"><i class="icon-trash"> </i> Eliminar</a>
                </td>
            {/if}
        </tr>
    </table>
</form>