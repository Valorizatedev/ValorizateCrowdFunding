   $(document).ready(function(){




fotoPerfilFuncion();

  if (($(window).width())>=900) {

        $("#datosUsuario").hover(function(){
                          //abrimos el menu al hacer hover sobre la info del user 
                            $("#datUsuarioExp").css("animation", "hola .5s forwards");

            }, function(){

                          //al dejar de hacer over, habilitamos la función que al momento que se haga click fuera del menu expandido esta se cierre
                         
                            $(document).mouseup(function (e) {
                            var container = $("#datUsuarioExp");
                            if (!container.is(e.target) && container.has(e.target).length === 0) 
                            {
                                $("#datUsuarioExp").css("animation", "chao .3s forwards");
                                 // clearTimeout(timeoutId);
                              }     
                             });

                  //el menu tambien se cerrara automaticamente despues de 25 segundos por inactividad
                  // if ($(".hola").css("animation", "hola .5s forwards")) {
                  //           var timeoutId = setTimeout(function(){
                  //               $(".hola").css("animation", "chao .3s forwards");
                  //                clearTimeout(timeoutId);

                  //             }, 15000);    
                  // }
        		});
  
  };

  


  $("#Mhorizontal").mouseleave(function(){
     if ($("#Mhorizontal").hasClass("gn-open-all")) {
      setTimeout(function(){
         $("#Mhorizontal").removeClass("gn-open-all");
          $("#Mhorizontal").removeClass("abrirmenu");
               }, 500);
      }

  });




});


      function abrirmenu(){
        
        $(".content").toggleClass("openClose");

      }
         function cerrarExp(){

          setTimeout(function(){
              $(".hola").css("animation", "chao .3s forwards");
            }, 1000);  
         };


         function cerrar(){

                  var url = window.location.href;  

                  var logueado = "null";
                   sessionStorage.setItem("logueo",logueado);

                   if (window.location.href =="http://www.valorizate.com.co/usuario/usuario.html") {

                            window.location.href = "http://www.valorizate.com.co";

                   }else{
                            window.location.href = url;

                   }
            
                };

function fotoPerfilFuncion(){
                 var userName = sessionStorage.getItem("usuario");       
                $("#miCuenta").html(userName);
                

                  var foto = sessionStorage.getItem("foto");
                 
                  
                var ids = sessionStorage.getItem("identificador");

                // alert(foto2+"  "+foto)
                if (foto=="sin_foto") {
                  // alert("No tiene foto");
                  $('#fotoPerfil').attr('src',''+root2_+'assets/imagenes/fotoPerfil.png');
                } else {
                  $('#fotoPerfil').attr('src',''+root_+'public/img/usuario/perfil/'+ids+'/'+foto+'');
                }


}

