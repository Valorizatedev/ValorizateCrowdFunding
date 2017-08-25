<form id="form1"><div class="row" >		<div class="col-md-13">			<div class="col-md-4" >				<font class="brand" style="font-size:22px;" ><b>Contactos</b></font>											</div>			<div class="col-md-4" >						<div class="col-md-5 pull-right" >						{*if $_acl->permiso('crear_rol')}					<a href="javascript:$('#modal-3').modal('show');" class="btn btn-blue" >Nuevo Contacto</a>					<!--a class="btn  btn-default" href="{$_layoutParams.root}admin/rol/nuevo"><i class="icon-plus"> </i> Crear un nuevo Rol.</a-->				{/if*}								{if $_acl->permiso('crear_cliente')}					<a class="btn btn-blue" href="{$_layoutParams.root}admin/contacto/nuevo">Crear contacto</a>				{/if}			</div>				</div>			<div class="col-md-4 pull-right" >											<div class="input-group" >					<div class="input-group-addon">						<i class="entypo-search"></i>					</div>						<input type="text" class="form-control" name="buscar" id="buscar"  placeholder="Buscar">					</div>			</div>		</div>	</div>	<hr>
  
    <table class="table table-bordered table-hover" align="center">
        <tr>
            <th>ID</th>
            <th>Nombre(s)</th>
            <th>Tel&eacute;fono</th>
            <th>Email</th>
            <th colspan=""></th>
        </tr>

        {foreach $clientes as $cliente}
            <tr>
                <td style="text-align: center">
                    {$cliente.con_key}
                </td>
                <td>
                    {$cliente.con_nombre}
                </td>
                <td>
                    {$cliente.con_telefono}
                </td>
                <td>
                    {$cliente.con_email}
                </td>
                <td class="opcion" align="right">
                    <a class="btn btn-primary" href="{$_layoutParams.root}admin/contacto/detalles/{$cliente.con_key}"><i class="icon-eye-open"></i> Detalles</a>
                
                {if $_acl->permiso('modificar_contacto')}
                
                        <a class="btn btn-primary" href="{$_layoutParams.root}admin/contacto/editar/{$cliente.con_key}"><i class="icon-pencil"></i> Modificar</a>
                
                {/if}
                {if $_acl->permiso('eliminar_contacto')}
                
                        <a class="btn btn-danger" href="{$_layoutParams.root}admin/contacto/eliminar/{$cliente.con_key}"><i class="icon-trash"></i> Eliminar</a>
                
                {/if}				    </td>
            </tr>
        {/foreach}
    </table>
   <div class="col-md-12 pull-right" >		<div align="right" >		{$paginacion|default:""}	</div>	</div>		
</form>