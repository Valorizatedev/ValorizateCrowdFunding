<form id="form1" method="POST" action="{$_layoutParams.root}admin/almacen/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre:&nbsp; </th>
            <td><input type="text" name="nombre" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Piso:&nbsp; </th>
            <td><input type="text" name="piso" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Bloque:&nbsp; </th>
            <td><input type="text" name="bloque" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Local:&nbsp; </th>
            <td><input type="text" name="local" value="" /></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/almacen"> Cancelar</a>
    </p>
</form>