// 


        function dibujarChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'año');
      data.addColumn('number', 'revalorizacion');
      data.addRows([
        ['Enero - 2017', 400000],
        ['junio - 2017', 421000],
        ['dic - 2017', 480000],
        ['junio - 2018', 530000],
        ['junio - 2019', 588000]
      ]);

        var options = {
          title: 'Revalorización metro cuadrado',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
      // Instantiate and draw the chart.
      var chart = new google.visualization.AreaChart(document.getElementById('myPieChart'));
      chart.draw(data, options);
    }

       function misInversionesClick(){

                // var urlActual = "http://www.valorizate.com.co/usuario/usuario.html"
                  var mod = "mis inversiones";

                  localStorage.setItem("Modulo", mod);
                  inversionesActivo();


                // if (location.href==urlActual) {


                $("#contenidoGlobal").append($("<div>").load("http://www.valorizate.com.co/usuario/modulos.html #misInveriones"));
                // }else{

                  // $("#investment").attr("href", "usuario/usuario.html")
                  // document.getElementById("investment").click();

                // $("#contenidoGlobal").append($("<div>").load("http://www.valorizate.com.co/usuario/modulos.html #misInveriones"));
                

                // }
       }

       function  oportunidadesClick(){
        $(".content").removeClass("openClose");


                // var urlActual = "http://www.valorizate.com.co/usuario/usuario.html"
                var mod = "oportunidades";
                localStorage.setItem("Modulo", mod);
                oportunidActivo();



                // if (location.href==urlActual) {

                $("#contenidoGlobal").append($("<div>").load("http://www.valorizate.com.co/oportunidades/oportunidades.html #oportunidades", function(){

                $("#masaber").attr("href", "http://www.valorizate.com.co/planparcial5.html")
                $("#saberMas").attr("href", "http://www.valorizate.com.co/planparcial5.html")
                $.getScript("http://www.valorizate.com.co/assets/js/slide.js");

                }));

                // }else{

                //   // $("#oportunity").attr("href", "http://www.valorizate.com.co/usuario/usuario.html")
                 
                // $("#contenidoGlobal").append($("<div>").load("http://www.valorizate.com.co/oportunidades/oportunidades.html #oportunidades", function(){
                // $("#masaber").attr("href", "http://www.valorizate.com.co/planparcial5.html")
                // $("#saberMas").attr("href", "http://www.valorizate.com.co/planparcial5.html")
                // $.getScript("../assets/js/slide.js");
                // }));



                // }

       }


       function  miCuentaclick(){

                // var urlActual = "http://www.valorizate.com.co/usuario/usuario.html"

                  var mod = "Mi cuenta";
                  localStorage.setItem("Modulo", mod);
                cuentActivo();


                // if (location.href==urlActual) {

                $("#contenidoGlobal").append($("<div>").load("http://www.valorizate.com.co/usuario/modulos.html #miCuenta",function(){
                abrirCuenta();

                habilitarCambios();
                 // $.getScript("assets/js/perfil_pic.js");

                }));

                // }else{

                // $("#contenidoGlobal").append($("<div>").load("http://www.valorizate.com.co/usuario/modulos.html #miCuenta",function(){
                // abrirCuenta();
                // habilitarCambios();

                // }));

                // }
      }

         function habilitarCambios(){
			$("#nameimput").change(function(){
				cambiosHabilitados();
			});
			$("#uimg").change(function(){
				cambiosHabilitados();
			});
			$("#idcontra").change(function(){
				cambiosHabilitados();
			});
			$("#mailinput2").change(function(){
				cambiosHabilitados();
			});
			$("#ubinput2").change(function(){
				cambiosHabilitados();
			});
			$("#credinput2").change(function(){
				cambiosHabilitados();
			});
			$("#anoveninput").change(function(){
				cambiosHabilitados();
			});
			$("#mesveninput").change(function(){
				cambiosHabilitados();
			});
			$("#codigotaringput").change(function(){
				cambiosHabilitados();
			});
   		};

         function cambiosHabilitados(){
         	// alert("habilitando");

            $("#btnForm").css("display","initial");
          setTimeout(function(){
            $("#btnForm").css("opacity","1");
            $("#btnForm").css("transform","scale(1,1)");


            }, 50);  


         };



       function  cuentActivo(){
                  $("#usuarios").removeClass("activado");
                  $("#item2").removeClass("activo");
                  $("#proyectos").removeClass("activado");
                  $("#item3").removeClass("activo");
                  //Activamos el boton Mi Cuenta del menu vertical
                  $("#cuenta").addClass("activado");
                  $("#item1").addClass("activo");
                   $("#Mhorizontal").removeClass("gn-open-all");
                $("#contenidoGlobal").html("");

      }

       function  oportunidActivo(){

         $("#cuenta").removeClass("activado");
          $("#item1").removeClass("activo");
          $("#proyectos").removeClass("activado");
          $("#item3").removeClass("activo");
                          //Activamos el boton usuarios del menu vertical
          $("#usuarios").addClass("activado");
          $("#item2").addClass("activo");
          $("#Mhorizontal").removeClass("gn-open-all");
          $("#contenidoGlobal").html("");

       }

       function  inversionesActivo(){

                             //Desactivamos las opciones "Mi cuenta" y "Usuarios" del menu vertical
                             // alert("cabron");
                            $("#usuarios").removeClass("activado");   
                            $("#item2").removeClass("activo");
                            $("#cuenta").removeClass("activado");
                            $("#item1").removeClass("activo");
                            //Activamos el boton proyectos del menu vertical
                            $("#proyectos").addClass("activado");
                            $("#item3").addClass("activo");
                            $("#Mhorizontal").removeClass("gn-open-all");
                            
                $("#contenidoGlobal").html("");
        }





       function  abrirCuenta(){

          var userName = sessionStorage.getItem("usuario");       
          var foto = sessionStorage.getItem("foto");
          var iden2 = sessionStorage.getItem("identificador");

                if (foto=="sin_foto") {
                  // alert("No tiene foto");
                  $('#imgPerfil2').css('background','url('+root2_+'assets/imagenes/fotoPerfil.png'+')');
                } else {
                  $('#imgPerfil2').css('background','url('+root_+'public/img/usuario/perfil/'+iden2+'/'+foto+')');
                }

            // alert("abrir cuenta funcionando");
          setTimeout(function(){

            $("#imgPerfil").css("opacity","1");
            $("#imgPerfil").css("transform","scale(1,1)");
            $("#datosPerfil").css("animation", "hola .5s forwards");


            }, 100);  

          // alert("funca"+ids+userName);

                $.ajax({
            type: "POST",
            url: root_+"admin/usuario/perfil/"+iden2,
            dataType: "json",
            data: {},
            success: function(res) {
                  $('#uimg').val(res.data.usu_foto2);


                // console.log(res.data);
                  $('#identificador').html(res.data.usu_key);

                  $('#nombrehtm').html(res.data.usu_nombre);
                  $('#nameimput').val(res.data.usu_nombre);
                  $('#mailinput2').val(res.data.usu_email);
                  // $('#idcontra').val(res.data.usu_password);
                  $('#ubinput2').val(res.data.usu_observaciones);
                  $('#credinput2').val(res.data.usu_tarjeta);
                  $('#anoveninput').val(res.data.usu_ano_ven);
                  $('#mesveninput').val(res.data.usu_mes_ven);
                  $('#codigotaringput').val(res.data.usu_codigo);

                  var logCuenta = res.data.usu_email;
                   sessionStorage.setItem("cuentActual",logCuenta);

                  // alert(logCuenta);



				// var urlActual = "http://www.valorizate.com.co/usuario/usuario.html"
				// alert(urlActual);

                // if (location.href==urlActual) {
                 $.getScript("http://www.valorizate.com.co/usuario/assets/js/perfil_pic.js");
                // }else{
                //  $.getScript("usuario/assets/js/perfil_pic.js");
                // }


                  


            },
            complete:function(res){

              
            }
        });



      }







