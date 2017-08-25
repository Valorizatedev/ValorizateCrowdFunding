
jQuery(document).ready(function($) 
{	
	var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-right",
			"onclick": null,
			"showDuration": "1000",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
	if (_tipo_error.value == 1){
		toastr.error(_error.value, "Error", opts);//alerta de error
	}
	if (_tipo_error.value == 2){
		toastr.warning(_error.value, null, opts);//alerta de danger
	}
	if (_tipo_error.value == 3){
		toastr.success(_error.value, "Proceso exitoso", opts);//alert teminado
	}
	if (_tipo_error.value == 4){
		toastr.info(_error.value);//alert info
	}
	});