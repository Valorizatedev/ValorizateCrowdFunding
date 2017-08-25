	$(document).ready(function() {

				var MaxInputs       = 8; //maximum input boxes allowed
				var contenedor   	= $("#contenedor"); //Input boxes wrapper ID
				var AddButton       = $("#agregarCampo"); //Add button ID

				//var x = contenedor.length; //initlal text box count
				var x = $("#contenedor div").length + 1;
				var FieldCount = x-1; //to keep track of text box added

				$(AddButton).click(function (e)  //on add input button click
				{
						if(x <= MaxInputs) //max input box allowed
						{
							FieldCount++; //text box added increment
							//add input box
							$(contenedor).append('<div class="added">Nombre:<input type="text" name="mitexto[]" id="campo_"+ FieldCount +'" placeholder="Texto '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a>Descripción:<br/><textarea name="descripcion[]" id="descripcion_"id="descripcion_'+ FieldCount +'" > </textarea><a href="#" class="eliminar">&times;</a></div>');
							x++; //text box increment
						}
				return false;
				});

				$("body").on("click",".eliminar", function(e){ //user click on remove text
						if( x > 1 ) {
								$(this).parent('div').remove(); //remove text box
								x--; //decrement textbox
						}
				return false;
				});

			});
			