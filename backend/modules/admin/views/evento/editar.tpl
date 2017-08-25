<form id="form1" action="{$_layoutParams.root}admin/evento/editar/{$datos.eve_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <td class="etiqueta">Nombre: &nbsp;</td>
            <td><input type="text" name="nombre" id="nombre" value="{$datos.eve_nombre|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha:&nbsp; </td>
            <td><input type="text" name="fecha" id="fecha" value="{$datos.eve_fecha|default:""}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n:&nbsp; </th>
            <td><textarea name="descripcion" id="descripcion">{$datos.eve_descripcion|default:""}</textarea></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento"> Cancelar</a>
    </p>
</form>