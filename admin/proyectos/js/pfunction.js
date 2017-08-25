function nuevaFecha(){
    var i=1;
    var newdate="" ;
              
                        newdate= newdate+
                        '<div class="plusva">'+
                        '<h5 class="textoFecha">Fecha: </h5>'+
                        '<input type="date" class="form-control inicio" placeholder="Inicio" />'+
                        '<input class="botn2 form-control" type="number" name="" placeholder="Añade precio metro cuadrado">'+
                        '</div>';
                $('#contenplusva').append(newdate);
}





function projectC(){
   console.log(root_);

	  $.ajax({
            type: "POST",
            url:"http://www.valorizate.com.co/backend/proyecto/proyect/crear",
            dataType: "json",
            data: { id:$("#tituloProyecto").val(),nombre:$("#tituloProyecto").val(),descripcion:$("#tituloProyecto").val(),valor:$("#tituloProyecto").val(),
            ubicacion:$("#tituloProyecto").val(),meses:$("#tituloProyecto").val(),rentabilidad:$("#tituloProyecto").val(),fechainicio:$("#tituloProyecto").val(),
            fechafinal:$("#tituloProyecto").val(),ingresoanual:$("#tituloProyecto").val(),gastoanual:$("#tituloProyecto").val(),rendimientoanual:$("#tituloProyecto").val(),
            youtube:$("#tituloProyecto").val()
                },
            success: function(res) {    

                alert("ressas");
                console.log(res.message);
            }
        });
}



















function consultarP(){

		$.ajax({
            type: "POST",
            url: root_+"admin/usuario/listausuario/",
            dataType: "json",
            data: {},
            success: function(res) {

            	//console.log(res.data);

            	var appendHtml="" ;
 				for (resultado in res.data) {
		      
		                appendHtml= appendHtml+
		                '<tr class="userlist">'+
						
                            '<td><img src="http://ds.valorizate.com.co/backend/'+res.data[resultado].usu_foto+'" style="width: 45px; height: 45px; border-radius: 50%;"></td>'+
							'<td>'+res.data[resultado].usu_nombre+'</td>'+
							'<td>'+res.data[resultado].usu_email+'</td>'+
							'<td>100</td>'+
							'<td>'+res.data[resultado].usu_observaciones+'</td>'+
							'<td>100</td>'+
							'<td class="opciones"><div class="opciones2"><div class="opciont"><span class="icon-cog"></span></div><div class="borrar" title="Eliminar"  uk-tooltip="pos: left"><span class="icon-bin" style="display:none;"></span></div><div class="actualizar" title="Actualizar" uk-tooltip="pos: left"><span class="icon-loop2" style="display:none;"></span></div></div></td>'+
                            '<td class="display">'+res.data[resultado].usu_key+'</td>'+
						'</tr>';
            		}
            	$('#contenidoTable').append(appendHtml);
                $('#Lista').DataTable();    

                if(($(window).width())<=760){
                $(".uk-table").addClass("uk-table-responsive");
                $(".uk-table").addClass("responsiveStiles");
                $(".dataTables_info").addClass("display");

                
                
                };

            }
        });

}


             
               

                function agregarp(){

                            
                            $("#ListaProyectos").detach();
                            
                            //el fadeOut y fadeIn son solo para embellecer la transición de pagina
                            $("#contenido").fadeOut(200);

                            $("#contenido").append($("<div>").load("proyectos/proyectos.html #AgregarProyecto"));
                            $.getScript( "proyectos/js/pfunction.js");
                            $.getScript( "proyectos/js/readyproject.js"); 
                            $("#contenido").fadeIn(400);

                            
                            //var agregarUsu = document.getElementById("AgregarUsuario");
                            //var conteniido = document.getElementById("contenido");    
                            //conteniido.appendChild(agregarUsu);
                            
                };

                                //Volvemos atras desde el formulario para agregar usuario hacia la lista de usuarios
                function irListaProyectos(){
                     

                            $("#AgregarProyecto").detach();

                            //el fadeOut y fadeIn son solo para embellecer la transición de pagina
                            
                            $("#contenido").append($("<div>").load("proyectos/proyectos.html #ListaProyectos"));
                            
                            //var agregarUsu = document.getElementById("AgregarUsuario");
                            //var conteniido = document.getElementById("contenido");    
                            //conteniido.appendChild(agregarUsu);
                        


                            //$like.classList.toggle('is-liked');

                                                            
                
                };

