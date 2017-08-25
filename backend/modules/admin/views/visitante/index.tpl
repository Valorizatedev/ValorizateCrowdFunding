{if $_acl->permiso('crear_registro')}
    <a class="btn btn-primary" href="{$_layoutParams.root}admin/visitante/nuevo"><i class="icon-plus"></i> Nuevo Visitante</a>
{/if}
<table class="table table-bordered table-striped" style="width: 100%;">
    <tr>
        <th>Identificacion</th>
        <th>Nombre(s)</th>
        <th colspan="4">Operaciones</th>
    </tr>

    {foreach $datos as $visitante}
        <tr>
            <td>
                {$visitante.vis_num_documento}
            </td>
            <td>
                {$visitante.vis_nombre}
            </td>
            <td class="opcion">
                <a class="btn btn-primary" href="{$_layoutParams.root}admin/visitante/detalles/{$visitante.vis_key}"><i class="icon-eye-open"></i> Detalles</a>
            </td>
            <td class="opcion">
                <a class="btn btn-primary" href="{$_layoutParams.root}admin/visitante/editar/{$visitante.vis_key}"><i class="icon-pencil"></i> Modificar</a>
            </td>
        </tr>
    {/foreach}
</table>
{$paginacion|default:""}
