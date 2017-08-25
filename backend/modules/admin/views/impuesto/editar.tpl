<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/impuesto/editar/{$impuestos.imp_key}">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td><input type="text" name="nombre" value="{$impuestos.imp_nombre|default:""}" required="true" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Valor: &nbsp;</th>
            <td><input type="text" name="valor" value="{$impuestos.imp_valor|default:""}" required="true" /></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/impuesto"> Cancelar</a>
    </p>
</form>