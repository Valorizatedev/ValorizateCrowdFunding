<form id="form1">


<div class="row" >
		<div class="col-md-13">
			<div class="col-md-6" >
				<font class="brand" style="font-size:22px;" ><b>Vista detallada</b></font>
				
				
			</div>
			<div class="col-md-6" align="right">			
				<a class="btn btn-primary" href="{$_layoutParams.root}admin/impuesto"><i class="icon-backward"> </i> Regresar</a>
            {if $_acl->permiso('modificar_impuesto')}
			<a href="javascript:$('#modal-2').modal('show');" class="btn btn-primary" onclick="datos('{$impuestos.imp_key}','{$impuestos.imp_nombre}','{$impuestos.imp_valor}')" >Modificar</a>
                    <!--a class="btn btn-primary" href="{$_layoutParams.root}admin/impuesto/editar/{$impuestos.imp_key}"><i class="icon-pencil"> </i> Modificar</a-->
            {/if}
            {if $_acl->permiso('eliminar_impuesto')}
                    <a class="btn btn-danger" href="{$_layoutParams.root}admin/impuesto/eliminar/{$impuestos.imp_key}"><i class="icon-trash"> </i> Eliminar</a>
            {/if}
			</div>	
			</div>
		
		</div>
	<hr>



    <table class="" style="">
        <tr>
            <th class="etiqueta">Nombre: &nbsp;</th>
            <td>
                {$impuestos.imp_nombre}
            </td>
        </tr>
        <tr>
            <th class="etiqueta">Descripci&oacute;n: &nbsp;</th>
            <td>
                {$impuestos.imp_valor}%
            </td>
        </tr>
    </table>
    <br/>
    
</form>


<div class="modal fade custom-width" id="modal-2" >
	<div class="trans" style="">
	<div class="modal-dialog" style="width: 60%;">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 ><b>Editar impuesto</b></h3>
			</div>
			<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/impuesto/editar/" autocomplete="off">
			<div class="modal-body">
			    	<input type="hidden" name="guardar" value="1" />
					<input type="hidden" id="key" name="key" value="" />
					<br>
					 <table class="" style="width: 100%;">
							<tr>
								<th class="etiqueta"><b>Nombre:</b></th>
								<td><input class="form-control"  type="text" name="nombre" id="nombreedit" value="{$impuestos.imp_nombre|default:""}" required="true" /></td>
							</tr>
							<tr>
								<th class="etiqueta"><b>Valor: </b></th>
								<td><input class="form-control" type="text" name="valor" id="valoredit" value="{$impuestos.imp_valor|default:""}" required="true" /></td>
							</tr>
						</table>
					<br>
			</div>
			
			<div class="modal-footer">
   			<button class="btn btn-blue"> Guardar Cambios</button>
			  <a class="btn btn-primary" href="{$_layoutParams.root}admin/impuesto">Cancelar</a>
			  </form>
			</div>
		</div>
	</div>
	</div>
</div>

