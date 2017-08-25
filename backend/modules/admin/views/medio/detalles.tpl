<form id="form1">

 	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>Vista detallada</b></font>
			 </div>
  <div class="col-md-6 pull-right" align="right">			
			<div class="col-md-10 pull-right"  align="right">	
			{if $_acl->permiso('modificar_medio')}
                    <a href="javascript:$('#modal-2').modal('show');" class="btn btn-primary" onclick="datos('{$medios.med_key}','{$medios.med_nombre}')" >Modificar</a>
					<!--a class="btn btn-primary" href="{$_layoutParams.root}admin/medio/editar/{$medios.med_key}"><i class="icon-pencil"> </i> Modificar</a-->
            {/if}
            {if $_acl->permiso('eliminar_medio')}
                    <a class="btn btn-danger" href="{$_layoutParams.root}admin/medio/eliminar/{$medios.med_key}"><i class="icon-trash"> </i> Eliminar</a>
            {/if}
    </div>
	</div>
 </div>
 </div>
<hr>
    <table class="" style="width: ;">
        <tr>
            <th class="etiqueta"><b>Nombre:</b></th>
            <td>
                {$medios.med_nombre}
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
				<h3 ><b>Editar fuente</b></h3>
			</div>
			<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/medio/editar/">
			<div class="modal-body">
			    	<input type="hidden" name="guardar" value="1" />
					<input type="hidden" id="key" name="key" value="" />
					<br>
					<div align="center">
							<b>Nombre:</b>
							<input type="text" name="nombreedit" id="nombreedit" value="{$medios.med_nombre|default:""}" required="true" />
					</div>
					<br>
			</div>
			
			<div class="modal-footer">
   			<button class="btn btn-blue"> Guardar cambios</button>
			  <a class="btn btn-primary" href="{$_layoutParams.root}admin/medio">Cancelar</a>
			  </form>
			</div>
		</div>
	</div>
	</div>
</div>
