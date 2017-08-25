<?php /* Smarty version Smarty-3.1.13, created on 2017-05-20 20:20:11
         compiled from "/home/valorizate/ds.valorizate.com.co/backend/views/login/index2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3438053485920eb4b2c0a14-12201643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd95a17cda437e9edba4b71ed70878a28e20b4360' => 
    array (
      0 => '/home/valorizate/ds.valorizate.com.co/backend/views/login/index2.tpl',
      1 => 1493929913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3438053485920eb4b2c0a14-12201643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5920eb4b2c5353_84790875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5920eb4b2c5353_84790875')) {function content_5920eb4b2c5353_84790875($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V8.0 By roundCube</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
   
<body>
    <div id="dots"></div>
    <div id="dots"></div>
    <div id="dots"></div>
    <div id="dots"></div>
<div id="form">
    <h1><b>Ingresar</b></h1>
    </br></br>
    <img src="http://p.w3layouts.com/demos/user_login/images/avtar.png" height="140" width="140" style="left:25%">
    <div id="login">
        <div id="loginFields">
            <br>
            
            <form class="form-inline"  name="form1" style ="" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login" method="POST" enctype="multipart/form-data" autocomplete="off" >
                <input type="hidden" value="1" name="enviar" />
                <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="usuario" name="usuario" placeholder="USERNAME">
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control input-lg" name="pass" id='pass' placeholder="******">
                </div>
                </div>
                <div id="submission">
                      <button type="" class="btn btn-default btn-lg login">Entrar</button>
                </div>
            </form>
        </div>   
    </div>
    
    <div id="copyright">
        <a href="https://www.facebook.com/roundCubeInc?fref=ts">
            <p> Crear tienda</p>
        </a>
    </div>

</body>
    <style>
        body{
            /*background-image: url(https://photoshopgimptutorials.files.wordpress.com/2012/08/step-7.jpg);*/
            background: #373e4a;
        }
       
        #form{
            position: absolute;
            top:3%;
            height:500px;
            left:27%;
            width:44%;
            color:white;
            text-align: center;
        }
       
        #dots {
            position: absolute;

            top: 0;
            left: 0;
            right: 0;
            bottom: 0;

            background-image: url('http://www.uiueux.com/wp/flowfolio/wp-content/themes/flowfolio/img/bg_mask.png');
        }   
       
        #login{
            position: absolute;
            bottom:5px;
            left: 5%;
            width:100%;
            height:17%;
            border-radius: 7px;
        }
       
        .input-lg{
            border-color: #939393;
        }
       
        #loginFields{
            position: absolute;
            top:0px;
            left:0px;
            width:90%;
            height:100%;
            background-color: white;
            border-radius: 7px;
        }
       
        #submission{
            position: absolute;
            top:25%;
            height:50%;
            width:10%;
            right:0%;
        }
       
        .login{
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            background-color: orange;
            border-color: orange;
            color: white;
        }
       
        .login:Hover{
            background-color: #0080ff;
            border-color: #0080ff;
            color:White;
        }
       
        #copyright{
            position: absolute;
            bottom:2px;
            height:10%;
            left:0px;
            width:100%;
            text-align: center;
            color:white;

        }
       
        #copyright a{
            color:white;
            text-decoration: none;
        }
        #copyright a:hover{
            color:orange;
        }
       
        @media only screen and (max-width:1306px)
        {
            #form{
                width:50%;
                left:25%;
            }
        }
       
        @media only screen and (max-width:1152px)
        {
            #form{
                width:60%;
                left:20%;
            }
        }
       
        @media only screen and (max-width:974px)
        {
            #form{
                width:65%;
                left:17.5%;
            }
        }
       
        @media only screen and (max-width:901px)
        {
            #form{
                width:70%;
                left:15%;
            }
        }
       
       
        @media only screen and (max-width:837px)
        {
            #form{
                width:75%;
                left:12.5%;
            }
        }
       
        @media only screen and (max-width:783px)
        {
            #form{
                width:80%;
                left:10%;
            }
        }
       
        @media only screen and (max-width:765px)
        {
            #login{
                height:29%;
            }
           
            #submission{
                top:38%;
            }
           
            #form{
                left:25%;
                width:50%;
            }
           
            #loginFields{
                padding-right:15px;
                padding-left: 15px;
        }
           
        }
       
        @media only screen and (max-width:618px)
        {
            #form{
                width:60%;
                left:20%;
            }
        }
           
        @media only screen and (max-width:557px)
        {
            #form{
                width:70%;
                left:15%;
            }
        }
       
        @media only screen and (max-width:496px)
        {
            #form{
                width:80%;
                left:10%;
            }
        }
       
        @media only screen and (max-width:460px)
        {
            #form{
                left:3%;
            }
        }

        #loginFields{
            margin-top: -20%!important;
        }

        #submission{
         margin-top: -20%!important;   
        }
       
    </style>
   
</html><?php }} ?>