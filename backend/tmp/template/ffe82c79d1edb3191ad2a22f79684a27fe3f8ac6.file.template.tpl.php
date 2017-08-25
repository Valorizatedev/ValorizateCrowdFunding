<?php /* Smarty version Smarty-3.1.13, created on 2017-05-04 23:27:29
         compiled from "/Applications/MAMP/htdocs/inventario/views/layout/2id_v3/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35899311959099a4625eca0-83942103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffe82c79d1edb3191ad2a22f79684a27fe3f8ac6' => 
    array (
      0 => '/Applications/MAMP/htdocs/inventario/views/layout/2id_v3/template.tpl',
      1 => 1493958414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35899311959099a4625eca0-83942103',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59099a466cd8a3_61351321',
  'variables' => 
  array (
    'titulo' => 0,
    '_layoutParams' => 0,
    'plg' => 0,
    'css' => 0,
    '_error' => 0,
    '_tipo_error' => 0,
    'it' => 0,
    'sub' => 0,
    'sub2' => 0,
    '_contenido' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59099a466cd8a3_61351321')) {function content_59099a466cd8a3_61351321($_smarty_tpl) {?><!DOCTYPE html>

		
<html lang="es">
    <head>
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['APP_SLOGAN'] : $tmp);?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
img/logo2id.png" type="image/x-icon" rel="shortcut icon" /-->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/css/dataTables/datatables.css" id="style-resource-1">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/css/font-icons/entypo/css/entypo.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-3">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/css/neon.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/css/custom.css"  id="style-resource-5">
		
		<link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
jquery.ui.autocomplete.css" rel="stylesheet" type="text/css">
		

		
		<!-- se llaman des de la plantilla -->
			<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jquery-1.10.2.min.js"></script>
		
		 <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['css_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['css_plugin'])){?>
            <?php  $_smarty_tpl->tpl_vars['plg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['css_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plg']->key => $_smarty_tpl->tpl_vars['plg']->value){
$_smarty_tpl->tpl_vars['plg']->_loop = true;
?>
                <link href="<?php echo $_smarty_tpl->tpl_vars['plg']->value;?>
" rel="stylesheet" type="text/css"/>
            <?php } ?>
        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['css'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['css'])){?>
            <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
                <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet" type="text/css"></link>
            <?php } ?>
        <?php }?>
        <style type="text/css">
        </style>
    </head>

    <body class="page-body page-fade" >
	
	
	<!-- Errores -->
	
	<input id="_error" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_error']->value)===null||$tmp==='' ? '' : $tmp);?>
" type="hidden"/>
	<input id="_tipo_error" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_tipo_error']->value)===null||$tmp==='' ? '' : $tmp);?>
" type="hidden"/>
		
	<div class="page-container">	
       	<div class="sidebar-menu">
					
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				
					<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
avtar.png" width="150" alt="" />
				
			</div>
			
			<!-- logo collapse icon -->
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		<ul id="main-menu" class="">
			
									 
                                <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['item'])&&$_smarty_tpl->tpl_vars['_layoutParams']->value['item']==$_smarty_tpl->tpl_vars['it']->value['id']){?>
                                        <?php $_smarty_tpl->tpl_vars["_style"] = new Smarty_variable('active', null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars["_style"] = new Smarty_variable('has-sub', null, 0);?>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['it']->value['enlace']){?>
                                        <li class="<?php echo $_smarty_tpl->tpl_vars['it']->value['estilo'];?>
">
                                            <a  href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['it']->value['imagen'];?>
"> </i> <span><?php echo $_smarty_tpl->tpl_vars['it']->value['titulo'];?>
</span></a>
                                        </li>
                                    <?php }else{ ?>
									
											<li class="<?php echo $_smarty_tpl->tpl_vars['it']->value['estilo'];?>
">
												<a  href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['it']->value['imagen'];?>
"> </i><span> <?php echo $_smarty_tpl->tpl_vars['it']->value['titulo'];?>
</span>
												</a>
												<ul class="dl-submenu">
													<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value){
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>

														<?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['item'])&&$_smarty_tpl->tpl_vars['_layoutParams']->value['item']==$_smarty_tpl->tpl_vars['sub']->value['id']){?>
															<?php $_smarty_tpl->tpl_vars["_style"] = new Smarty_variable('active', null, 0);?>
														<?php }else{ ?>
															<?php $_smarty_tpl->tpl_vars["_style"] = new Smarty_variable('has-sub', null, 0);?>
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['sub']->value['enlace']){?>
															<li class="<?php echo $_smarty_tpl->tpl_vars['sub']->value['estilo'];?>
">
																<a  href="<?php echo $_smarty_tpl->tpl_vars['sub']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['sub']->value['imagen'];?>
"> </i> <span><?php echo $_smarty_tpl->tpl_vars['sub']->value['titulo'];?>
</span></a>
															</li>
														<?php }else{ ?>
															<li class="">
																<a  href="<?php echo $_smarty_tpl->tpl_vars['sub']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['sub']->value['imagen'];?>
"> </i> <span><?php echo $_smarty_tpl->tpl_vars['sub']->value['titulo'];?>
</span>
																</a>
																<ul class="dl-submenu">
																	<?php  $_smarty_tpl->tpl_vars['sub2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub2']->key => $_smarty_tpl->tpl_vars['sub2']->value){
$_smarty_tpl->tpl_vars['sub2']->_loop = true;
?>

																		<?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['item'])&&$_smarty_tpl->tpl_vars['_layoutParams']->value['item']==$_smarty_tpl->tpl_vars['sub2']->value['id']){?>
																			<?php $_smarty_tpl->tpl_vars["_style"] = new Smarty_variable('active', null, 0);?>
																		<?php }else{ ?>
																			<?php $_smarty_tpl->tpl_vars["_style"] = new Smarty_variable('has-sub', null, 0);?>
																		<?php }?>
																		<li class="<?php echo $_smarty_tpl->tpl_vars['sub2']->value['estilo'];?>
">
																			<a  href="<?php echo $_smarty_tpl->tpl_vars['sub2']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['sub2']->value['imagen'];?>
"> </i><span> <?php echo $_smarty_tpl->tpl_vars['sub2']->value['titulo'];?>
</span></a>
																		</li>
																	<?php } ?>
																</ul>
															</li>
														<?php }?>
													<?php } ?>
												</ul>
											</li>
                                    <?php }?>
                                <?php } ?>

	</ul>
					
	</div>	
	
	<div class="main-content">
		<div class="col-md-6 col-sm-4 clearfix "> 
<?php if ((Session::get('autenticado'))){?>
	<ul class="user-info pull-left pull-none-xsm">
						<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php if (Session::get('foto')){?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/adjuntos/usuarios/<?php echo Session::get('foto');?>
"  alt="" class="img-circle" width="44" />
						<?php }else{ ?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/adjuntos/usuarios/user.png"  alt="" class="img-circle" width="44" />
						<?php }?>
					
					 <?php echo Session::get('usuario');?>

				</a>
				
				<ul class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
admin/usuario/personal">
							<i class="entypo-user"></i>
							Editar Perfil
						</a>
					</li>
					
					
				</ul>
			</li>
	</ul>

	</div>
		<div class="col-md-6 col-sm-4 ">
		
		<ul class="list-inline links-list pull-right">
			
		<li class="sep"></li>
			
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login/cerrar">
					Salir <i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
		
		</div>
		
	<?php }else{ ?>
		</div>

<?php }?>
	<br/><br/><br/><br/>
	
	<div class="contenedor">
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	
	
</div>

	
       
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jvectormap/jquery-jvectormap-1.2.2.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/rickshaw/rickshaw.min.css"  id="style-resource-2">
    
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.ui.autocomplete.js"></script>
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/joinable.js" id="script-resource-4"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/cookies.min.js" id="script-resource-7"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js" id="script-resource-8"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js" id="script-resource-9"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/jquery.sparkline.min.js" id="script-resource-10"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/rickshaw/vendor/d3.v3.js" id="script-resource-11"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/rickshaw/rickshaw.min.js" id="script-resource-12"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/raphael-min.js" id="script-resource-13"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/morris.min.js" id="script-resource-14"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/toastr.js" id="script-resource-15"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/neon-chat.js" id="script-resource-16"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/neon-custom.js" id="script-resource-17"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/neon-demo.js" id="script-resource-18"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/mensaje.js" id="script-resource-18"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/bootstrap-datepicker.js" id="script-resource-18"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/datatables.js" id="script-resource-18"></script>
	<!--script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/neon-skins.js" id="script-resource-19"></script-->
	       
        
        <script type="text/javascript">
            var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
';
			
			//alert('<?php echo Session::get("error");?>
');
			
			
			function setCookie(cname, cvalue) {
				document.cookie = cname + "=" + cvalue + "; " ;
			}
			
			function getCookie(cname) {
				var name = cname + "=";
				var ca = document.cookie.split(';');
				for(var i=0; i<ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1);
					if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
				}
				return "";
			}
			
			
			
		function alertas(_error,_tipo_error){	
			var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-right",
			"onclick": null,
			"showDuration": "3000",
			"hideDuration": "2000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
			if (_tipo_error == 1){
				toastr.error(_error, "Error", opts);//alerta de error
			}
			if (_tipo_error == 2){
				toastr.warning(_error, null, opts);//alerta de danger
			}
			if (_tipo_error == 3){
				toastr.success(_error, "Proceso exitoso", opts);//alert teminado
			}
			if (_tipo_error == 4){
				toastr.info(_error);//alert info
			}
			
			
			}
		
		if ('<?php echo Session::get("error");?>
'!=0){
			alertas('<?php echo Session::get("error");?>
','<?php echo Session::get("tipoerror");?>
');
	
		}
		
		
//alertas("mirando",1);		
			
        </script>
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])){?>
            <?php  $_smarty_tpl->tpl_vars['plg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plg']->key => $_smarty_tpl->tpl_vars['plg']->value){
$_smarty_tpl->tpl_vars['plg']->_loop = true;
?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['plg']->value;?>
" type="text/javascript"></script>
            <?php } ?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])){?>
            <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"></script>
            <?php } ?>
        <?php }?>
		
		
		
		<?php echo Session::set("error",'0');?>

		<?php echo Session::set("tipoerror",'0');?>

    </body>
</html><?php }} ?>