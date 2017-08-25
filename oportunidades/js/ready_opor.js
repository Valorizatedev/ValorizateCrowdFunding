
$(document).ready(function(){
// alert("Funciona");

    // var root_="http://www.valorizate.com.co/backend/";
    // alert(root_);
    
            $.ajax({
            type: "POST",
            url: root_+"admin/usuario/random/",
            dataType: "json",
            data: {},
            success: function(res) {

            	$("#identificador").val(res.data);
                var ids=$("#identificador").val();
            	// alert(ids);
            	// alert(root_);
            	
       var button = $('#regPerfil2'), interval;
        new AjaxUpload('#regPerfil2', {
              action:root_+'admin/usuario/subir/'+ids,
              
          onSubmit : function(file , ext){
             recargarFormulario();
          },
          onComplete: function(file, response){
            // alert(ids);
            $("#uimg2").val(file);
            console.log(root_+'public/img/usuario/perfil/'+ids+'/'+file);
            $('.infile').css({'background':'url('+root_+'public/img/usuario/perfil/'+ids+'/'+file+')'});
            
            
                  
          }
  
        });

             }
        });




});
