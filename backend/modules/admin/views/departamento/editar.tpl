<form id="form1" action="{$_layoutParams.root}admin/departamento/editar/{$datos.dep_key}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="guardar" value="1" />		<div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Editar departamento</b></font>											</div>			<div class="col-md-6" align="right">							     <button class="btn btn-blue"><i class="icon-ok"> </i> Guardar</button>        <a class="btn btn-primary" href="{$_layoutParams.root}admin/departamento"> Cancelar</a>			</div>				</div>				</div>	<hr>

    <table class="" style="width: 100%;">
        <tr>
            <td ><b>Codigo: </b></td>
            <td><input class="form-control" type="texto" name="codigo" id="codigo" value="{$datos.dep_codigo|default:""}" /></td>
        </tr>
        <tr>
            <td ><b>Nombre:</b> </td>
            <td><input  class="form-control" type="texto" name="nombre" id="nombre" value="{$datos.dep_nombre|default:""}" /></td>
        </tr>
    </table>
    <br/>
 
</form>