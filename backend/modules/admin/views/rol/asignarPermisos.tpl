<p>Seleccione los permisos a asignar para el rol: {$datos.rol_nombre}</p>
<form name="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/rol/asignarPermisos/{$datos.rol_key}">
    {$i="1"}
    <input type="hidden" value="1" name="guardar"/>
    <table style="width: 100%">
        <tr>
            {foreach $permisos as $dato}
                <td>
                    <input type="checkbox" name="permiso{$i}" value="{$dato.per_key}"/>
                    {$dato.per_modulo}-{$dato.per_nombre}
                </td>
                {if ($i%3)==0}   
                </tr>
                <tr>
                {/if}
                {$i=$i+"1"}
            {/foreach}
        </tr>
    </table>
    <input type="hidden" value="{$i}" name="totalPermisos"/>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"></i> Asignar</button>
        <a href="{$_layoutParams.root}admin/rol/detalles/{$datos.rol_key}" class="btn btn-primary">Cancelar</a>
    </p>
</form>
