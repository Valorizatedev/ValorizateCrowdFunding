<?php /* Smarty version Smarty-3.1.13, created on 2017-05-20 20:20:11
         compiled from "/home/valorizate/ds.valorizate.com.co/backend/views/layout/blank/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11790117795920eb4b2a2833-65537036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8cecfd0aa6315729106b8938f51cc848fcd4f6e' => 
    array (
      0 => '/home/valorizate/ds.valorizate.com.co/backend/views/layout/blank/template.tpl',
      1 => 1493928285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11790117795920eb4b2a2833-65537036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_error' => 0,
    '_tipo_error' => 0,
    '_contenido' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5920eb4b2bf197_22876844',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5920eb4b2bf197_22876844')) {function content_5920eb4b2bf197_22876844($_smarty_tpl) {?>
			<input id="_error" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_error']->value)===null||$tmp==='' ? '' : $tmp);?>
" type="hidden"/>
			<input id="_tipo_error" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_tipo_error']->value)===null||$tmp==='' ? '' : $tmp);?>
" type="hidden"/>

                        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


          <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta'];?>
assets/js/toastr.js" id="script-resource-15"></script>


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
			<?php }} ?>