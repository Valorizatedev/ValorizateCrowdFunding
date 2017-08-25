$(document).ready(function(){
//alert(_root_+'admin/cliente/subir/'+idcliente.value);
	var button = $('#upload_button'), interval;
	new AjaxUpload('#upload_button', {
	
        action: _root_+'admin/cliente/subir/'+idcliente.value,
		onSubmit : function(file , ext){},
		onComplete: function(file, response){
			button.text('Subir Archivo');
			// enable upload button
			this.enable();			
			// Agrega archivo a la lista
			//$('#lista').appendTo('.files').text(file);
			location.reload();
		}	
	});
	
	
	

});
