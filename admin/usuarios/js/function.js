        //Volvemos atras desde el formulario para agregar usuario hacia la lista de usuarios
      function irLista(){
           

                  

                  $("#PerfilUsuario").detach();
                  $("#AgregarUsuario").detach();
                   $("#modals").detach();


                  //el fadeOut y fadeIn son solo para embellecer la transición de pagina
                  
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html #ListaUsuarios"));
                   $("#contenido").append($("<div>").load("usuarios/usuarios.html #modals"));
                  $.getScript( "usuarios/js/function.js");
                  $.getScript( "usuarios/js/ready_index.js");
                  
                  //var agregarUsu = document.getElementById("AgregarUsuario");
                  //var conteniido = document.getElementById("contenido");    
                  //conteniido.appendChild(agregarUsu);
              


                  //$like.classList.toggle('is-liked');

                                                  
      
      };


  function agregaru(){
           

                  // $("#ListaUsuarios").detach();
                  // $("#PerfilUsuario").detach();
                  document.getElementById("ListaUsuarios").innerHTML = "";
                  document.getElementById("contenido").innerHTML = "";
                  $("#contenido").fadeOut(200);      
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html #AgregarUsuario"));
                  $.getScript( "usuarios/js/ready.js"); 
                  $.getScript( "usuarios/js/function.js");
                  $("#contenido").fadeIn(400);
 };

function userC(){

	  $.ajax({
            type: "POST",
            url: root_+"admin/usuario/crear/",
            dataType: "json",
            data: {
            	id:$("#iduser").val(),img:$("#uimg").val(),nombre:$("#Nombre").val(),email:$("#Correo").val(),
            	pass:$("#Contrasena").val(),ubi:$("#Ubicacion").val(),tarjeta:$("#tarjeta").val(),mes:$("#MM").val(),
            	ano:$("#AA").val(),cod:$("#cod").val()
            },
            success: function(res) {

				if (res.message=='success') {


					setTimeout(function() {
                        window.location.href = "admin.html";
                         
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                             positionClass: "toast-bottom-right",
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success(res.body);

                    }, 800);


				}
				else
				{
					setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                             positionClass: "toast-bottom-right",
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error(res.body);
                    }, 1800);
				}
            	
            	
                
            }
        });

  
}