function editado(){
	// logCuenta


       var jnombre=$('#nameimput').val(),
      jid=$('#identificador').html(),    
      jmail=$('#mailinput2').val(), 
      jubicacion=$('#ubinput2').val(), 
      jtar=$('#credinput2').val(),
      jfoto=$('#uimg').val(),
      jmes=$('#mesveninput').val(), 
      jano=$('#anoveninput').val(), 
      jcod=$('#codigotaringput').val(); 


      
        $.ajax({
            type: "POST",
            url: root_+"admin/usuario/editar/"+jid,
            dataType: "json",
            data: {
              nombre:jnombre,email:jmail,ubi:jubicacion,tarjeta:jtar,img:jfoto,mes:jmes,ano:jano,cod:jcod
            },
            success: function(res) {

            }

        });


      $("#miCuenta").html(jnombre);
       var jnombre = sessionStorage.getItem("usuario");   
     document.getElementById("offcanvas-flip").click();

     var timeoutId = setTimeout(function(){
      	miCuentaclick();
    	UIkit.notification("¡Genial!, tus cambios se realizaron con exito :)", {pos: 'bottom-right'});

       }, 500);    





}






function EfectuarCambios(){
     
                   // var CuentaenUso = sessionStorage.getItem("mail");
                   var CuentaenUso = "guevaara1892";

                   alert(CuentaenUso);      
	     			var passe= $("#contrActual").val();

    $.ajax({
      type: "POST",
      url: root_+"admin/usuario/login/",
      data: {usuario:CuentaenUso, pass:passe},
      dataType: 'json',
      success: function(res){
   
           console.log(res);
     
        if (res.tam>0)
        {
                alert("Cambios realizados");
        }
        else
        {
			alert("contraseña incorrecta");
        }

      },
      
    }); 

    }








