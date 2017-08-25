<form id="form1" enctype="multipart/form-data" method="POST" action="{$_layoutParams.root}admin/prospecto/editar/{$cliente.cli_key}">

    <input type="hidden" name="guardar" value="1" />

		
<div class="row" >
		<div class="col-md-13">
			<div class="col-md-6" >
				<font class="brand" style="font-size:22px;" ><b>Editar prospecto</b></font>
				
				
			</div>
			<div class="col-md-6" align="right">			
				<button class="btn btn-blue"><i class="icon-ok"> </i> Guardar cambios</button>	
				<a class="btn btn-primary" href="{$_layoutParams.root}admin/prospecto">Cancelar</a>
			</div>	
			</div>
		
		</div>
	<hr>
	
	
	
    <table style="width: 100%;" cellpadding="8">
        <tr>
            <th class="etiqueta"><b>Tipo de Cliente:</b> </th>
            <td  colspan="3">
                <select name='tipoCliente' id="tipoCliente" class="form-control" required="true">
                    <option value="">Elija el Tipo de Cliente</option>
                    {foreach $tipoCliente as $nombre}
                        <option value="{$nombre.tcl_key}" {if $nombre.tcl_key==$cliente.tcl_key}selected{/if}>{$nombre.tcl_nombre}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Nombre: </b></th>
            <td  colspan="3">
                <input type="text" class="form-control" id="nombre" name="nombre" value="{$cliente.cli_nombre}" required="true" />
            </td>
        </tr>
		<tr>
            <th class="etiqueta"><b>Tipo de documento: </b></th>
            <td>
                <select name='tipoDocumento' class="form-control" id="tipoDocumento" required="true">
                    <option value="">Elija el Tipo de Documento</option>
                    {foreach $tDocumento as $nombre}
                        <option value="{$nombre.tdo_key}" {if $nombre.tdo_key==$cliente.tdo_key}selected{/if}>{$nombre.tdo_nombre}</option>
                    {/foreach}
                </select>
            </td>
        
            <th class="etiqueta"><b>Numero de documento: </b></th>
			<td>
                <input class="form-control" id="numDocumento" type="text" name="numDocumento" value="{$cliente.cli_num_documento}" required="true" />
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Direcci&oacute;n: </b></th>
            <td  colspan="3">
                <input class="form-control" id="direccion" type="text" name="direccion" value="{$cliente.cli_direccion}" required="true" />
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Departamento:</b> </th>
            <td>
                <select class="form-control" id='departamentoRes' name='departamentoRes' required="true">
                    <option value="">Elija el Departamento</option>
                    {foreach $departamento as $nombre}
                        <option value="{$nombre.dep_key}" {if $nombre.dep_key==$ciudad.dep_key}selected{/if}>{$nombre.dep_nombre}</option>
                    {/foreach}
                </select>
            </td>
      
            <th class="etiqueta"><b>Ciudad:</b> </th>
            <td>
                <select class="form-control" id='ciudadRes' name='ciudadRes' required="true">
                    <option value="{$ciudad.ciu_key}">{$ciudad.ciu_nombre}</option>
                </select>
            </td>
        </tr>
		</table>
		<table class="" style="width: 100%;" cellpadding="8">
        <tr>
            <th class="etiqueta"><b>Tel&eacute;fono:</b></th>
            <td>
                <input class="form-control" id="telefono" type="text" name="telefono" value="{$cliente.cli_telefono}" required="true" />
            </td>
        
            <th class="etiqueta"><b>E-mail: </b></th>
            <td>
                <input class="form-control" id="email" type="email" name="email" value="{$cliente.cli_email}" />
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Pagina web:   </b></th>
            <td colspan="3">
                <input class="form-control" id="web" type="text" name="web" value="{$cliente.cli_web}" placeholder="http://www.example.com" />
            </td>
        </tr>
      </table>
	 <hr>
