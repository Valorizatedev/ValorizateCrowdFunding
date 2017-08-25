function datos(x,y,z)
{
	$("#key").val(x);
	$("#nombreedit").val(y);
	$("#clienteedit").val(z);
	
}


$(document).ready(function() {

$( "#usuario" ).change(function() {

	$("#usu_key").val(($( "#usuario" ).val()));  
//	$("#asignar").css("display", "block");
  
});



});
	
