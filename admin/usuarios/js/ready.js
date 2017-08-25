
$(document).ready(function(){


        $.ajax({
            type: "POST",
            url: root_+"admin/usuario/random/",
            dataType: "json",
            data: {},
            success: function(res) {

                $("#iduser").val(res.data);
                // alert(res.data);

                var button = $('#imgperfil'), interval;

				new AjaxUpload('#imgperfil', {
			        action:root_+'admin/usuario/subir/'+$("#iduser").val(),
			        
					onSubmit : function(file , ext){},
					onComplete: function(file, response){
						
						$("#uimg").val(file);
						//console.log(root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file);
						$('.infile').css({'background':'url('+root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file+')'});
					}
	
				});
  	
            }
        });
  
});






