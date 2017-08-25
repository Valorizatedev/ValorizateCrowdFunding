$(document).ready(function() {

    $("#buscar").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/ciudad/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            value: item.ciu_nombre,
                            label: item.ciu_nombre,
                            key: item.ciu_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            window.location = _root_ + "admin/ciudad/detalles/" + ui.item.key;
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
    });


});

function datos(w,x,y,z)
{
	$("#key").val(w);
	$("#codigo").val(x);
	$("#nombre").val(y);
	//alert(z);
	$("#departamento option[value="+z+"]").attr("selected",true);  
	//$("select#departamento").prop('selectedIndex', z);  
	
}