

<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="{$_layoutParams.root}admin/config/guardar" novalidate="novalidate">
   <div class="row">
      <div class="col-md-12 ">
         <div class="form-group default-padding text-right" style="margin-left:-80px;">
          <button type="submit" class="btn btn-blue">Guardar Cambios</button>           
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
               <div class="panel-title">
                  Configuración General
               </div>
               <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> </div>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <label for="field-1" class="col-sm-3 control-label">Nombre de la tienda</label> 
                  <div class="col-sm-5"> <input type="text" class="form-control" id="nombretienda" name="nombretienda" value="{$datos.config_nombre}"> </div>
               </div>
               <div class="form-group">
                  <label for="field-4" class="col-sm-3 control-label">Correo Electronico (Admin)</label> 
                  <div class="col-sm-5"> <input type="text" class="form-control" id="email" name="email" id="field-4" data-validate="required,email" value="{$datos.config_email}"> <span class="description">Es para enviar las notificaciones.</span> </div>
               </div>
               <div class="form-group">
                  <label for="field-3" class="col-sm-3 control-label">Cantidad de Articulos  Minimo</label> 
                  <div class="col-sm-5"> <input type="text" class="form-control" name="cantidadarticulos" id="cantidadarticulos" data-validate="required,url" value="{$datos.config_cantiad_articulos}"> </div>
               </div>
               
            </div>
         </div>
      </div>
   </div>

</form>