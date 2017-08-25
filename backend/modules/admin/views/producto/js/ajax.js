$(document).ready(function() {

    $("#buscar").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/producto/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            value: item.pro_nombre,
                            label: item.pro_nombre,
                            key: item.pro_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            ui.item.label ?
                    window.location = _root_ + "admin/producto/detalles/" + ui.item.key : ""
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