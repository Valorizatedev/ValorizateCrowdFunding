
$(document).ready(function(){

	var projectroot_ ="admin/usuario/subir/";
	var outputroot_ = "public/img/usuario/perfil/";

        $.ajax({
            type: "POST",
            url: root_+"admin/usuario/random/",
            dataType: "json",
            data: {},
            success: function(res) {

                $("#Idproyecto").html("ID proyecto:&nbsp&nbsp");
                $("#idproject").html(res.data);
                
                // alert("El id del proyecto nuevo es: "+res.data);
                // var button = $('#imgperfil'), interval;



				var p=0;

				new AjaxUpload("#imgproyectos"+p, {
			        action:root_+projectroot_+$("#idproject").html(),
			        
					onSubmit : function(file , ext){},
					onComplete: function(file, response){
					// alert(p);

					var imgpro="";	

					for (; p < (p+1); p++) {
					// alert(g);

						p=(p+1);
						// alert(p);

						imgpro = imgpro+
						'<input type="" id="uimg'+p+'" value="" style="display:none"/>'+
						'<div class="infile" id="imgproyectos'+p+'" >'+
						'<input type="" id="imgproj'+p+'"  class="infile" style="opacity: 1;">'+
						'</div>';
				
						$('.imgsproyectos').append(imgpro);

						$("#uimg"+p).val(file);
						// $('#pdfpermi'+i).css({'background-image':'url('+root2_+"assets/imagenes/pdfbien.png)"});
						$('#imgproj'+p).css({'background':'url('+root_+outputroot_+$("#idproject").html()+'/'+file+')'});

					


					return false;
				}
						

					}		
				});

				


				new AjaxUpload('#imgcartografia', {
			        action:root_+projectroot_+$("#idproject").html(),
			        
					onSubmit : function(file , ext){},
					onComplete: function(file, response){
						
						$("#imgc").val(file);
						//console.log(root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file);
						$('#imgcarto').css({'background':'url('+root_+outputroot_+$("#idproject").html()+'/'+file+')'});
					}		
				});

				// new AjaxUpload('#imgingresos', {
			 //        action:root_+projectroot_+$("#idproject").html(),
			        
				// 	onSubmit : function(file , ext){},
				// 	onComplete: function(file, response){
						
				// 		$("#imgingre").val(file);
				// 		//console.log(root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file);
				// 		$('#imging').css({'background':'url('+root_+outputroot_+$("#idproject").html()+'/'+file+')'});
									
				// 	}		
				// });

				new AjaxUpload('#imgplusvalia', {
			        action:root_+projectroot_+$("#idproject").html(),
			        
					onSubmit : function(file , ext){},
					onComplete: function(file, response){
						
						$("#imgplus").val(file);
						//console.log(root_+'public/img/usuario/perfil/'+$("#iduser").val()+'/'+file);
						$('#imgplusv').css({'background':'url('+root_+outputroot_+$("#idproject").html()+'/'+file+')'});
									
					}		
				});


				var g=0;

				new AjaxUpload("#imgplanos"+g, {
			        action:root_+projectroot_+$("#idproject").html(),
			        
					onSubmit : function(file , ext){},
					onComplete: function(file, response){
					// alert(g);

					var imgp="";	

					for (; g < (g+1); g++) {
					// alert(g);

						g=(g+1);
						// alert(g);

						imgp = imgp+
						'<input type="" id="imgplan'+g+'" value="" style="display:none"/>'+
						'<div class="infile" id="imgplanos'+g+'" >'+
						'<input type="" id="imgplano'+g+'"  class="infile" style="opacity: 1;">'+
						'</div>';
				
						$('.imgsplanos').append(imgp);

						$("#imgplan"+g).val(file);
						// $('#pdfpermi'+i).css({'background-image':'url('+root2_+"assets/imagenes/pdfbien.png)"});
						$('#imgplano'+g).css({'background':'url('+root_+outputroot_+$("#idproject").html()+'/'+file+')'});

					


					return false;
				}
						

					}		
				});
			

				var i=0;

				new AjaxUpload("#pdfpermisos"+i, {
			        action:root_+projectroot_+$("#idproject").html(),
			        
					onSubmit : function(file , ext){},
					onComplete: function(file, response){
					// alert(i);

					var pdf="";	

					for (; i < (i+1); i++) {
					// alert(i);

						i=(i+1);
						// alert(i);

						pdf = pdf+
						'<input type="" id="pdfperm'+i+'" value="" style="display:none"/>'+
						'<div class="infile2" id="pdfpermisos'+i+'" >'+
						'<input type="" id="pdfpermi'+i+'"  class="infile2" style="opacity: 1;">'+
						'</div>';
				
						$('.imgspermisos').append(pdf);
						$("#pdfperm"+i).val(file);
						$('#pdfpermi'+i).css({'background-image':'url('+root2_+"assets/imagenes/pdfbien.png)"});

					


					return false;
				}
						

					}		
				});





            }
        });
  
});






