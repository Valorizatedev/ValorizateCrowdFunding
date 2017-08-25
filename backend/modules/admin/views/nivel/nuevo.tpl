<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/nivel/nuevo">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td><input type="text" name="nombre" id="nombre" value="{$datos.nombre|default:""}" required="true" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n: &nbsp;</th>
            <td><textarea name="descripcion" id="descripcion">{$datos.descripcion|default:""}</textarea></td>
        </tr>
        <tr>
            <th class="etiqueta">Nivel: &nbsp;</th>
            <td><input type="text" name="nivel" id="nivel" value="{$datos.nivel|default:""}" placeholder="Porcentaje de Avance" required="true"/></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/nivel"> Cancelar</a>
    </p>
</form>