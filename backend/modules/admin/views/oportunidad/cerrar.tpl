<form id="form1"  enctype="multipart/form-data" method="POST" onsubmit="return !saber();" action="{$_layoutParams.root}admin/oportunidad/cerrar/{$oportunidad}" >

    <input type="hidden" name="guardar" value="1" />

	<div class="row" >
		<div class="col-md-13">
			<div class="col-md-6" >
				<font class="brand" style="font-size:22px;" ><b>Cerrar oportunidad</b></font>
				
				
			</div>
			<div class="col-md-6" align="right">			
				<a href="javascript:if(saber())$('#modal-3').modal('show');else $('#modal-4').modal('show');" id="cierrenoexitoso" class="btn btn-blue" >Cerrar oportunidad</a>
				<!--button class="btn btn-blue" type ="submit" class="btn btn-primary" onclick="if(saber())toogle('block','modal1','ventana1');else document.getElementById('form1').submit();" ><i class="icon-ok"> </i> Cerrar oportunidad</button-->
				<a class="btn btn-primary" href="{$_layoutParams.root}admin/oportunidad"> Cancelar</a>
			</div>	
			</div>
		
		</div>
	<hr>
	
	
    <table style="width: 100%">
        <tr>
            <th class="etiqueta"><b>Tipo de cierre: </b></th>
            <td>
                <input type="radio" name="tipoCierre" id="exitoso" value="2" /> Cierre exitoso<br/>
                <input type="radio" name="tipoCierre" id="noexitoso" value="3" /> Cierre no exitoso
            </td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Observaci&oacute;n: </b></th>
		</tr>
		<tr>
            <td colspan="2">
                <textarea class="form-control" style ="width:100%;height:70px;"name="observaciones"></textarea>
            </td>
        </tr>

    </table>
    <br/>
    

</form>


<div id = "modal1" name="modal1" style="display:none;">
			<div id="ventana1" name="ventana1" class="contenedor1" style="display:none;">
{$oportunidad}
	<form class='' action='{$_layoutParams.root}admin/oportunidad/cierreExitoso/{$oportunidad}' method='post' name='tareae' id='tareae'>		
		<table align="center" width="100%">
			<tr>
				<td>
					<!--input name="id_cliente" id="id_cliente" type ="hidden" /-->
					<input name="tipoCierre" id="tipoCierre" type ="hidden" value="2" />

					
					<!-- nito caragar las ocasa -->
						<table>
							<tr>
							<td>
							<fieldset>
							<legend>Proyecto </legend>
								<table>
									<tr>
										<td>Nombre:</td>
										<td><input name="nombreProyecto" type="texto"/></td>
									</tr>
									<tr>
										<td>Fecha inicio:</td>
										<td><input name="FechaInicio" id="FechaInicio" type="texto" value ="{date('Y-m-d')}" /></td>
									</tr>
									<tr>
										<td>Duración:</td>
										<td><input name="duracion" id="duracion" type="texto" onchange="calcularfecha()" /></td>
									</tr>
									<tr>
										<td>Fecha Final:</td>
										<td><input name="FechaFinal" id="FechaFinal" type="texto" /></td>
									</tr>
									<tr>
										<td>Administrador:</td>
										<td>
											<input name="usuAdministrador" type="texto" value ="{$usuario.usu_nombre} {$usuario.usu_apellidos}"/>
											<input name="usukey" type="hidden" value ="{$usuario.usu_key}"/>
										</td>
									</tr>
									<tr>
										<td>Observacion:</td>
									</tr>
									<tr>
										<td colspan="2" ><textarea name="observacionProyecto" type="texto" style="width:100%" /></textarea></td>
									</tr>
									
								</table>
							</fieldset>	
							</td>
							
							</tr>
						</table>
						
					
					<br><br>
			<div align="right">	
			
			<button  type="submit"  onclick="toogle2('none','modal1','ventana1')" class="btn btn-primary" >Crear Proyecto</button>
			</div>
				</td>
			
			</tr>
		</table>
	<!--div align="center">	
	
	<a href='{$_layoutParams.root}crm/oportunidad/exitosa/{$oportunidad.opr_key}' onclick="toogle2('none','modal1','ventana1')" class='btn'>Venta Exitosa</a>
	<a href='{$_layoutParams.root}crm/oportunidad/noExitosa/{$oportunidad.opr_key}' onclick="toogle2('none','modal1','ventana1')" class='btn'>Venta No Concretada</a>	
	<button  type="submit"  onclick="toogle2('none','modal1','ventana1')" class="btn" >Guarda/Crear Act</button>
	</div-->
				<a href="#close" title="Cerrar" onclick="toogle2('none','modal1','ventana1')" >Close</a>
				
	</form>			
				
			</div>	
		</div>
		
		
		
		


