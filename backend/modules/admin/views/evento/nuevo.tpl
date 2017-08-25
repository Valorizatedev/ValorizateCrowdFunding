<form id="form1" method="POST" action="{$_layoutParams.root}admin/evento/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre:&nbsp; </th>
            <td><input type="text" name="nombre" id="nombre" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Fecha:&nbsp; </th>
            <td><input type="text" name="fecha" id="fecha" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n:&nbsp; </th>
            <td><textarea name="descripcion" id="descripcion"></textarea></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/evento"> Cancelar</a>
    </p>
</form>