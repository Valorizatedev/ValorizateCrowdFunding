

	<div class="row" >
		<div class="col-md-13">
			<div class="col-md-6" >
				<font class="brand" style="font-size:22px;" ><b>Asignar usuario a {$cuenta.cut_nombre}</b></font>
				
				
			</div>
			<div class="col-md-6" align="right">			
				<a class="btn btn-primary" href="{$_layoutParams.root}wf/cuenta">Regresar</a>
				<!--a class="btn btn-primary" href="{$_layoutParams.root}admin/usuario/editar/{$datos.usu_key}">Modificar</a>
				<a class="btn btn-danger" href="{$_layoutParams.root}admin/usuario/eliminar/{$datos.usu_key}">Eliminar</a-->
			</div>	
			</div>
		
	</div>
	<hr>
	
	<div class="row" >
		<div class="col-md-12">
						
			<div class="col-md-12 panel panel-gray" >
<form id="modificar" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}wf/cuenta/addusuario/" autocomplete="off">
			<h4><b>Asignar usuarios</b></h4>
				<div class="row" >
				<div class="col-md-12">
				<div class="col-md-6">
				<select  class="form-control"  id="usuario" name='usuario' required="true" style="width:70%;">
					<option value="">Elija un usuario</option>
					{foreach $usuarios as $usu}
						<option value="{$usu.usu_key}">{$usu.usu_nombre}</option>
					{/foreach}
				</select >
				</div>
				<div class="col-md-6 " style="margin-left:-150px;">
				<button  class="btn btn-blue" > Adicionar</button>
				</div>
				</div>
				</div>
				<br/>
				<input value="" id="usu_key" type ="hidden" name="usu_key" />
				<input value="{$cuenta.cut_key}" type ="hidden"  id="cut_key" name="cut_key" />
</form>	
			<h4><b>Usuairos asignados a esta cuenta:</b></h4>
			<div class="">		
					{foreach $uxc as $control}
					
							{foreach $usuarios as $usu}
								{if $control.usu_key == $usu.usu_key }
<form id="modificar" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}wf/cuenta/delusuario/{$control.uxc_key}/{$cuenta.cut_key}" autocomplete="off">
							<div class="cb-wrapper">
								<h4 style="color:;"> <button class="btn btn-danger " title="Quitar de esta cuenta" > x </button>
									{$usu.usu_nombre} {$usu.usu_apellidos} 
								</h4>
							</div>
</form>							
								{/if}
							{/foreach}
					{/foreach}
					
					
			</div>		
			</div>

		</div>
	</div>