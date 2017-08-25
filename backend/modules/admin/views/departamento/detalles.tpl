<form id="form1">

 
  	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>Vista Detallada</b></font>
			 </div>
  <div class="col-md-6 pull-right" align="right">			
			<div class="col-md-10 pull-right"  align="right">	
			 <a class="btn btn-primary" href="{$_layoutParams.root}admin/departamento">Regresar</a>
		{if $_acl->permiso('modificar_departamento')}
		<a href="javascript:$('#modal-2').modal('show');" class="btn btn-primary"  >Modificar</a>
         <!--a class="btn" href="{$_layoutParams.root}admin/departamento/editar/{$datos.dep_key}">Modificar</a-->
        {/if}
        {if $_acl->permiso('eliminar_departamento')}
         <a class="btn btn-danger" href="{$_layoutParams.root}admin/departamento/eliminar/{$datos.dep_key}">Eliminar</a>
        {/if}
			</div>
	</div>
 </div>
 </div>
 <hr/>

    <table class="" style="width:">
        <tr>
            <th class="etiqueta">
                <b>Codigo: </b>
            </th>
		
            <td>
                 {$datos.dep_codigo} 
            </td>
        </tr>
		<tr>
            <th class="etiqueta">
                 <b>Nombre: &nbsp; </b>
            </th>
		
            <td>
                {$datos.dep_nombre}
            </td>
        </tr>
    </table>
    
</form>


<div class="modal fade custom-width" id="modal-2" >
	<div class="trans" style="">
	<div class="modal-dialog" style="width: 60%;">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 ><b>Editar Departamento</b></h3>
			</div>
			<form id="modificar" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}admin/departamento/editar/" autocomplete="off">
			<div class="modal-body">
			    	<input type="hidden" name="guardar" value="1" />
					<input type="hidden" id="key" name="key" value="" />
					<br>
 <table class="" style="width: 100%;">

        <tr>

            <td class="etiqueta"> <b>Codigo: </b></td>

            <td><input class="form-control"  type="texto" name="codigo" id="codigo" value="{$datos.dep_codigo|default:""}" /></td>

        </tr>

        <tr>

            <td class="etiqueta"> <b>Nombre: <b></td>

            <td><input class="form-control" type="texto" name="nombre" id="nombre" value="{$datos.dep_nombre|default:""}" /></td>

        </tr>

    </table>

					<br>
			</div>
			
			<div class="modal-footer">
   			<button class="btn btn-blue"> Guardar cambios</button>
			  <a class="btn btn-primary" href="{$_layoutParams.root}admin/rol">Cancelar</a>
			  </form>
			</div>
		</div>
	</div>
	</div>
</div>






