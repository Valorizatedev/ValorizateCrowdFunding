<!DOCTYPE html>

		
<html lang="es">
    <head>
        <title>{$titulo|default:$_layoutParams.configs.APP_SLOGAN}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--link href="{$_layoutParams.ruta}img/logo2id.png" type="image/x-icon" rel="shortcut icon" /-->
		<link rel="stylesheet" href="{$_layoutParams.ruta}assets/css/dataTables/datatables.css" id="style-resource-1">
        <link href="{$_layoutParams.ruta}assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css">
        <link href="{$_layoutParams.ruta}assets/css/font-icons/entypo/css/entypo.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-3">
        <link href="{$_layoutParams.ruta}assets/css/neon.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{$_layoutParams.ruta}assets/css/custom.css"  id="style-resource-5">
		
		<link href="{$_layoutParams.ruta_css}jquery.ui.autocomplete.css" rel="stylesheet" type="text/css">
		

		
		<!-- se llaman des de la plantilla -->
			<script src="{$_layoutParams.ruta}assets/js/jquery-1.10.2.min.js"></script>
		
		 {if isset($_layoutParams.css_plugin) && count($_layoutParams.css_plugin)}
            {foreach item=plg from=$_layoutParams.css_plugin}
                <link href="{$plg}" rel="stylesheet" type="text/css"/>
            {/foreach}
        {/if}
        {*print_r($_layoutParams)*}
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
            {foreach item=css from=$_layoutParams.css}
                <link href="{$css}" rel="stylesheet" type="text/css"></link>
            {/foreach}
        {/if}
        <style type="text/css">
        </style>
    </head>

    <body class="page-body page-fade" >
	
	
	<!-- Errores -->
	
	<input id="_error" value="{$_error|default:''}" type="hidden"/>
	<input id="_tipo_error" value="{$_tipo_error|default:''}" type="hidden"/>
		
	<div class="page-container">	
       	<div class="sidebar-menu">
					
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				
					<img src="{$_layoutParams.ruta_img}avtar.png" width="150" alt="" />
				
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
			
									 
                                {foreach item=it from=$_layoutParams.menu}
                                    {if isset($_layoutParams.item) && $_layoutParams.item == $it.id}
                                        {assign var="_style" value='active'}
                                    {else}
                                        {assign var="_style" value='has-sub'}
                                    {/if}

                                    {if $it.enlace}
                                        <li class="{$it.estilo}">
                                            <a  href="{$it.enlace}"><i class="{$it.imagen}"> </i> <span>{$it.titulo}</span></a>
                                        </li>
                                    {else}
									
											<li class="{$it.estilo}">
												<a  href="{$it.enlace}"><i class="{$it.imagen}"> </i><span> {$it.titulo}</span>
												</a>
												<ul class="dl-submenu">
													{foreach item=sub from=$it.submenu}

														{if isset($_layoutParams.item) && $_layoutParams.item == $sub.id}
															{assign var="_style" value='active'}
														{else}
															{assign var="_style" value='has-sub'}
														{/if}
														{if $sub.enlace}
															<li class="{$sub.estilo}">
																<a  href="{$sub.enlace}"><i class="{$sub.imagen}"> </i> <span>{$sub.titulo}</span></a>
															</li>
														{else}
															<li class="">
																<a  href="{$sub.enlace}"><i class="{$sub.imagen}"> </i> <span>{$sub.titulo}</span>
																</a>
																<ul class="dl-submenu">
																	{foreach item=sub2 from=$sub.submenu}

																		{if isset($_layoutParams.item) && $_layoutParams.item == $sub2.id}
																			{assign var="_style" value='active'}
																		{else}
																			{assign var="_style" value='has-sub'}
																		{/if}
																		<li class="{$sub2.estilo}">
																			<a  href="{$sub2.enlace}"><i class="{$sub2.imagen}"> </i><span> {$sub2.titulo}</span></a>
																		</li>
																	{/foreach}
																</ul>
															</li>
														{/if}
													{/foreach}
												</ul>
											</li>
                                    {/if}
                                {/foreach}

	</ul>
					
	</div>	
	
	<div class="main-content">
		<div class="col-md-6 col-sm-4 clearfix "> 
{if (Session::get('autenticado'))}
	<ul class="user-info pull-left pull-none-xsm">
						<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						{if Session::get('foto')}
							<img src="{$_layoutParams.root}public/adjuntos/usuarios/{Session::get('foto')}"  alt="" class="img-circle" width="44" />
						{else}
							<img src="{$_layoutParams.root}public/adjuntos/usuarios/user.png"  alt="" class="img-circle" width="44" />
						{/if}
					
					 {Session::get('usuario')}
				</a>
				
				<ul class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
					<li>
						<a href="{$_layoutParams.root}admin/usuario/personal">
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
				<a href="{$_layoutParams.root}login/cerrar">
					Salir <i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
		
		</div>
		
	{else}
		</div>

