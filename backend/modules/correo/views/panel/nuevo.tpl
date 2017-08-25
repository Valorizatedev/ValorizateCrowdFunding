<form id="form1" method="POST" enctype="multipart/form-data" action="{$_layoutParams.root}wf/panel/nuevo" autocomplete="off">

<input class="form-control"  type="hidden" name="guardar" value="1" />
<div class="row" >
		<div class="col-md-13">
			<div class="col-md-6" >
				<font class="brand" style="font-size:22px;" ><b>Crear PQRD</b></font>
				
				
			</div>
			<div class="col-md-6" align="right">			
				<button class="btn btn-blue">Crear PQRD</button>
				<a class="btn btn-primary" href="{$_layoutParams.root}wf/panel">Cancelar</a>
			</div>	
			</div>
		
		</div>
	<hr>
    <table class="" style="width: 100%;" align="center" cellpadding="8" >

        <tr align="left">
            <th class=""><b>Cuenta: </b></th>
			<td><select  class="form-control"  id="cuenta" name='cuenta' required="true">
                <option value="">Elija un cuenta</option>
				{foreach $cuentas as $cut}
                   <option value="{$cut.cut_key}">{$cut.cut_nombre}</option>
                {/foreach}
			</select>
            </td>
			<th class=""><b>Fuente de informacion: </b></th>
			<td><select  class="form-control"  id="fuente" name='fuente' required="true">
                <option value="">Elija un fuente</option>
				{foreach $fuente as $fun}
                   <option value="{$fun.fun_key}">{$fun.fun_nombre}</option>
                {/foreach}
			</select>
            </td>
			
        </tr>
		<tr>
		    <th class=""><b>Fecha: </b></th>
		    <td><input id="fecha" class="form-control" name="fecha" value="{date('Y-m-d')}" required="true" /></td>
		    <th class=""><b>Tipo peticion: </b></th>
			<td><select  class="form-control"  id="peticion" name='peticion' required="true">
                <option value="">Elija tipo de PQRD</option>
				{foreach $tpeticion as $tpe}
                   <option value="{$tpe.tpe_key}">{$tpe.tpe_nombre}</option>
                {/foreach}
			</select>
            </td>
		</tr>
</table>
<legend ><h4><b>Peticionario</b></h4></legend>
<table class="" style="width: 100%;" align="center" cellpadding="2" >

        <tr >
            <th class=""><b>Nombre: </b></th>
			<td><input id="nombrepeticionario" class="form-control" name="nombrepeticionario" required="true" /></td>
			<th class=""><b>Apellido: </b></th>
			<td><input id="apellidopeticionario" class="form-control" name="apellidopeticionario" required="true" /></td>
        </tr>
		<tr>
		    <th class=""><b>Cuenta correo: </b></th>
			<td colspan=""><input id="correo" class="form-control" name="correo" /></td>
		
		    <th class=""><b>Cuenta facebook: </b></th>
			<td colspan=""><input id="facebook" class="form-control" name="facebook" /></td>
		</tr>
		<tr>
		    <th class=""><b>Cuenta twitter: </b></th>
			<td colspan=""><input id="twitter" class="form-control" name="twitter" /></td>
		
		    <th class=""><b>Cuenta instagram: </b></th>
			<td colspan=""><input id="instagram" class="form-control" name="instagram" /></td>
		</tr>
		<tr>
		    <th class=""><b>Cuenta foursquare: </b></th>
			<td colspan=""><input id="foursquare" class="form-control" name="foursquare" /></td>
		</tr>
		
		
</table>
<table width="100%">
<tr><th><b>Contenido:</b></th>
</tr><tr>
<td><textarea class="form-control" style="height:150px;" name="ccontenido" id="contenido" required="true"> </textarea></td>
</tr></table>
<input id="ruta" class="form-control" name="ruta" placeholder="Copiar link de la peticion" />
<table width="100%">
<tr>
		    <th class=""><b>Destinatario: </b></th>
			<td><select  class="form-control"  id="destinatario" name='destinatario' required="true">
                <option value="">Elija un usuario</option>
				{foreach $usuarios as $usu}
                   <option value="{$usu.usu_key}">{$usu.usu_nombre} {$usu.usu_apellidos}</option>
                {/foreach}
			</select>
            </td>
		</tr>
</table>
</form>