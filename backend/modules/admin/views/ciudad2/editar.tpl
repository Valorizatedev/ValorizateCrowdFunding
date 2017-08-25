<form id="form1" action="{$_layoutParams.root}admin/ciudad/editar/{$datos.ciu_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />
    		<div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Editar ciudad</b></font>											</div>			<div class="col-md-6" align="right">							    <button class="btn btn-blue"> Guardar</button>					<a class="btn btn-primary" href="{$_layoutParams.root}admin/ciudad">Cancelar</a>			</div>				</div>				</div>	<hr>
    <table class="" style="width: 100%;">
        <tr>
            <th ><b>Codigo:</b> </th>
            <td><input class="form-control" type="text" name="codigo" id="codigo" value="{$datos.ciu_codigo|default:""}" /></td>
        </tr>
        <tr>
            <th ><b>Nombre:</b></th>
            <td><input class="form-control"  type="text" name="nombre" id="nombre" value="{$datos.ciu_nombre|default:""}" /></td>
        </tr>
        <tr>
            <th ><b>Departamento:</b></th>
            <td>
                <select class="form-control"  name='departamento' id="departamento" >
                    <option value="">Elija el tipo de ciudadano</option>
                    {foreach $departamentos as $nombre}
                        <option value="{$nombre.dep_key}"{if isset($datos.dep_key)}{if $datos.dep_key==$nombre.dep_key}selected{/if}{/if}>{$nombre.dep_nombre}</option>
                    {/foreach}
                </select> 
            </td>
        </tr>
    </table>
    <br/>
    <p>
      
    </p>
</form>