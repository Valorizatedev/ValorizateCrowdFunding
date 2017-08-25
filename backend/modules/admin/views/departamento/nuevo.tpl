<form id="form1" method="POST" action="{$_layoutParams.root}admin/departamento/nuevo" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />    	<div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Crear Departamento</b></font>			</div>			<div class="col-md-6" align="right">							<button class="btn btn-blue">Guardar</button>				<a class="btn btn-primary" href="{$_layoutParams.root}admin/departamento"> Cancelar</a>			</div>				</div>				</div>	<hr>
    <table class="" style="width: 100%;">
        <tr>
            <td ><b>Codigo:</b> </td>
            <td><input class="form-control" type="text" name="codigo" value="" /></td>
        </tr>
        <tr>
            <td ><b>Nombre:</b> </td>
            <td><input class="form-control"type="text" name="nombre" value="" /></td>
        </tr>
    </table>
    <br/>

</form>