			    datos = new Array();
(function($, window, undefined) {
    "use strict";
    $(document).ready(function() {
          if (typeof Morris != 'undefined') {
		 $.ajax({
            type: "POST",
            url: _root_ + "login/historial",
            dataType: "json",
            data: {
               
            },
            success: function(data) {
             //  console.log(data);
			   

               //almacenes.push({estado: data.estado, cerradoon: data.cerradoon, vencido: data.vencido, cerradooff: data.cerradooff, gestion: data.gestion});
               
				$.map(data, function(item) {
				var label= "";
				   if (item.opo_estado == 1)
					 label= "Gestión";
					if (item.opo_estado == 2)
					 label= "Exitosas";
					if (item.opo_estado == 3)
					 label= "No exitosas";
				//data.push({y: data['estado'], cerradoon: item.cerradoon, vencido: item.vencido});
				datos.push({
							label:label,
							value:item['cantidad']							 
						   });
				});
				
            },
            complete: function() {
				
				console.log(datos);
				
              Morris.Donut({
					
					element: 'chart3',
					data:datos,
					formatter: function (y) { return y  },
					colors: [
							'green',
							'#0099CC',
							'#FF3333'
							]
				});
		}
   
    });
           /* Morris.Bar({
                element: 'chart3',
                axes: true,
                data: [{
                    x: '2013 Q1',
                    y: getRandomInt(1, 10),
                    z: getRandomInt(1, 10)
                }, {
                    x: '2013 Q2',
                    y: getRandomInt(1, 10),
                    z: getRandomInt(1, 10)
                }, {
                    x: '2013 Q3',
                    y: getRandomInt(1, 10),
                    z: getRandomInt(1, 10)
                }, {
                    x: '2013 Q4',
                    y: getRandomInt(1, 10),
                    z: getRandomInt(1, 10)
                }],
                xkey: 'x',
                ykeys: ['y', 'z'],
                labels: ['Cierre exitosos', 'Cierre no exitosos'],
                barColors: ['green', '#FC4141']
            });*/
		/*$.ajax({
            type: "POST",
            url: _root_ + "login/historial",
            dataType: "json",
            data: {
               
            },
            success: function(data) {
              // console.log(data);
			   
			    datos = new Array();
               //almacenes.push({estado: data.estado, cerradoon: data.cerradoon, vencido: data.vencido, cerradooff: data.cerradooff, gestion: data.gestion});
               
				$.map(data, function(item) {
					
				//data.push({y: data['estado'], cerradoon: item.cerradoon, vencido: item.vencido});
				datos.push(
							{label: item['label'],
							 y:item['abiertas'],
							 z:item['exitosas'],
							 w:item['noexitosas'],
							 e:Math.round(item['efectividad']*100)
							 }
						   );
                
				
				});
				console.log(datos);
            },
            complete: function() {
             
              Morris.Bar({
					element: 'detalladoUsuario',
					data: datos,
					xkey: 'label',
					ykeys: ['y','z','w','e'],
					labels: ['Gestion comercial', 'Exitosas','No Exitosas','<b>% Efectividad</b>'],
					barColors: ['#0099CC', 'Green', '#FF3333','#000'],
				}).on('click', function(i, row){
				console.log(i, row);
				});
		}
   
    });*/
           
        }
    });
})(jQuery, window);

function data(offset) {
    var ret = [];
    for (var x = 0; x <= 360; x += 10) {
        var v = (offset + x) % 360;
        ret.push({
            x: x,
            y: Math.sin(Math.PI * v / 180).toFixed(4),
            z: Math.cos(Math.PI * v / 180).toFixed(4),
        });
    }
    return ret;
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/*$.ajax({
            type: "POST",
            url: _root_ + "reportes/reporte/seguimientoDetallado",
            dataType: "json",
            data: {
               anio:x
            },
            success: function(data) {
              // console.log(data);
			   
			    datos = new Array();
               //almacenes.push({estado: data.estado, cerradoon: data.cerradoon, vencido: data.vencido, cerradooff: data.cerradooff, gestion: data.gestion});
               
				$.map(data, function(item) {
					
				//data.push({y: data['estado'], cerradoon: item.cerradoon, vencido: item.vencido});
				datos.push(
							{label: item['label'],
							 y:item['abiertas'],
							 z:item['exitosas'],
							 w:item['noexitosas'],
							 e:Math.round(item['efectividad']*100)
							 }
						   );
                
				
				});
				console.log(datos);
            },
            complete: function() {
             
              Morris.Bar({
					element: 'detalladoUsuario',
					data: datos,
					xkey: 'label',
					ykeys: ['y','z','w','e'],
					labels: ['Gestion comercial', 'Exitosas','No Exitosas','<b>% Efectividad</b>'],
					barColors: ['#0099CC', 'Green', '#FF3333','#000'],
				}).on('click', function(i, row){
				console.log(i, row);
				});
		}
   
    });*/