<form id="form1" name="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/registro">

    <table style="width: 100%">
        <tr id="campanas">
            <th class="etiqueta">Campa&ntilde;a participantes: &nbsp;</th>
            <td>
                {$i="1"}
                <input type="hidden" value="1" name="guardar"/>
                <table style="width: 100%">
                    <tr>
                        {foreach $campanas as $campana}
                            <td>
                                <input type="checkbox" name="campana{$i}" value="{$campana.cam_key}"/>
                                {$campana.cam_nombre}
                            </td>
                            {if ($i%3)==0}   
                            </tr>
                            <tr>
                            {/if}
                            {$i=$i+"1"}
                        {/foreach}
                    </tr>
                </table>
                <input type="hidden" value="{$i}" name="totalCampanas"/>
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Fecha: &nbsp;</th>
            <td><input type="text" name="fecha" id="fecha" value="{$smarty.now|date_format:"%Y-%m-%d"}"/></td>
        </tr>
        <tr id="visitante">
            <th class="etiqueta">Visitante: &nbsp;</th>
            <td>
                <table style="width: 100%">
                    <tr>
                        <td><input type="text" name="buscarUsuario" id="buscarUsuario"/></td>
                        <td><a class="btn btn-primary" id="registrarVisitante">Registrar Visitante</a></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table id="datosVisitante" style="width: 100%; display: none">
                                <tr>
                                    <td>No. Documento: <output id="numDocumentoVisitante"></output></td>
                                    <td>Nombre: <output id="nombreVisitante"></output></td>
                                </tr>
                                <tr>
                                    <td>Tel&eacute;fono: <output id="telefonoVisitante"></output></td>
                                    <td>Direcci&oacute;n: <output id="direccionVisitante"></output></td>
                                </tr>
                            </table>
                            <input type="hidden" name="keyVisitante" id="keyVisitante" value="" required="true"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr id="facturas">
            <th class="etiqueta">Facturas: &nbsp;</th>
            <td>
                <table id="addfacturas" style="width: 100%" class="table-bordered table-striped">
                    <tr>
                        <td><b>Almacen:</b><br/>
                            <select name="almacen" id="almacen">
                                <option value="0">Seleccione una Opci&oacute;n</option>
                                {foreach $almacenes as $almacen}
                                    <option value="{$almacen.alm_key}">{$almacen.alm_nombre}</option>
                                {/foreach}
                            </select>
                        </td>
                        <td><b>Valor:</b><br/><input type="text" name="valor" id="valor" value="0" />
                        </td>
                        <td>
                            <a href="#" id="addfactura" class="btn btn-primary">Adicionar Factura</a>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="totalFacturas" id="totalFacturas" value="0"/>
            </td>
        </tr>
    </table>
    <br/>
    <p>
        <button class="btn btn-primary" form="form1"><i class="icon-ok"></i> Generar</button>
        <a href="{$_layoutParams.root}admin/registro" class="btn btn-primary">Cancelar</a>
    </p>
</form>
<div id="crearVisitante" title="Registro de Visitante">
    <form name="form2" id="form2">
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
                        {foreach $tDocumento as $nombre}
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
    </form>
</div>