{/if}
	<br/><br/><br/><br/>
	
	<div class="contenedor">
	{include file=$_contenido}
	</div>
	
	
</div>

	
       
    <link rel="stylesheet" href="{$_layoutParams.ruta}assets/js/jvectormap/jquery-jvectormap-1.2.2.css"  id="style-resource-1">
	<link rel="stylesheet" href="{$_layoutParams.ruta}assets/js/rickshaw/rickshaw.min.css"  id="style-resource-2">
    
	<script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-ui.js"></script>
    <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="{$_layoutParams.root}public/js/jquery.ui.autocomplete.js"></script>
	
	<script src="{$_layoutParams.ruta}assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="{$_layoutParams.ruta}assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="{$_layoutParams.ruta}assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="{$_layoutParams.ruta}assets/js/joinable.js" id="script-resource-4"></script>
	<script src="{$_layoutParams.ruta}assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="{$_layoutParams.ruta}assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="{$_layoutParams.ruta}assets/js/cookies.min.js" id="script-resource-7"></script>
	<script src="{$_layoutParams.ruta}assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js" id="script-resource-8"></script>
	<script src="{$_layoutParams.ruta}assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js" id="script-resource-9"></script>
	<script src="{$_layoutParams.ruta}assets/js/jquery.sparkline.min.js" id="script-resource-10"></script>
	<script src="{$_layoutParams.ruta}assets/js/rickshaw/vendor/d3.v3.js" id="script-resource-11"></script>
	<script src="{$_layoutParams.ruta}assets/js/rickshaw/rickshaw.min.js" id="script-resource-12"></script>
	<script src="{$_layoutParams.ruta}assets/js/raphael-min.js" id="script-resource-13"></script>
	<script src="{$_layoutParams.ruta}assets/js/morris.min.js" id="script-resource-14"></script>
	<script src="{$_layoutParams.ruta}assets/js/toastr.js" id="script-resource-15"></script>
	<script src="{$_layoutParams.ruta}assets/js/neon-chat.js" id="script-resource-16"></script>
	<script src="{$_layoutParams.ruta}assets/js/neon-custom.js" id="script-resource-17"></script>
	<script src="{$_layoutParams.ruta}assets/js/neon-demo.js" id="script-resource-18"></script>
	<script src="{$_layoutParams.ruta}assets/js/mensaje.js" id="script-resource-18"></script>
	<script src="{$_layoutParams.ruta}assets/js/bootstrap-datepicker.js" id="script-resource-18"></script>
	<script src="{$_layoutParams.ruta}assets/js/datatables.js" id="script-resource-18"></script>
	<!--script src="{$_layoutParams.ruta}assets/js/neon-skins.js" id="script-resource-19"></script-->
	       
        
        <script type="text/javascript">
            var _root_ = '{$_layoutParams.root}';
			
			//alert('{Session::get("error")}');
			
			
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
		
		if ('{Session::get("error")}'!=0){
			alertas('{Session::get("error")}','{Session::get("tipoerror")}');
	
		}
		
		
//alertas("mirando",1);		
			
        </script>
        {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
            {foreach item=plg from=$_layoutParams.js_plugin}
                <script src="{$plg}" type="text/javascript"></script>
            {/foreach}
        {/if}

        {if isset($_layoutParams.js) && count($_layoutParams.js)}
            {foreach item=js from=$_layoutParams.js}
                <script src="{$js}" type="text/javascript"></script>
            {/foreach}
        {/if}
		
		
		
		{Session::set("error", '0')}
		{Session::set("tipoerror", '0')}
    </body>
</html>