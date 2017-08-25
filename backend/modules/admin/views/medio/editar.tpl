<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/medio/editar/{$medios.med_key}">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td><input type="text" name="nombre" value="{$medios.med_nombre|default:""}" required="true" /></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/medio"> Cancelar</a>
    </p>
</form>