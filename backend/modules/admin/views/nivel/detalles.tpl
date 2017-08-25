<form id="form1">


 	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>Vista Detallada</b></font>
			 </div>
  <div class="col-md-6 pull-right" align="right">			
			<div class="col-md-10 pull-right"  align="right">	
			<a class="btn btn-primary" href="{$_layoutParams.root}admin/nivel"><i class="icon-backward"> </i> Regresar</a>
            {if $_acl->permiso('modificar_nivel')}
			<a href="javascript:$('#modal-2').modal('show');" class="btn btn-primary"  >Modificar</a>
              <!--a class="btn btn-primary" href="{$_layoutParams.root}admin/nivel/editar/{$niveles.niv_key}"><i class="icon-pencil"> </i> Modificar</a-->
            {/if}
            {if $_acl->permiso('eliminar_nivel')}
				<a class="btn btn-danger" href="{$_layoutParams.root}admin/nivel/eliminar/{$niveles.niv_key}"><i class="icon-trash"> </i> Eliminar</a>
            {/if}
    </div>
	</div>
 </div>
 </div>
<hr>


    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td>
                {$niveles.niv_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n: &nbsp;</th>
            <td>
                {$niveles.niv_descripcion}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Nivel: &nbsp;</th>
            <td>
                {$niveles.niv_nivel}%
            </td>
        </tr>
    </table>
    <br/>
    
</form>




<!-- modal para la modificacion -->

<div class="modal fade custom-width" id="modal-2" >
	<div class="trans" style="">
	<div class="modal-dialog" style="width: 60%;">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 ><b>Editar Nivel</b></h3>
			</div>
			<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/nivel/editar/">
			<div class="modal-body">
			    	<input type="hidden" name="guardar" value="1" />
					<input type="hidden" id="key" name="key" value="{$niveles.niv_key}" />
					<br>
								
					<table class="" style="width: 100%;">
						<tr>
							<th class="etiqueta"><b>Nombre: </b></th>
							<td><input class="form-control" type="text" name="nombreedit" id="nombreedit"  value="{$niveles.niv_nombre}" required="true" /></td>
						
							<th class="etiqueta"><b>Nivel: </b></th>
							<td><input class="form-control"  type="text" name="niveledit" id="niveledit" value="{$niveles.niv_nivel}" required="true" /></td>
						</tr>
						<tr>
							<th class="etiqueta"><b>Descripci&oacute;n: <b></th>
							<td colspan="3"><textarea class="form-control" name="descripcionedit" id="descripcionedit" > {$niveles.niv_descripcion}</textarea></td>
						</tr>
						
					</table>
				
					<br>
			</div>
			
			<div class="modal-footer">
   			<button class="btn btn-blue"> Guardar Cambios</button>
			  <a class="btn btn-primary" href="{$_layoutParams.root}admin/rol">Cancelar</a>
			  </form>
			</div>
		</div>
	</div>
	</div>
</div>
