$(document).ready(function() {
	grafico();
 
});
function actualizar(cuenta)
{
	
	$("#cuenta").val(cuenta);
	if($("#cuenta").val()==0)
	{
		grafico();
		$("#listado").attr("href", _root_+"wf/panel/listapqrd/"+$("#cuenta").val());
	}
	else{
		pieCuenta();
		barrasCuenta();
		pqrd();
		$("#listado").attr("href",  _root_+"wf/panel/listapqrd/"+$("#cuenta").val());
	}
	//actualizar graficos y pqrd
	//grafico();
	
}


function grafico()
{
	var total=0;

		$.ajax({
            type: "POST",
            url: _root_ + "wf/panel/pie",
            dataType: "json",
            data: {
					
            },
            success: function(data) {
			//alert("entro");
			console.log(data);
                datos = new Array();
               
				
                $.map(data, function(item) {
					
                    
					datos.push({label: item.cut_nombre, 
							value: item.cantidad+"::PQRD",});
					total = total + parseInt(item.cantidad);
               });
				console.log(datos);
            },
            complete: function() {
                $('#graficopie').html("");
				Morris.Donut({
                    element: 'graficopie',
					data:datos,
					formatter: function (y) { return y  }
					
                });
            }
        });
}


function pieCuenta()
{
		$.ajax({
            type: "POST",
            url: _root_ + "wf/panel/piecuenta/"+$("#cuenta").val(),
            dataType: "json",
            data: {
				
            },
            success: function(data) {
                datos = new Array();
				
				
                $.map(data, function(item) {
					datos.push({label: item.tpe_nombre, 
							value: item.cantidad+"::PQRD",});
					
               });
			
            },
            complete: function() {
            if (datos.length === 0){
				$('#graficopie').html("");
				$('#graficopie').append("<h4>No se encontraron datos...<h4>");
			}
			else{
				$('#graficopie').html("");
			
                Morris.Donut({
                    element: 'graficopie',
					data:datos,
					formatter: function (y) { return y  }
					
                });
				}
            }
        });


}


function barrasCuenta()
{
		$.ajax({
            type: "POST",
            url: _root_ + "wf/panel/barracuenta/"+$("#cuenta").val(),
            dataType: "json",
            data: {
				
            },
            success: function(data) {
                datos = new Array();
                $.map(data, function(item) {
					datos.push({
								label: item.fun_nombre, 
								value: item.cantidad
								});
					
               });
			
            },
            complete: function() {
            if (datos.length === 0){
				$('#medios').html("");
				$('#medios').append("<br><h4 align='center'>No se encontraron datos...<h4><br>");
			}
			else{
				$('#medios').html("");
			var total=0;
				for(var i=0;i<datos.length;i++){
								total=total+parseInt(datos[i]['value']);
						}
		var vista ="<table class='table table-bordered table-responsive'>"+
						"<tbody>";
				
				for(var i=0;i<datos.length;i++){
									vista= vista + "<tr>"+
										"<td>"+datos[i]['label']+"</td>"+
										"<td width='60%'>"+
											"<div class='progress'>"+
												"<div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width:"+((parseInt(datos[i]['value'])*100)/total)+"%' title='"+((parseInt(datos[i]['value'])*100)/total)+"%' >"
														"<span class='sr-only'></span>"+
													"</div>"+
												"</div>"+
											"</td>"+
										"</tr>";
						}
				vista=vista+"</tbody></table>";
				$('#medios').html("");	
				$('#medios').append(vista);				
				}
            }
        });


}



function pqrd()
{
		$.ajax({
            type: "POST",
            url: _root_ + "wf/panel/pqrd/"+$("#cuenta").val(),
            dataType: "json",
            data: {
				
            },
            success: function(data) {
                datos = new Array();
                $.map(data, function(item) {
					datos.push({
								key: item.scr_key, 
								contenido: item.scr_contenido,
								tipo: item.tpe_nombre
								});
					
               });
			
            },
            complete: function() {
            if (datos.length === 0){
				$('#pqrd').html("");
				$('#pqrd').append("<br><h4 align='center'>No se encontraron datos...<h4><br>");
			}
			else{
				$('#pqrd').html("");
				var vista ="<table class='table table-bordered table-responsive'>"+
							"<thead><tr>"+
									"<th>ID</th>"+
									"<th>Contenido</th>"+
									"<th>Tipo</th>"+
									"<th> </th>"+
								"</tr></thead>"+
							"<tbody>";
				
				for(var i=0;i<datos.length;i++){
									vista= vista + "<tr>"+
										"<td>"+datos[i]['key']+"</td>"+
										"<td width='60%'>"+datos[i]['contenido']+"</td>"+
										"<td width=''>"+datos[i]['tipo']+"</td>"+
										"<td align='right'><a href='' class='btn btn-blue'> Detalles </a></td>"+
										"</tr>";
						}
				vista=vista+"</tbody></table>";
				$('#pqrd').html("");	
				$('#pqrd').append(vista);				
				}
            }
        });


}