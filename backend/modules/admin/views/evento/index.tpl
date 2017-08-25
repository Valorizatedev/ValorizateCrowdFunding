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
    {if $_acl->permiso('crear_evento')}
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento/nuevo"><i class="icon-plus"> </i> Nuevo Evento</a>
    {/if}

    <table class="table table-bordered table-striped" style="width: 100%;">
        <tr>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center" colspan="3">Operaciones</th>
        </tr>
        {foreach $datos as $dato}
            <tr>
                <td>
                    {$dato.eve_nombre}
                </td>
                <td class="opcion">
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento/detalles/{$dato.eve_key}"><i class="icon-eye-open"> </i> Detalles</a>
                </td>
                {if $_acl->permiso('modificar_evento')}
                    <td class="opcion">
                        <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento/editar/{$dato.eve_key}"><i class="icon-pencil"> </i> Modificar</a>
                    </td>
                {/if}
                {if $_acl->permiso('eliminar_evento')}
                    <td class="opcion">
                        <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento/eliminar/{$dato.eve_key}"><i class="icon-trash"> </i> Eliminar</a>
                    </td>
                {/if}
            </tr>
        {/foreach}
    </table>

    {$paginacion|default:""}
</form>