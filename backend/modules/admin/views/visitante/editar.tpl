<form id="form1" enctype="multipart/form-data" method="POST" action="{$_layoutParams.root}admin/visitante/editar/{$visitante.vis_key}">
    <div>
        <input type="hidden" name="guardar" value="2" />
        <table class="" style="width: 100%;">
            <tr>
                <th class="etiqueta">Nombres: &nbsp;</th>
                <td>
                    <input type="text" id="nombre" name="nombre" value="{$visitante.vis_nombre}" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Tipo de Documento: &nbsp;</th>
                <td>
                    <select name='tipoDocumento' id="tipoDocumento" required="true">
                        <option value="">Elija el Tipo de Documento</option>
                        {foreach $tdocumento as $nombre}
                            <option value="{$nombre.tdo_key}" {if $nombre.tdo_key==$visitante.tdo_key}selected{/if}>{$nombre.tdo_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Numero de Documento: &nbsp;</th>
                <td>
                    <input id="numDocumento" type="text" name="numDocumento" value="{$visitante.vis_num_documento}" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Fecha de Nacimiento: &nbsp;</th>
                <td>
                    <input type="text" name="fecha_nacimiento" value="{$visitante.vis_fecha_nacimiento}" id="fecha_nacimiento" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Estado: &nbsp;</th>
                <td>
                    <select name='estado' id="estado" >
                        <option value="">Elija un estado civil</option>
                        {foreach $ecivil as $nombre}
                            <option value="{$nombre.eci_key}" {if $nombre.eci_key==$visitante.eci_key}selected{/if}>{$nombre.eci_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Numero de Hijos: &nbsp;</th>
                <td>
                    <input id="hijos" type="text" name="hijos" value="{$visitante.vis_hijos}" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Genero: &nbsp;</th>
                <td>
                    <select name='genero' id="genero" required="true">
                        <option value="">Elija el Genero</option>
                        {foreach $generos as $nombre}
                            <option value="{$nombre.gen_key}" {if $nombre.gen_key==$visitante.gen_key}selected{/if}>{$nombre.gen_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Direcci&oacute;n: &nbsp;</th>
                <td>
                    <input id="direccion" type="text" name="direccion" value="{$visitante.vis_direccion}" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Departamento: &nbsp;</th>
                <td>
                    <select id='departamentoRes' name='departamentoRes' required="true">
                        <option value="">Elija el Departamento Residencia</option>
                        {foreach $departamento as $nombre}
                            <option value="{$nombre.dep_key}" {if $nombre.dep_key==$ciudad.dep_key}selected{/if}>{$nombre.dep_nombre}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Ciudad: &nbsp;</th>
                <td>
                    <select id='ciudadRes' name='ciudadRes' required="true">
                        <option value="{$ciudad.ciu_key}">{$ciudad.ciu_nombre}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Tel&eacute;fono: &nbsp;</th>
                <td>
                    <input id="telefono" type="text" name="telefono" value="{$visitante.vis_telefono}" required="true" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">E-mail: &nbsp;</th>
                <td>
                    <input id="email" type="email" name="email" value="{$visitante.vis_email}" />
                </td>
            </tr>
            <tr>
                <th class="etiqueta">Observaciones: &nbsp;</th>
                <td>
                    <textarea id="observaciones" name="observaciones">{$visitante.vis_observaciones}</textarea>
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