<div class="modal fade custom-width" id="modal-3" style="">
	<div class="trans" style="">
	<div class="modal-dialog " style="width: 60%;">
		<div class="modal-content" style="">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 ><b>Crear Proyecto</b></h4>
			</div>
	<form class='' action='{$_layoutParams.root}admin/oportunidad/cierreExitoso/{$oportunidad}' method='post' name='tareae' id='tareae' autocomplete="off">		
			<div class="modal-body">
				<input type="hidden" name="guardar" value="1" />
					<br>
				
					<!--input name="id_cliente" id="id_cliente" type ="hidden" /-->
					<input name="tipoCierre" id="tipoCierre" type ="hidden" value="2" />

					
					<!-- nito caragar las ocasa -->
						
								<table width="100%">
									<tr>
										<td><b>Nombre:</b></td>
										<td><input class="form-control" name="nombreProyecto" type="texto"/></td>
									</tr>
									<tr>
										<td><b>Fecha inicio:</b></td>
										<td><input class="form-control" name="FechaInicio" id="FechaInicio" type="texto" value ="{date('Y-m-d')}" /></td>
									</tr>
									<tr>
										<td><b>Duración:</b></td>
										<td><input class="form-control" name="duracion" id="duracion" type="texto" onchange="calcularfecha()" /></td>
									</tr>
									<!--tr>
										<td><b>Fecha Final:</b></td>
										<td><input class="form-control" name="FechaFinal" id="FechaFinal" type="texto" /></td>
									</tr-->
									<tr>
										<td><b>Administrador:</b></td>
										<td>
											<input  class="form-control" name="usuAdministrador" type="texto" value ="{$usuario.usu_nombre} {$usuario.usu_apellidos}"/>
											<input class="form-control" name="usukey" type="hidden" value ="{$usuario.usu_key}"/>
										</td>
									</tr>
									<tr>
										<td><b>Observacion:</b></td>
									</tr>
									<tr>
										<td colspan="2" ><textarea class="form-control" name="observacionProyecto" type="texto" style="width:100%" /></textarea></td>
									</tr>
									
								</table>
					
			</div>
			<div class="modal-footer">
				<button class="btn btn-blue">Crear Proyecto</button>
				<a class="btn btn-primary" href="{$_layoutParams.root}admin/rol">Cancelar</a>
	</form>
			</div>
		</div>
	</div>
	</div>
</div>



<div class="modal fade custom-width" id="modal-4" style="">
	<div class="trans" style="">
	<div class="modal-dialog " style="width: 60%;">
		<div class="modal-content" style="">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 ><b>Cierre oportunidad</b></h4>
			</div>
	<form class='' action='{$_layoutParams.root}admin/oportunidad/cerrar/{$oportunidad}' method='post' name='tareae' id='tareae' autocomplete="off">		
			<div class="modal-body">
				<input type="hidden" name="guardar" value="1" />
					<br>
				Desea cerrar como no exitoso ?
					<!--input name="id_cliente" id="id_cliente" type ="hidden" /-->
					<input name="tipoCierre" id="tipoCierre" type ="hidden" value="3" />

					
					<!-- nito caragar las ocasa -->
						
							
			</div>
			<div class="modal-footer">
				<button class="btn btn-blue">Cerrar oportunidad</button>
				<a class="btn btn-primary" href="{$_layoutParams.root}admin/rol">Cancelar</a>
	</form>
			</div>
		</div>
	</div>
	</div>
</div>