function consultarU(){
	
	 

		$.ajax({
            type: "POST",
            url: root_+"admin/usuario/listausuario/",
            dataType: "json",
            data: {},
            success: function(res) {

            	
              console.log(res.data);

            	var appendHtml="" ;
              // console.log(root_);

 				for (resultado in res.data) {
		      // console.log(res.data[resultado].usu_foto);
          if (res.data[resultado].usu_foto2=="sin_foto") {
            // alert("Sizas, sin foto")
               appendHtml= appendHtml+
              '<tr class="userlist" >'+           
              '<td><img src="'+root2_+'assets/imagenes/fotodeperfil.jpg" style="width: 45px; height: 45px; border-radius: 50%; margin-left:15px;"></td>'+
              '<td>'+res.data[resultado].usu_nombre+'</td>'+
              '<td onclick="PerfilUsuario('+res.data[resultado].usu_key+');" class="itemlista"><div id="usermail">'+res.data[resultado].usu_email+'</div></td>'+
              '<td>100</td>'+
              '<td>'+res.data[resultado].usu_observaciones+'</td>'+
              '<td>100</td>'+

              '<td class="opciones"><div class="opciones2"><div class="opciont"><span class="icon-cog"></span></div><div  onclick="idusuario.value='+res.data[resultado].usu_key+';"  class="borrar" title="Eliminar"  uk-tooltip="pos: left" uk-toggle="target: #modal-eliminar"><span class="icon-bin" style="display:none;"></span></div><div onclick="idusuario3.value='+res.data[resultado].usu_key+';editarUsuarioLista();" class="actualizar" id="actualizar" title="Actualizar" uk-tooltip="pos: left" uk-toggle="target: #modal-editar" ><span class="icon-loop2" style="display:none;"></span></div></div></td>'+
                            '<td class="display">'+res.data[resultado].usu_key+'</td>'+
            '</tr>';
          }else{
		          appendHtml= appendHtml+
		          '<tr class="userlist" >'+						
              '<td><img src="'+root_+res.data[resultado].usu_foto+'" style="width: 45px; height: 45px; border-radius: 50%; margin-left:15px;"></td>'+
							'<td>'+res.data[resultado].usu_nombre+'</td>'+
							'<td onclick="PerfilUsuario('+res.data[resultado].usu_key+');" class="itemlista"><div id="usermail">'+res.data[resultado].usu_email+'</div></td>'+
							'<td>100</td>'+
							'<td>'+res.data[resultado].usu_observaciones+'</td>'+
							'<td>100</td>'+

							'<td class="opciones"><div class="opciones2"><div class="opciont"><span class="icon-cog"></span></div><div  onclick="idusuario.value='+res.data[resultado].usu_key+';"  class="borrar" title="Eliminar"  uk-tooltip="pos: left" uk-toggle="target: #modal-eliminar"><span class="icon-bin" style="display:none;"></span></div><div onclick="idusuario3.value='+res.data[resultado].usu_key+';editarUsuarioLista();" class="actualizar" id="actualizar" title="Actualizar" uk-tooltip="pos: left" uk-toggle="target: #modal-editar" ><span class="icon-loop2" style="display:none;"></span></div></div></td>'+
                            '<td class="display">'+res.data[resultado].usu_key+'</td>'+
						'</tr>';

              }

						}            	



            //agregamos el contenido consultado al contenido html
            	$('#contenidoTable').append(appendHtml);
                $('#Lista').DataTable();    
                 $('#Lista_filter').append('<div class="agregar"><a id="irAgregar1" onclick="agregaru();"><span class="icon-user-plus" style="font-size: 20px; margin-right: 5px; "></span>Crear usuario</a></div>');


                //luego de hacer la consulta ajax y agregar los datos consulta de la lista usuario al documento html, creamos el modal para eliminar usuario

                if(($(window).width())<=760){
                $(".uk-table").addClass("uk-table-responsive");
                $(".uk-table").addClass("responsiveStiles");
                $(".dataTables_info").addClass("display");            
                };
                
            
            }

        });


}





function PerfilUsuario(id){



  var altura = 48;
    $(window).on("scroll",function(){
      if($(window).scrollTop()>altura){

        $("#controlfix").css("visibility", "initial");
        $("#controlfix").addClass("aparecer");
        // $("#controlfix").css("animation", "desaparece .4s forwards");


      } else{
        
        $("#controlfix").css("visibility", "hidden");
        $("#controlfix").removeClass("aparecer");
       
        // $("#controlfix").addClass("desaparecer");

      }
    });

    
    $.ajax({
            type: "POST",
            url: root_+"admin/usuario/perfil/"+id,
            dataType: "json",
            data: {},
            success: function(res) {
                document.getElementById("contenido").innerHTML = "";
                $("#modals").detach();
                $("#contenido").append($("<div>").load("usuarios/usuarios.html #PerfilUsuario"));
                 
                // console.log(res);

              
              setTimeout(function(){ 


                  if (res.data.usu_foto2=="sin_foto") {
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html  #modals"));
                  $('#Username').html(res.data.usu_nombre);
                  $('#Perfilpic').attr('src',''+root2_+'assets/imagenes/fotodeperfil.jpg');
                  $('#mailinput').val(res.data.usu_email);
                  $('#idinput').val(res.data.usu_key);
                  $('#ubinput').val(res.data.usu_observaciones);
                  $('#credinput').val(res.data.usu_tarjeta);
                  }else{
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html  #modals"));
                  $('#Username').html(res.data.usu_nombre);
                  $('#Perfilpic').attr('src',''+root_+res.data.usu_foto);
                  $('#mailinput').val(res.data.usu_email);
                  $('#idinput').val(res.data.usu_key);
                  $('#ubinput').val(res.data.usu_observaciones);
                  $('#credinput').val(res.data.usu_tarjeta);
                  }



                  console.log(res.data);  
                  
            }, 700 );



            }
        });

}





