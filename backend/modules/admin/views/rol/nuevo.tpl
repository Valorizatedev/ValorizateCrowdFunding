<form id="form1" enctype="multipart/form-data" method="POST" action="{$_layoutParams.root}admin/rol/nuevo">
    <input type="hidden" name="guardar" value="1" /><div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Crear cliente</b></font>											</div>			<div class="col-md-6" align="right">							<button class="btn btn-blue"><i class="icon-ok"> </i> Crear nuevo cliente</button>				<a class="btn btn-primary" href="{$_layoutParams.root}admin/cliente">Cancelar</a>			</div>				</div>				</div>	<hr>

    <table class="" style="width: 100%;">
        <tr>
            <th class="etiqueta">Nombre: &nbsp; </th>
            <td><input type="text" name="nombre" value="" required="true" /></td>
        </tr>
        
    </table>

    <p>
        <button class="btn btn-primary"><i class="icon-ok"> </i> Guardar</button>
        <a class="btn btn-primary" href="{$_layoutParams.root}admin/rol">Cancelar</a>
    </p>
</form>