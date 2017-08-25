<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/visitante/nuevo">
    <div>
        <input type="hidden" name="guardar" value="2" />
        <table class="" style="width: 100%;">
            <tr>
                <th class="etiqueta">Nombres: &nbsp;</th>
                <td>
                    <input type="text" id="nombre" name="nombre" value="" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Tipo de Documento: &nbsp;</th>
                <td>
                    <select name='tipoDocumento' id="tipoDocumento" required="true">
                        <option value="">Elija el Tipo de Documento</option>
                        {foreach $tdocumento as $nombre}
                            <option value="{$nombre.tdo_key}">{$nombre.tdo_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Numero de Documento: &nbsp;</th>
                <td>
                    <input id="numDocumento" type="text" name="numDocumento" value="" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Fecha de Nacimiento: &nbsp;</th>
                <td>
                    <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Estado: &nbsp;</th>
                <td>
                    <select name='estado' id="estado" >
                        <option value="">Elija un estado civil</option>
                        {foreach $ecivil as $nombre}
                            <option value="{$nombre.eci_key}">{$nombre.eci_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Numero de Hijos: &nbsp;</th>
                <td>
                    <input id="hijos" type="text" name="hijos" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Genero: &nbsp;</th>
                <td>
                    <select name='genero' id="genero" required="true">
                        <option value="">Elija el Genero</option>
                        {foreach $generos as $nombre}
                            <option value="{$nombre.gen_key}">{$nombre.gen_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Direcci&oacute;n: &nbsp;</th>
                <td>
                    <input id="direccion" type="text" name="direccion" value="" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Departamento: &nbsp;</th>
                <td>
                    <select id='departamentoRes' name='departamentoRes' required="true">
                        <option value="">Elija el Departamento Residencia</option>
                        {foreach $departamento as $nombre}
                            <option value="{$nombre.dep_key}">{$nombre.dep_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Ciudad: &nbsp;</th>
                <td>
                    <select id='ciudadRes' name='ciudadRes' required="true">
                        <option value="">Elija Primero del Departamento</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Tel&eacute;fono: &nbsp;</th>
                <td>
                    <input id="telefono" type="text" name="telefono" value="" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">E-mail: &nbsp;</th>
                <td>
                    <input id="email" type="email" name="email" value="" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Observaciones: &nbsp;</th>
                <td>
                    <textarea id="observaciones" name="observaciones"></textarea>
                </td>
            </tr>
        </table>
        <br/>
        <p>
            <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
            <a class="btn btn-primary" href="{$_layoutParams.root}admin/visitante">Cancelar</a>
        </p>
    </div>
</form>