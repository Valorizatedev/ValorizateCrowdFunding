

//Abrir menu cuenta de usuario
$(document).ready(function($){

  $("#miCuenta").on("click", function(){
  $(".OpcionCuenta").removeClass("display");
  $(".fuente").addClass("paila");  
  
  })

  });

//Cerrar menu cuenta de usuario
$(document).mouseup(function (e)
 {
                var container = $("#OpcionCuenta");
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    //$("OpcionCuenta").animate({height:"0px"},200);
                      $(".OpcionCuenta").addClass("display"); 
                      $(".fuente").removeClass("paila");  
               }             
 });



function miCuentaclick(){

                  //Desactivamos las opciones "Proyectos" y "Usuarios" del menu vertical
                  
                  
                  $("#usuarios").removeClass("sobre_subm");
                  $("#item2").removeClass("activo");
                  $("#proyectos").removeClass("sobre_subm");
                  $("#item3").removeClass("activo");
                  //Activamos el boton Mi Cuenta del menu vertical
                  $("#cuenta").addClass("sobre_subm");
                  $("#item1").addClass("activo");
                   $("#Mhorizontal").removeClass("gn-open-all");



                 
                  document.getElementById("contenido").innerHTML = "";
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html #PerfilUsuario"));
                   $("#contenido").append($("<div>").load("usuarios/usuarios.html  #modals"));


              setTimeout(function(){      
              for (var i=0; i<=5; i++) {
              // alert("intento "+i);

              if ($('#Username').html()==" Nombre usuario ") {
                  $('#Username').html(usuario);
                  $('#Perfilpic').attr('src',''+root_+"public/img/usuario/perfil/"+identificador+"/"+foto);
                  $('#job').html("Administrador Valorízate");
                  $('#mailinput').val(mail);
                  $('#idinput').val(identificador);
                  $('#ubinput').val(ubicacion);
                  $("#credinput").css("display", "none");
                  $(".control").css("display", "none");
                  $("#controlfix").css("visibility", "initial");
              }

              }      
              }, 400 );          

      };

//En esta función mostramos la lista de usuarios
function usuariosclick(){

                  //Desactivamos las opciones "Mi cuenta" y "Usuarios" del menu vertical
              
                  $("#cuenta").removeClass("sobre_subm");
                  $("#item1").removeClass("activo");
                  $("#proyectos").removeClass("sobre_subm");
                  $("#item3").removeClass("activo");
                  //Activamos el boton usuarios del menu vertical
                  $("#usuarios").addClass("sobre_subm");
                  $("#item2").addClass("activo");

                  document.getElementById("contenido").innerHTML = "";
                  
                  //el fadeOut y fadeIn son solo para embellecer la transición de pagina
                  //$("#contenido").fadeOut(200);
                  //cargamos el contenido que queremos mostrar en el identificador elegido
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html #ListaUsuarios"));
                  $("#contenido").append($("<div>").load("usuarios/usuarios.html  #modals"));
                   $.getScript( "usuarios/js/function.js");
                   $.getScript( "usuarios/js/ready_index.js");
                  $("#Mhorizontal").removeClass("gn-open-all");


                  
                  //var agregarUsu = document.getElementById("AgregarUsuario");
                  //var conteniido = document.getElementById("contenido");    
                  //conteniido.appendChild(agregarUsu);
                  //$("#contenido").fadeIn(800);

                  //$like.classList.toggle('is-liked');

      
      };

  //En esta función agregamos el nuevo usuario    
  function Uagregado(){

                      //var Nombre = document.getElementById("Nombre");

                      //Guardamos los datos ingresados en el formulario dentro de variables
                      var Nombre= $("#Nombre").val();
                      var Correo= $("#Correo").val();
                      var Contraseña= $("#Contraseña").val();
                      var Ubicacion= $("#Ubicacion").val();
                      //Enviamos los datos guardados en las variables a ssesionStorage para guardarlos temporalmente dentro del navegador y utilizarlos a posterior
                      sessionStorage.setItem("nombre", Nombre);
                      sessionStorage.setItem("Correo", Correo);
                      sessionStorage.setItem("Contraseña", Contraseña);
                      sessionStorage.setItem("Ubicacion", Ubicacion);
                      //Teniendo los datos guardados volvemos  a la lista de los usuarios
                      //$("#AgregarUsuario").detach();
                      
                      //$("#contenido").append($("<div>").load("usuarios/usuarios.html #ListaUsuarios"));
                      //alert(Nombre+Contraseña+Correo);

                      //Y finalmente cargamos los datos ya guardados anteriormente para alimentar la lista
                      var nombre = sessionStorage.getItem("nombre");

                      alert('Formulario de prueba');

                      $('#Lista').append('<tr class="userlist"><td> 01 </td><td> fotico </td><td>'+nombre+'</td><td>'+Correo+'</td><td> Mil Millones </td><td>'+Ubicacion+'</td><td class="opciones">255<div class="opciones"><div class="borrar" title="Eliminar"><span class="icon-bin" style="opacity: 0;"></span></div><div class="actualizar" title="Actualizar"><span class="icon-loop2" style="opacity: 0;"></span></div></div></td></tr>');






                      //$('#posts').append(agregandoU()); 
  };




 function proyectosClick(){

                            //Desactivamos las opciones "Mi cuenta" y "Usuarios" del menu vertical
                            $("#usuarios").removeClass("sobre_subm");
                            $("#item2").removeClass("activo");
                            $("#cuenta").removeClass("sobre_subm");
                            $("#item1").removeClass("activo");
                            //Activamos el boton proyectos del menu vertical
                            $("#proyectos").addClass("sobre_subm");
                            $("#item3").addClass("activo");

                            document.getElementById("contenido").innerHTML = "";
                            
                            //el fadeOut y fadeIn son solo para embellecer la transición de pagina
                            //$("#contenido").fadeOut(200);
                            $("#contenido").append($("<div>").load("proyectos/proyectos.html #ListaProyectos"));

                            
                            $("#Mhorizontal").removeClass("gn-open-all");
                            
                            //var agregarUsu = document.getElementById("AgregarUsuario");
                            //var conteniido = document.getElementById("contenido");    
                            //conteniido.appendChild(agregarUsu);
                            //$("#contenido").fadeIn(800);
                };