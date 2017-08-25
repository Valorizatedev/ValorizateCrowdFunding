<form id="form1" method="POST" action="{$_layoutParams.root}admin/ciudad/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />

    <table class="" style="width: 100%;">
        <tr>
            <th style="text-align: right;">Codigo: &nbsp;</th>
            <td><input type="text" name="codigo" id="codigo" value=""/></td>
        </tr>
        <tr>
            <th style="text-align: right;">Nombre: &nbsp;</th>
            <td><input type="text" name="nombre" id="nombre" value=""/></td>
        </tr>
        <th style="text-align: right;">Departamento: &nbsp;</th>
        <td>
            <select name='departamento' id="departamento" >
                <option value="">Elija el tipo de ciudadano</option>
                {foreach $departamentos as $nombre}
                    <option value="{$nombre.dep_key}">{$nombre.dep_nombre}</option>
                {/foreach}
            </select>        
        </td>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/ciudad">Cancelar</a>
    </p>
</form>