<!-- div de contactos -->
		<table class="" style="width: 100%;" cellpadding="8">			
		<tr>
                <th  style="width:10%;" class="etiqueta"><h4><b>Contactos:</b></h4></th>
                <td  style="width:90%;">
				<div class="col-md-12">                   
					<div class="col-md-6 right">
					<input style="" class="form-control"  type="text" name="buscarContacto" id="buscarContacto"/>
					</div>
					<div class="col-md-6">
					<a  style="width:50%;" class="btn btn-blue" id="registrarVisitante">Registrar contacto</a>
					</div>
                    <input type="hidden" name="num_contactos" id="num_contactos" value="{$numcontactos}"/>
				</div>                   
				</td>
		</tr>
		</table>
       <table class="table-bordered table-striped" style='width: 100%;' id="contactos">
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Relación o Cargo
                            </th>
                            <th style="width: 25%">
                                Remover
                            </th>
                        </tr>
                        {for $i=1; $i<=$numcontactos; $i++}
                        {*foreach $contactos as $contacto*}
                            <tr id='contacto{$i}'>
                                <td>
                                    <input class="form-control" type = 'hidden' name = 'contacto_key{$i}' id = 'contacto_key{$i}' value='{$contactos[$i-1]['con_key']}' />
                                    {$contactos[$i-1]['con_nombre']}
								</td>
                                <td>
                                    <input class="form-control"type='text' name='relacion{$i}' id='relacion{$i}' value="{$contactos[$i-1]['rel_observacion']}"/>
                                </td>
                                <td>
                                    <a href = '#contacto' class = 'btn btn-danger' id = 'quitarcontacto{$i}' name = 'quitar' onclick = 'quitarcontacto({$i})'> <i class = 'entypo-cancel'> </i>
                                    </a>
                                </td>
                            </tr>
                        {/for}
          </table>
		<hr>
		<table class="" style="width: 100%;" cellpadding="0">			
            <tr>
                <th class="etiqueta"><h4><b>Observaciones:</b></h4></th>
			<tr>
			</tr>
                <td>
                    <textarea id="observaciones" name="observaciones" style="width:100%;height:100px;">{$cliente.cli_observaciones}</textarea>
                </td>
            </tr>
		</table>
           

</form>

    <div id="crearVisitante" title="Registro de Contacto">
    
	<form name="form2" id="form2">
        <div>
            <table class="" style="width: 100%;">
                <tr>
                    <th class="etiqueta"><b>Nombre:</b> </th>
                    <td>
                        <input class="form-control" type="text" id="nombrecontacto" name="nombrecontacto" value="" required="true" />
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Fecha de Nacimiento: </b></th>
                    <td>
                        <input class="form-control" type="text" name="fecha_nacimientocon" id="fecha_nacimientocon" />
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Estado Civil: </b></th>
                    <td>
                        <select id='ecivilcon' class="form-control" name='ecivilcon' required="true">
                            <option value="">Elija el Estado Civil</option>
                            {foreach $ecivil as $nombre}
                                <option value="{$nombre.eci_key}">{$nombre.eci_nombre}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Numero de Hijos: </b></th>
                    <td>
                        <input class="form-control" id="hijoscon" type="text" name="hijoscon" value="0"/>
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Genero: </b></th>
                    <td>
                        <select class="form-control" name='generocon' id="generocon" required="true">
                            <option value="">Elija el Genero</option>
                            {foreach $generos as $nombre}
                                <option value="{$nombre.gen_key}">{$nombre.gen_nombre}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Direcci&oacute;n: </b></th>
                    <td>
                        <input class="form-control" id="direccioncon" type="text" name="direccioncon" value="" required="true" />
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Departamento de Residencia: </b></th>
                    <td>
                        <select class="form-control" id='departamentocon' name='departamentocon' required="true">
                            <option value="">Elija el Departamento Residencia</option>
                            {foreach $departamento as $nombre}
                                <option value="{$nombre.dep_key}">{$nombre.dep_nombre}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>Ciudad de Residencia: </b></th>
                    <td>
                        <select class="form-control" id='ciudadcon' name='ciudadcon' required="true">
                            <option value="">Elija Primero del Departamento</option>
                        </select>
                    </td>
                </tr>
               <tr>
                    <th class="etiqueta"><b>Tel&eacute;fono: </b></th>
                    <td>
                        <input  class="form-control" id="telefonocon" type="text" name="telefonocon" value="" required="true" />
                    </td>
                </tr>
                <tr>
                    <th class="etiqueta"><b>E-mail: </b></th>
                    <td>
                        <input class="form-control" id="emailcon" type="email" name="emailcon" value="" />
                    </td>
                </tr>
            </table>
			
                    <b>Observaciones: </b> <br/>
                    <div class="row">
						<div class="col-md-12">	
							<textarea class="form-control" style="width:100%;height:70px;" id="observacionescon" name="observacionescon"></textarea>
						</div>
                    </div>
            
        </div>
    </form>

</div>