function EliminarUsuario(){

      //defino el id con el id del input del perfil, si no esta en el perfil y se esta llamando la acción desde la lista inicial el valor que arrojara es undefined porque el elemento no existe, eso quiere decir que no esta en el perfil
      iden= $("#idinput").val();
           
          
      if (iden==undefined) {
        //al estar indefinido es porque se esta llamando la acción desde la lista y no del perfil
        var iden= $("#idusuario").val();    
       // alert("el id esta desde la lista: "+iden)
      } else {
        iden= $("#idinput").val();
        // alert("el id es del perfil: "+iden)
      }




				$.ajax({
	            type: "POST",
	            url: root_+"/admin/usuario/eliminar/"+iden,
	            dataType: "json",
	            data: {},


					});

        window.location.reload();
                  



};

function editar(){

    $("#mailinput").attr("disabled", false);
    $("#ubinput").attr("disabled", false);
    $("#credinput").attr("disabled", false);
    $("#actualizarp").css("display", "initial");
    $(".itemp").css("margin-bottom", "20px");
}

function editarUsuarioLista(){

        iden2= $("#idusuario3").val();
        //el idusuario3 esta en el documento admin.html
        // alert("el id es del perfil: "+iden2)
                  $('#Perfilpic2').attr('src',"");
                  $('#nameimput').val("");
                  $('#mailinput2').val("");
                  $('#idusuario2').val("");
                  $('#ubinput2').val("");
                  $('#credinput2').val("");
                  $("#idusuario3").val("");


        $.ajax({
            type: "POST",
            url: root_+"admin/usuario/perfil/"+iden2,
            dataType: "json",
            data: {},
            success: function(res) {
                
            // for (var i = 0; i < 1; i++) {
            

              // setTimeout(function(){ 
                  if (res.data.usu_foto2=="sin_foto") {
                  $('#nameimput').val(res.data.usu_nombre);
                  $('#Perfilpic2').attr('src',''+root2_+'assets/imagenes/fotodeperfil.jpg');
                  $('#mailinput2').val(res.data.usu_email);
                  $('#idusuario2').val(res.data.usu_key);
                  $('#ubinput2').val(res.data.usu_observaciones);
                  $('#credinput2').val(res.data.usu_tarjeta);
                  $('#uimg').val(res.data.usu_foto2);
                  }else{
                  $('#nameimput').val(res.data.usu_nombre);
                  $('#Perfilpic2').attr('src',''+root_+res.data.usu_foto);
                  $('#mailinput2').val(res.data.usu_email);
                  $('#idusuario2').val(res.data.usu_key);
                  $('#ubinput2').val(res.data.usu_observaciones);
                  $('#credinput2').val(res.data.usu_tarjeta);
                  $('#uimg').val(res.data.usu_foto2);
                  }


                  var button = $('#imgperfil'), interval;
                    new AjaxUpload('#imgperfil', {
                          action:root_+'admin/usuario/subir/'+$("#idusuario2").val(),
                          
                      onSubmit : function(file , ext){},
                      onComplete: function(file, response){
                        
                        $("#uimg").val(file);
                        //console.(root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file);
                        $('.Perfilpic2').css({'background':'url('+root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file+')'});
                              
                      }
              
                    });
                  // alert($('#nameimput').val()) 
               
              // editarUsuarioLista();
              // }
            },
            complete:function(res){

              
            }
        });

        // $.ajax({
        //       type: "POST",
        //       url: root_+"/admin/usuario/editar/"+iden,
        //       dataType: "json",
        //       data: { email:$("#mailinput").val()
        //     },

        //       //             nombre:$("#Nombre").val(),email:$("#mailinput").val(),
        //       // pass:$("#Contrasena").val(),ubi:$("#Ubicacion").val(),tarjeta:$("#tarjeta").val(),mes:$("#MM").val(),
        //       // ano:$("#AA").val(),cod:$("#cod").val()

        //   });
}

function editado(){
  var jnombre=$('#nameimput').val(),
      jid=$('#idusuario2').val(),    
      jmail=$('#mailinput2').val(), 
      jubicacion=$('#ubinput2').val(), 
      jtar=$('#credinput2').val(),
      jfoto=$('#uimg').val();
      
        $.ajax({
            type: "POST",
            url: root_+"admin/usuario/editar/"+jid,
            dataType: "json",
            data: {
              nombre:jnombre,email:jmail,ubi:jubicacion,tarjeta:jtar,img:jfoto
            },
            success: function(res) {
                
            
            }
        });

        
}