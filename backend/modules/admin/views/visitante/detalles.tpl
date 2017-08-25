<div>
    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombres: &nbsp;</th>
            <td>
                {$visitante.vis_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Tipo de Documento: &nbsp;</th>
            <td>
                {$tdocumento.tdo_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Numero de Documento: &nbsp;</th>
            <td>
                {$visitante.vis_num_documento}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Fecha de Nacimiento: &nbsp;</th>
            <td>
                {$visitante.vis_fecha_nacimiento}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Estado Civil: &nbsp;</th>
            <td>
                {$ecivil.eci_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Numero de Hijos: &nbsp;</th>
            <td>
                {$visitante.vis_hijos}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Genero: &nbsp;</th>
            <td>
                {$genero.gen_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Direcci&oacute;n: &nbsp;</th>
            <td>
                {$visitante.vis_direccion}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Departamento: &nbsp;</th>
            <td>
                {$departamento.dep_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Ciudad: &nbsp;</th>
            <td>
                {$ciudad.ciu_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Tel&eacute;fono: &nbsp;</th>
            <td>
                {$visitante.vis_telefono}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">E-mail: &nbsp;</th>
            <td>
                {$visitante.vis_email}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Observaciones: &nbsp;</th>
            <td>
                {$visitante.vis_observaciones}
            </td>
        </tr>
    </table>
    <br/>
    <p>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/visitante">Cancelar</a>
    </p>
</div>
