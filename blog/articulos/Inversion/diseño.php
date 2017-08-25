<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorizate</title>
    <link rel="stylesheet" href="../../recursos/css/app.css">
    <link rel="stylesheet" href="../../recursos/fonts.css">
    <link rel="stylesheet" media="(max-width: 500px)" href="../../recursos/css/mediaq.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
     <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
     
  </head>
  <body class="cuerpo">
  <?php require_once('../cabecera.php'); ?>      



<div class="contenido fondo">



    <img class="imagen menu-bar imagens" id="menu-bar" src="http://valorizate.com.co/recursos/images/logo.png" alt="">
    <?php require_once('submenu.php'); ?>


  
    <div class="contenedor fondo">

         
         <div class="dos articulo" style="padding-top: 0;">


       <h1 style="text-align: center;" class="texto1"><strong>INVERSIÓN</strong></h1>
       <h2 style="text-align: center;" class="texto3 display" id="cate" ><strong>Diseño y Arquitectura</strong></h2>



<?php require_once('../../slide.php'); ?>
  
      <div class="container" >
      <div  class="grid2" style="display: flex; justify-content: space-around;  flex-wrap: wrap; margin-top: 20px;" >
        <div><h3 class="display">Titulo articulos</h3><a href="#"><img src="../../recursos/images/dummy.png" alt="dummy"></a></div>
         <div><h3 class="display">Titulo articulos</h3><a href="#"><img src="../../recursos/images/dummy.png" alt="dummy"></a></div>
        <div><h3  class="display">Titulo articulos</h3><a href="#"><img src="../../recursos/images/dummy.png" alt="dummy"></a></div>
        <div><h3 class="display">Titulo articulos</h3><a href="#"><img style="border-color: 1px black" src="../../recursos/images/dummy.png" alt="dummy"></a></div>
      </div>  
      
      
    </div>




         </div>
    </div>
</div>








    <script src="../../recursos/js/jquery-3.1.1.min.js" ></script>
     <script src="../../recursos/js/navegacion.js" ></script>
    
    <script src="../../recursos/js/abrir.js"></script>

    <script src="../../recursos/js/slider/jquery.slides.js" ></script>
    <script class="slidescript">    
$(function(){
  $(".slides").slidesjs({
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 5000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover:false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 4000
        // [number] restart delay on inactive slideshow
    }
  });
});
    </script>

         <script>
      $(document).ready(function($){
        $(".dis").toggleClass("activado");
        $("#diseño").toggleClass("activado2");
        $("#inversion").toggleClass("activado3");
      });
    </script>   



  </body>
</html>
