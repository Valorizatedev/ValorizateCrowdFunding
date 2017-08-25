
$(document).ready(function(){

    // var root_="http://www.valorizate.com.co/backend/";


                var ids=$("#identificador").html();
            	// alert(root_);
            	
       var button = $('#regPerfil2'), interval;
        new AjaxUpload('#regPerfil2', {
              action:root_+'admin/usuario/subir/'+ids,
              
          onSubmit : function(file , ext){
          },
          onComplete: function(file, response){
            // alert(ids);
            $("#uimg").val(file);
            // console.log(root_+'public/img/usuario/perfil/'+ids+'/'+file);
            $('#imgPerfil2').css({'background':'url('+root_+'public/img/usuario/perfil/'+ids+'/'+file+')'});
                   var fotico = $("#uimg").val();
                   sessionStorage.setItem("foto",fotico);

                 var timeoutId = setTimeout(function(){
            editado();

       }, 200); 
            
                  
          }
  
        });



});
