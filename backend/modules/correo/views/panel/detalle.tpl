 	
	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>Seguimiento</b></font>
			 </div>
		<div class="col-md-6 pull-right" align="right">			
			<div class="col-md-10 pull-right"  align="right">	
				<a href="javascript:$('#modal-3').modal('show');" class="btn btn-success">Responder</a>
				<a href="" class="btn btn-danger">Finalizar</a>
			</div>
		</div>
		</div>
	</div>
	<hr/>
	
	<div class="row" >
		<div class="col-md-13">
		
			
			<table class="panel panel-primary" align="center" style="width:80%;">
			
				<tr>
					<td><b>ID: {$scr.scr_key}</b></td>
					<td><b>Peticionario: {$peticionario.pet_nombre} {$peticionario.pet_apellido} </b></td>
				</tr>
				<tr>
					<td><b>Tipo de peticionario: {$tpe.tpe_nombre}</b></td>
					<td><b>Fecha: {$scr.scr_fecha}</b></td>
				</tr>
				<tr>
					<td colspan="2" ><b>Contenido:</b></td>
				</tr>
				<tr>
					<td colspan="2" >
					{$scr.scr_contenido}
					</td>
				</tr>
				<tr>
					<td colspan="2" ><b>Link:</b></td>
				</tr>
				<tr>
					<td colspan="2" >
					{$scr.scr_link}
					</td>
				</tr>
			</table>
			<hr style="width:80%;"/>
		</div>
	</div>
	
		
	<div class="row" >
		<div class="col-md-13">
		
		{foreach $bit as $seguimiento}
			
			<table class="panel panel-primary" align="center" style="width:80%;">
				<tr>
					<td><b>ID: {$seguimiento.bit_key}</b></td>
					<td><b>Fecha: {$seguimiento.bit_fecha} </b></td>
				</tr>
		
				<tr>
					<td colspan="2" ><b>Contenido:</b></td>
				</tr>
				<tr>
					<td colspan="2" >
					{$seguimiento.bit_descripcion}
					</td>
				</tr>
		
			</table>
		<hr style="width:80%;"/>
		{/foreach}
			</div>
	</div>
	
	
	
<div class="modal fade custom-width" id="modal-3" style="">
	<div class="trans" style="">
	<div class="modal-dialog " style="width: 60%;">
		<div class="modal-content" style="">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 ><b>Respuesta</b></h4>
			</div>
	<form id="formcrear" enctype="multipart/form-data" method="POST" action="{$_layoutParams.root}wf/panel/respuesta/{$scr.scr_key}" autocomplete="off">
			<div class="modal-body">
				<input type="hidden" name="guardar" value="1" />
					
					
			<table class="panel panel-primary" align="center" style="width:80%;">
			
				<tr>
					<td><b>ID: {$scr.scr_key}</b></td>
					<td><b>Peticionario: {$peticionario.pet_nombre} {$peticionario.pet_apellido} </b></td>
				</tr>
				<tr>
					<td><b>Tipo de peticionario: {$tpe.tpe_nombre}</b></td>
					<td><b>Fecha: {$scr.scr_fecha}</b></td>
				</tr>
				<tr>
					<td colspan="2" ><b>Contenido:</b></td>
				</tr>
			
			</table>
						<div align="">
								<b>Contenido:</b>
								<textarea class="form-control" type="text" name="contenido" style="height:250px;" required="true"> </textarea>
						</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-blue">Generar respuesta</button>
				<a class="btn btn-primary" href="{$_layoutParams.root}wf/panel/detalle/{$scr.scr_key}">Cancelar</a>
	</form>
			</div>
		</div>
	</div>
	</div>
</div>
	
	
