
<hr>


<div class="row">
   <div class="col-md-12">
   	  {if $alertinventario==1} 
      	<div class="alert alert-danger">
      		<i class="entypo-alert"></i>
      		<strong>Alerta de inventario!</strong> 
      		Tienes productos con menos de la cantidad mínima en la configuración
      		(<a href="{$_layoutParams.root}inventario/producto/menos">Ver mas</a>).
      	</div>
      {/if}
   </div>
</div>
<a href="{$_layoutParams.root}inventario/producto">
<div class="row col-sm-3">
	<div class="col-sm-12">
	
		<div class="tile-stats tile-primary text-center">
		{if $_acl->permiso('crear_producto')} 
			<div class="icon"><i class="entypo-briefcase"></i></div>
			<div class="num" data-start="0" data-end="{$prospectos}" data-postfix="" data-duration="1500" data-delay="0">{$productos}</div>
			
			<h3>Productos</h3>
		{/if}
		</div>
		
	</div>
		
</div>
</a>

