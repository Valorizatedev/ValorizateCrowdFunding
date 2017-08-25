<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/producto/editar/{$productos.pro_key}">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td><input type="texto" name="nombre" value="{$productos.pro_nombre|default:""}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Referencia: &nbsp;</th>
            <td><input type="texto" name="referencia" value="{$productos.pro_referencia|default:""}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n: &nbsp;</th>
            <td><textarea name="descripcion" >{$productos.pro_descripcion|default:""}</textarea>
        </tr>
        <tr>
            <th class="etiqueta">Valor: &nbsp;</th>
            <td><input type="texto" name="valor" id="valor" value="{number_format($productos.pro_valor,0,',','.')|default:""}" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Impuesto: &nbsp;</th>
            <td><select name="impuesto">
                    <option value="" >Seleccione el impuesto</option>
                    {foreach $impuestos as $impuesto}
                        <option value="{$impuesto.imp_key}"{if $impuesto.imp_key == $productos.imp_key} selected{/if}>{$impuesto.imp_nombre}</option>
                    {/foreach}
                </select>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad"> Cancelar</a>
    </p>
</form>