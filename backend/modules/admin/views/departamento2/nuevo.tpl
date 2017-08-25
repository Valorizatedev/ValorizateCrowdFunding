<form id="form1" method="POST" action="{$_layoutParams.root}admin/departamento/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    <table class="" style="width: 100%;">
        <tr>
            <td class="etiqueta">Codigo:&nbsp; </td>
            <td><input type="text" name="codigo" value="" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Nombre:&nbsp; </td>
            <td><input type="text" name="nombre" value="" /></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/departamento"> Cancelar</a>
    </p>
</form>