$(document).ready(function() {
    $("#buscar").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/nivel/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            value: item.niv_nombre,
                            label: item.niv_nombre,
                            key: item.niv_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            ui.item.label ?
                    window.location = _root_ + "admin/nivel/detalles/" + ui.item.key : ""
                    ;
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
    });

});


function datos(x,y,a,b)
{

	$("#key").val(x);
	$("#nombreedit").val(y);
	$("#niveledit").val(a);
	$("#descripcionedit").val(b);
	
}
