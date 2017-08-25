<form id="form1" method="POST" action="{$_layoutParams.root}admin/campana/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre:&nbsp; </th>
            <td><input type="text" name="nombre" id="nombre" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Fecha Inicio:&nbsp; </th>
            <td><input type="text" name="fecha_ini" id="fecha_ini" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Fecha Fin:&nbsp; </th>
            <td><input type="text" name="fecha_fin" id="fecha_fin" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Monto:&nbsp; </th>
            <td><input type="text" name="monto" id="monto" value="" /></td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n:&nbsp; </th>
            <td><textarea name="descripcion" id="descripcion"></textarea></td>
        </tr>
        <tr>
            <th colspan="2">Promociones</th>
        </tr>
        <tr>
            <th class="etiqueta">Multiplica por:&nbsp; </th>
            <td><input type="text" name="multiplicador" id="multiplicador" value="" /></td></td>
        </tr>
        <tr>
            <th class="etiqueta">Dias de promoci&oacute;n:&nbsp; </th>
            <td>
                <input type="checkbox" name="lunes"/> Lunes<br/>
                <input type="checkbox" name="martes"/> Martes<br/>
                <input type="checkbox" name="miercoles"/> Miercoles<br/>
                <input type="checkbox" name="jueves"/> Jueves<br/>
                <input type="checkbox" name="viernes"/> Viernes<br/>
                <input type="checkbox" name="sabado"/> Sabado<br/>
                <input type="checkbox" name="domingo"/> Domingo
            </td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/campana"> Cancelar</a>
    </p>
</form>