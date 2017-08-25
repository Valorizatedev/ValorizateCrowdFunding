<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/oportunidad/reasignar/{$oportunidades.opr_key}">
<table style="width: 100%">
    <input type="hidden" name="guardar" value="1">
    <tr>
        <th class="etiqueta">Nuevo Usuario: &nbsp;</th>
        <td>
            <select name="usuario">
                {foreach $usuarios as $usuario}
                    <option value="{$usuario.usu_key}" {if $usuario.usu_key==$oportunidades.usu_key}selected{/if}> {$usuario.usu_nombre} {$usuario.usu_apellidos}</option>
                {/foreach}
            </select>
        </td>
    </tr>
</table>
<p>
    <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
    <a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad"> Cancelar</a>
</p>
</form>