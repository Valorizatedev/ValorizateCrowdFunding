
<form name="form1" id="form1" enctype="multipart/form-data" method="POST" action="{$_layoutParams.root}admin/usuario/password">
    <input class="form-control"  name="guardar" id="guardar" value="1" type="hidden"/><div class="row" >		<div class="col-md-13">			<div class="col-md-6" >				<font class="brand" style="font-size:22px;" ><b>Cambiara contraseña</b></font>											</div>			<div class="col-md-6" align="right">						     <button class="btn btn-primary"><i class="icon-ok"></i> Cambiar</button>				<a class="btn btn-primary" href="{$_layoutParams.root}" >Cancelar</a>			</div>			</div></div><hr>
    <table style="50%">
        <tr>
            <th class="etiqueta"><b>Contrase&ntilde;a Anterior: &nbsp;</b></th>
            <td><input class="form-control"  name="old" id="old" value="" type="password" required="true"/></td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Nueva Contrase&ntilde;a: &nbsp;</b></th>
            <td><input class="form-control"  name="password" id="password" value="" type="password" required="true"/></td>
        </tr>
        <tr>
            <th class="etiqueta"><b>Confirmar Contrase&ntilde;a: &nbsp;</b></th>
            <td><input class="form-control"  name="confirm" id="confirm" value="" type="password" required="true"/></td>
        </tr>
    </table>
    <br/>
    <p>
       
    </p>
</form>