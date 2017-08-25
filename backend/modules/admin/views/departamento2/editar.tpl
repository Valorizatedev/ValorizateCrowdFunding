<form id="form1" action="{$_layoutParams.root}admin/departamento/editar/{$datos.dep_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <td class="etiqueta">Codigo: &nbsp;</td>
            <td><input type="texto" name="codigo" id="codigo" value="{$datos.dep_codigo|default:""}" /></td>
        </tr>
        <tr>
            <td class="etiqueta">Nombre:&nbsp; </td>
            <td><input type="texto" name="nombre" id="nombre" value="{$datos.dep_nombre|default:""}" /></td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/departamento"> Cancelar</a>
    </p>
</form>