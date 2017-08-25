 	<div class="row" >
		<div class="col-md-13">
			 <div class="col-md-6" >
				<font class="brand"style="font-size:22px;" ><b>lista PQRD cuenta: "{if $cuenta}{$cuenta.cut_nombre}{else} todas {/if}" </b></font>
			 </div>
		<div class="col-md-6 pull-right" align="right">			
			<div class="col-md-10 pull-right"  align="right">	
			<a class="btn btn-blue" href="{$_layoutParams.root}wf/panel/nuevo/">Nueva PQRD</a>
			<a class="btn btn-primary" href="{$_layoutParams.root}wf/panel">Regresar</a>
			</div>
		</div>
		</div>
	</div>
 <hr/>
 
 <table class="table table-bordered table-responsive" >
 
	<thead>
		<tr>
		<th>Id</th>
		<th>Contenido</th>
		<th>Tipo</th>
		<th></th>
		</tr>
	</thead>
	<tbody>
		{foreach $listadoscr as $datos}
		<tr>
		<td>{$datos.scr_key}</td>
		<td width="60%">{$datos.scr_contenido}</td>
		<td>{$datos.tpe_nombre}</td>
		<td align="right">
		<a href="" class="btn btn-primary">Detalles</a>
		<a href="" class="btn btn-success">Responder</a>
		</td>
		</tr>
		{/foreach}
									
	</body>
 
 </table>
 
 
 
 
 