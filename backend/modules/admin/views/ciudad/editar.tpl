<form id="form1" action="{$_layoutParams.root}admin/ciudad/editar/{$datos.ciu_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Codigo:&nbsp; </th>
            <td><input type="text" name="codigo" id="codigo" value="{$datos.ciu_codigo|default:""}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Nombre:&nbsp;</th>
            <td><input type="text" name="nombre" id="nombre" value="{$datos.ciu_nombre|default:""}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Departamento:&nbsp;</th>
            <td>
                <select name='departamento' id="departamento" >
                    <option value="">Elija el tipo de ciudadano</option>
                    {foreach $departamentos as $nombre}
                        <option value="{$nombre.dep_key}"{if isset($datos.dep_key)}{if $datos.dep_key==$nombre.dep_key}selected{/if}{/if}>{$nombre.dep_nombre}</option>
                    {/foreach}
                </select> 
            </td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/ciudad">Cancelar</a>
    </p>
</form>