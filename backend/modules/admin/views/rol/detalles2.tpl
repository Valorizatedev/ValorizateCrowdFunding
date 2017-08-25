
<form id="form1">
    
 <br>
	<h4 align= "center">Vista Detallada</h4>
<br/><br/>
    <table class="" style="" >
        
		<tr align="left">
            <th>
                Nombre:     {$datos.rol_nombre}
            </th>
            
        </tr>
        <tr><td colspan="2"><hr/></td></tr>
		<tr>
            <th colspan="2" align="left">
                Permisos: 
            </th>
		</tr>
		{foreach $datos1 as $dato}
		<tr>
		   <td id="perfiles" colspan="2">
                        <div >
                            <h4>{$dato.modulo}</h4>
							
							{foreach $dato.permisos as $uno}											
								<div class="perfil">
									{$uno.permiso}
								</div>
							{/foreach}
						</div>
                
            </td>

        </tr>		{/foreach}
    </table>
	     
	<br/>
    <table class="" style="width: 100%;">
		<tr>
		
        {if $_acl->permiso('asignar_permisos')}
    <td>        <a class="btn" href="{$_layoutParams.root}admin/rol/asignarPermisos/{$datos.rol_key}"><img src="{$_layoutParams.root}views/layout/2id/img/add.png" /> Agregar Permisos</a></td>
        {/if}
        {if $_acl->permiso('revocar_permisos')}
    <td>        <a class="btn" href="{$_layoutParams.root}admin/rol/revocarPermiso/{$datos.rol_key}"><img src="{$_layoutParams.root}views/layout/2id/img/cancelar_2.png" /> Revocar Permisos</a></td>
        {/if}
    
		<td width="40%"> </td>
            <td>
                <a class="btn" href="{$_layoutParams.root}admin/rol"><img src="{$_layoutParams.root}views/layout/2id/img/rew.png" /> Regresar</a>
            </td>
            {if $_acl->permiso('modificar_rol')}
                <td>
                    <a class="btn" href="{$_layoutParams.root}admin/rol/editar/{$datos.rol_key}" title="Modificar el Nombre"><img src="{$_layoutParams.root}views/layout/2id/img/edit.png" /> Modificar</a>
                </td>
            {/if}
            {if $_acl->permiso('eliminar_rol')}
                {if (($datos.rol_key!=1) && ($datos.rol_key!=2))}
                    <td>
                        <a class="btn btn-primary" href="{$_layoutParams.root}admin/rol/eliminar/{$datos.rol_key}"><img src="{$_layoutParams.root}views/layout/2id/img/bin.png" /> Eliminar</a>
                    </td>
                {/if}
            {/if}
        </tr>
    </table>
</form>