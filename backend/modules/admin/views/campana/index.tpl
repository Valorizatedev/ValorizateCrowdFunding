<form id="form1">
    <div>
        <table>
            <tr>
                <td>
                    Buscar
                </td>
                <td>
                    <input type="search" name="buscar" id="buscar">
                </td>
            </tr>
        </table>
    </div>
    {if $_acl->permiso('crear_campana')}
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana/nuevo"><i class="icon-plus"> </i> Nueva Campa&ntilde;a</a>
    {/if}
    <table class="table table-bordered table-striped" style="width: 100%;">
        <tr>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center" colspan="3">Operaciones</th>
        </tr>
        {foreach $datos as $dato}
            <tr>
                <td>
                    {$dato.cam_nombre}
                </td>
                <td class="opcion">
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana/detalles/{$dato.cam_key}"><i class="icon-eye-open"> </i> Detalles</a>
                </td>
                {if $_acl->permiso('modificar_campana')}
                    <td class="opcion">
                        <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana/editar/{$dato.cam_key}"><i class="icon-pencil"> </i> Modificar</a>
                    </td>
                {/if}
                {if $_acl->permiso('eliminar_campana')}
                    <td class="opcion">
                        <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana/eliminar/{$dato.cam_key}"><i class="icon-trash"> </i> Eliminar</a>
                    </td>
                {/if}
            </tr>
        {/foreach}
    </table>

    {$paginacion|default:""}
</form>