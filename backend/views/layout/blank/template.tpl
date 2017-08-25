
			<input id="_error" value="{$_error|default:''}" type="hidden"/>
			<input id="_tipo_error" value="{$_tipo_error|default:''}" type="hidden"/>

                        {include file=$_contenido}

          <script src="{$_layoutParams.ruta}assets/js/toastr.js" id="script-resource-15"></script>


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
			