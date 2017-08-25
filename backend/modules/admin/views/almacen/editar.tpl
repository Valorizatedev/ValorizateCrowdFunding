<form id="form1" action="{$_layoutParams.root}admin/almacen/editar/{$datos.alm_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <td class="etiqueta">Nombre: &nbsp;</td>
            <td><input type="text" name="nombre" id="nombre" value="{$datos.alm_nombre|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Piso:&nbsp; </td>
            <td><input type="text" name="piso" id="piso" value="{$datos.alm_piso|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Bloque:&nbsp; </td>
            <td><input type="text" name="bloque" id="bloque" value="{$datos.alm_bloque|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Local:&nbsp; </td>
            <td><input type="text" name="local" id="local" value="{$datos.alm_local|default:""}" /></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/almacen"> Cancelar</a>
    </p>
</form>