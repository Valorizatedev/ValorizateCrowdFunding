
// $(document).ready(function(){

// alert("conectado a function ");
// });


          // function conectar(){
          //   alert("conectado a function ");
          // }
      function cerrarmenu(){
        $(".content").removeClass("openClose");
      }

      function abrirmenu(){

        $(".content").toggleClass("openClose");

      }


      function recargarFormulario(){
        document.getElementById("regUsuario2").click();
                }
      
      function registrarme(){
        

        var reg=$(".nombre");
        if (reg.hasClass('display')) {
          // alert("si la tiene");
             $("#regPerfil").css("display","initial");
                setTimeout(function(){
             $("#regPerfil").css("transform","scale(1,1)");
             $("#regPerfil").css("opacity","1");

               }, 300);

             $(".cnct2").toggleClass("display");
             $(".nombre").toggleClass("display");
             $(".registrame").toggleClass("display");
             $(".registra").toggleClass("display");
             $(".conectame").toggleClass("display");
             $(".cuenta").toggleClass("display");
            $(".nuevo").toggleClass("display");
            $("#holab ").css("transform","scale(0.1,0.1)");
             $("#holab ").css("opacity","0");
             setTimeout(function(){
             $("#holab ").css("display","none");

               }, 300);
        } else { 

            }

      }

            function conectarme(){
               var reg=$(".nombre");
          if (reg.hasClass('display')) {


             $("#holab ").css("display","initial");
             setTimeout(function(){
             $("#holab ").css("transform","scale(1,1)");
             $("#holab ").css("opacity","1");
               }, 300);
              
          }else{
          setTimeout(function(){
             $("#regPerfil").css("display","none");

            $("#holab ").css("display","initial");
 }, 300);

             setTimeout(function(){
             $("#holab ").css("transform","scale(1,1)");
             $("#holab ").css("opacity","1");


               }, 400);
              // alert("no la tiene")
             // $("#regPerfil ").css("display","none");
             $("#regPerfil").css("transform","scale(0.1,0.1)");
             $("#regPerfil").css("opacity","0");
             
             $(".nombre").toggleClass("display");
             $(".registrame").toggleClass("display");
             $(".registra").toggleClass("display");
             $(".cnct2").toggleClass("display");
             $(".conectame").toggleClass("display");
             $(".cuenta").toggleClass("display");
              $(".nuevo").toggleClass("display");
               }
      }



      function detalleProyecto(){
               
          // var root3_="http://www.valorizate.com.co/";

          var logueado = sessionStorage.getItem("logueo");
          var identificador = sessionStorage.getItem("identificador");
          var foto = sessionStorage.getItem("foto");
          var root2_="http://www.valorizate.com.co/";
            var userName = sessionStorage.getItem("usuario");       
          

                if (logueado == null || logueado=="null") {
                  //No esta logueado
                }else{
                  //Si estas logueado

                    $("#derecha").css("display", "none");

                       var appendPerfil="" ;
                     appendPerfil= appendPerfil+
                    '<div  id="peerfil" onclick="abrirmenu();" >'+
                    '<img id="fotopeer" title="'+userName+'" uk-tooltip="pos: bottom">'+
                    '</div>';

                      $('#tabs').append(appendPerfil);


                      if (foto=="sin_foto") {
                        // alert("No tiene foto");
                        $('#fotopeer').attr('src',''+root2_+'assets/imagenes/fotoPerfil.png');
                      } else {
                        document.getElementById("fotopeer").src=root_+"public/img/usuario/perfil/"+identificador+"/"+foto;
                      }

                         var elemento5 = $("#tabs");
                  var posicionbar = elemento5.position();
                  var alturas=posicionbar.top;

                $(window).on("scroll",function(){
                  if($(window).scrollTop()>alturas){
                    $("#datosUsuario").css("transform", "translateY(-500%)");

                    $("#peerfil").css("transform", "translateX(-50px)");
                    $("#peerfil").css("opacity", "1");
                    

                  } else{

                     $("#datosUsuario").css("transform", "translateY(0%)");

                     $("#peerfil").css("opacity", "0");
                     $("#peerfil").css("transform", "translateX(0px)");
                  }
                });  

                }

          
            //el fadeOut y fadeIn son solo para embellecer la transición de pagina
            // document.getElementById("contenidoGlobal").innerHTML = "" ;      	
            // $("#contenido").fadeOut(200);      
            // $("#contenidoGlobal").append($("<div>").load("oportunidades/oportunidades.html #detalleInversion", function(){

                $("#contenidoGlobal").css("padding-top", "55px");

                 $("#contemadre").css("margin-top","0px !important");


              //funcion callback, cargamos el contenido del documento inmediatamente termina de cargar la maqueta html

              $("#texAnali").append($("<div>").load("oportunidades/pp5/pp5.html #descAnali"));
              $("#mapaAnali").css("background-image", "url('"+root2_+"oportunidades/pp5/usosuelo.jpg')");
              $("#mapaVial").css("background-image", "url('"+root2_+"oportunidades/pp5/Mallavial.jpg')");
              // $("#sliders").append($("<div>").load("oportunidades/oportunidades.html #conSlider", function(){

              // }));
                // $.getScript("assets/js/slide.js");

                // $("#docuPlanos").css("background-image", "url('http://www.valorizate.com.co/oportunidades/pp5/planosProyecto.jpg')");
              
                  $("#docuPlanos").css("background-image", "url('"+root2_+"oportunidades/pp5/pp5.jpg')");

                  $("#docuPlanos2").css("background-image", "url('"+root2_+"oportunidades/pp5/planosProyecto.jpg')");
                  $("#docuPlanos3").css("background-image", "url('"+root2_+"oportunidades/pp5/planosProyecto2.jpg')");
                  $("#docuPlanos4").css("background-image", "url('"+root2_+"oportunidades/pp5/planosProyecto3.jpg')");

                  
                       // google.charts.load('current', {packages: ['corechart']});

                      // google.charts.setOnLoadCallback(dibujarChart);

                      //agregamos el chart por medio de la API de google
                       google.charts.load('current', {packages: ['corechart']});
                      google.charts.setOnLoadCallback(dibujarChart);
              
            
            $("#contenido").fadeIn(400);

            // abrir link en ventana nueva
            // $("a#saberMas").prop('href','https://www.valorizate.com.co/oportunidades/oportunidades.html').attr('target','_blank');



                  var elemento5 = $("#tabs");
                  var posicionbar = elemento5.position();
                  var alturas=posicionbar.top;
                  
                $(window).on("scroll",function(){
                  if($(window).scrollTop()>alturas){
              
                    $("#progresado").css("width", "33%");
                    $("#RentAqui").css("transform", "initial");
                     $("#RentAqui").css("opacity", "1");
                     $("#RentAqui2").css("color", "#A5D650");
                     $("#RentAqui2").css("margin-right", "0");

                    $("#progresado2").css("width", "33%");
                    $("#RentAqui3").css("transform", "initial");
                     $("#RentAqui3").css("opacity", "1");
                     $("#RentAqui4").css("color", "#A5D650");
                     $("#RentAqui4").css("margin-right", "0");

                    $("#PeopleAqui").css("transform", "initial");
                     $("#PeopleAqui").css("opacity", "1");
                     $("#PeopleAqui2").css("color", "#A5D650");
                     $("#PeopleAqui2").css("margin-right", "0");

                     $("#PeopleAqui3").css("transform", "initial");
                     $("#PeopleAqui3").css("opacity", "1");
                     $("#PeopleAqui4").css("color", "#A5D650");
                     $("#PeopleAqui4").css("margin-right", "0");

                    $("#meta").css("background", "#005a55");
                    $("#meta span").css("color", "rgb(0, 252, 108)"); 

                    $("#meta2").css("background", "#005a55");
                    $("#meta2 span").css("color", "rgb(0, 252, 108)");

                    $("#fixInvertir").css("position", "fixed");

                    // $("#panelInv2").css("width", "290px");

                    // $("#tabs").css("position", "fixed");
                    // $("#tabs").css("width", "69%");
                    $("#tabs").css("height", "55px");
                    $("#tabs").addClass("sombra");

                    $("#cabecera").css("transform", "translateY(-55px)");

                    $("#derecha").css("opacity", "1");

                    $("#derecha").css("transform", "translateX(-50px)");
                    // $("#derecha").css("opacity", "1");

                    $("#izquierda").css("transform", "translateX(10px)");
                    $("#izquierda").css("opacity", "1");
                  } else{
                    $("#progresado2").css("width", "0%");
                      

                     $("#RentAqui").css("transform", "scale(0.1,0.1)");
                     $("#RentAqui").css("opacity", "0");
                     $("#RentAqui2").css("color", "#666");
                     $("#RentAqui2").css("margin-right", "50%");

                     $("#RentAqui3").css("transform", "scale(0.1,0.1)");
                     $("#RentAqui3").css("opacity", "0");
                     $("#RentAqui4").css("color", "#666");
                     $("#RentAqui4").css("margin-right", "50%");

                    $("#PeopleAqui").css("transform", "scale(0.1,0.1)");
                    $("#PeopleAqui").css("opacity", "0");
                     $("#PeopleAqui2").css("color", "#666");
                     $("#PeopleAqui2").css("margin-right", "50%");

                    $("#PeopleAqui3").css("transform", "scale(0.1,0.1)");
                    $("#PeopleAqui3").css("opacity", "0");
                     $("#PeopleAqui4").css("color", "#666");
                     $("#PeopleAqui4").css("margin-right", "50%");

                    $("#meta span").css("color", "#666"); 
                    $("#meta").css("background", "#f3f2f4");

                    $("#meta2 span").css("color", "#666"); 
                    $("#meta2").css("background", "#f3f2f4");

                    // $("#panelInv2").css("position", "initial");
                    $("#fixInvertir").css("position", "initial");
                    
                    $("#izquierda").css("transform", "translateX(-50px)");
                    $("#izquierda").css("opacity", "0");

                       $("#derecha").css("opacity", "0");
                        $("#derecha").css("transform", "translateX(-100px)");

                        $("#cabecera").css("transform", "translateY(0px)");

                        // $("#tabs").css("position", "initial");
                        $("#tabs").css("width", "100%");
                        $("#tabs").css("height", "70px");
                        $("#tabs").removeClass("sombra");
                    // $("#tabs").css("position", "initial");
                    // $("#controlfix").css("visibility", "hidden");
                    // $("#controlfix").removeClass("aparecer");
                  }
                });  

          // } ));//final callback



                setTimeout(function(){
                  // $("#fotopeer").css("display", "none");
                  var elemento = $("#estadRenta");
                  var posicionEsta = elemento.position();
                  var estadistica=posicionEsta.top;

                  var elemento2 = $("#documentacion");
                  var posicionDoc = elemento2.position();
                  var documentacio=posicionDoc.top; 


                  $("#estadis").css("color", "rgb(0, 252, 108) !important");
                  $(window).on("scroll",function(){

                  if($(window).scrollTop()>estadistica){
                    $("#analis").removeClass("coolor");
                    $("#estadis").addClass("coolor");
                    $("#analis2").removeClass("coolor");
                    $("#estadis2").addClass("coolor");
                  } else{
                    $("#estadis").removeClass("coolor");
                    $("#analis").addClass("coolor");
                    $("#estadis2").removeClass("coolor");
                    $("#analis2").addClass("coolor");
                  }
                  if($(window).scrollTop()>documentacio){
                    // alert("estas en documentación")

                    $("#estadis").removeClass("coolor");
                    $("#docs").addClass("coolor");
                    $("#estadis2").removeClass("coolor");
                    $("#docs2").addClass("coolor");
                  } else{
                    $("#docs").removeClass("coolor");
                    $("#docs2").removeClass("coolor");
                    // $("#estadis").addClass("coolor");
                  }

                });  
               }, 1200);


      };


































      function registrar(){

                var jnombre= $("#nombre").val();
                var jemail= $("#usuario").val();
                var jpass= $("#pass").val();
                
                var ids=$("#identificador").val();
                var imgPer =  $("#uimg2").val()
                // alert(ids);
                if (imgPer=="") {
                  var imgPer = "sin_foto";
                }


                $.ajax({
                  type: "POST",
                  url: root_+"admin/usuario/crear/",
                  data: {nombre:jnombre, email:jemail, pass:jpass, id:ids, img:imgPer},
                  dataType: 'json',
                  success: function(res){
                      // alert(ids+" Bienvenido"); 
                      if (res.message=='success'){

                      login();
        // alert("Te logueas");
        // window.location.href = "usuario/usuario.html";

          //log = "Conectado";          
          //sessionStorage.setItem("logueo", log);
          //sessionStorage.setItem("usuario", res.data[0].usu_nombre);
          //sessionStorage.setItem("foto", res.data[0].usu_foto);               
          //console.log(res.data[0].usu_foto);
        //window.location.href = "admin/admin.html";
          }
        }
        });



        }


        function login(){
      

    var jusuraio= $("#usuario").val();
    var jpass= $("#pass").val();
        var log= "Nuevo";
    $.ajax({
      type: "POST",
      url: root_+"admin/usuario/login/",
      data: {usuario:jusuraio, pass:jpass},
      dataType: 'json',
      success: function(res){
   
           
        // console.log(res.data);
        if (res.tam>0)
        {
                log = "conectado";
          
          sessionStorage.setItem("logueo", log);
          sessionStorage.setItem("usuario", res.data[0].usu_nombre);
          sessionStorage.setItem("identificador", res.data[0].usu_key);
          sessionStorage.setItem("foto", res.data[0].usu_foto); 
          sessionStorage.setItem("foto2", res.data[0].usu_foto2); 
          // console.log(res.data);
          sessionStorage.setItem("mail", res.data[0].usu_email); 
          sessionStorage.setItem("ubicacion", res.data[0].usu_observaciones); 
          
                
                // console.log(res.data);
                if ((res.data[0].usu_key)==1) {

                  // alert("Es el administrador");
                  window.location.href = "http://www.valorizate.com.co/admin/admin.html";
                } else if (window.location.href =="http://www.valorizate.com.co/" || window.location.href =="http://www.valorizate.com.co/index.html" ) {

                            window.location.href = "http://www.valorizate.com.co/usuario/usuario.html";

                   }else {
                   // alert(res.data[0].usu_tarjeta);
                  var url = window.location.href;  

                            window.location.href = url;

                  // window.location.href = "http://www.valorizate.com.co/usuario/usuario.html"; 
                }
        }
        else
        {

                log="";
          UIkit.notification("Ups!, al parecer el correo ya se encuentra registrado o no has llenado todos los campos debidamente. Vuelve a intentarlo :).", {pos: 'bottom-right'});

          $(".correo").addClass("malo");
          
      //     $("#divCorreo").toggleClass("display");
          


      // setTimeout(function(){
      //     $("#divCorreo").toggleClass("display");
      // }, 3500);

          
          
        }
        

      },
      
    }); 
    }



       

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