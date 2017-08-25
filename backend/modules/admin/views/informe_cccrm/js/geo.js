$(document).ready(function() {
    var locations = [];
    $.ajax({
        type: "POST",
        url: location.pathname,
        dataType: "json",
        data: {
            consultar: 1
        },
        success: function(data) {
            $.map(data, function(item) {
                var detalles = [];
                detalles.push("<b>" + item.vis_nombre + "</b><br/>" + item.vis_direccion + "<br/>" + item.vis_telefono);
                detalles.push(item.vis_latitud ? item.vis_latitud : "4.082222921682072");
                detalles.push(item.vis_longitud ? item.vis_longitud : "-76.19528306737061");
                locations.push(detalles);
            });
            var stockholm = new google.maps.LatLng(4.082222921682072, -76.19528306737061);
            //var parliament = new google.maps.LatLng(74.327383, -4.06747);
            var marker;
            var map;
            var markerClusterer;

            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: stockholm
            };

            map = new google.maps.Map(document.getElementById('geo'),
                    mapOptions);

            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            var markers = [];


            /*marker = new google.maps.Marker({
             map:map,
             draggable:true,
             animation: google.maps.Animation.DROP,
             position: new google.maps.LatLng(37.68087267112018, -4.852294349999966)
             });
             google.maps.event.addListener(marker, 'click', toggleBounce);*/
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                    //draggable: true
                });
                
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    };
                })(marker, i));
                /////////////////////////////////////////////
                google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.close(map, marker);
                    };
                })(marker, i));
                /////////////////////////////////////////////
                markers.push(marker);
            }
            markerClusterer = new MarkerClusterer(map, markers, {
                maxZoom: 10,
                gridSize: 30
                /*styles: 10*/
            });

            function toggleBounce() {

                if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
        }
    });

});
