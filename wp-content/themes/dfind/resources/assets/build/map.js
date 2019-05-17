"use strict";

var map;

function initMap() {
    var myLatLng = { lat: 51.219606, lng: 6.750727 };

    map = new google.maps.Map(document.getElementById('dfind_map'), {
        center: myLatLng,
        zoom: 16,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.BOTTOM_LEFT
        },
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        }
    });

    var styledMapType = new google.maps.StyledMapType([{
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [{
            "color": "#444444"
        }]
    }, {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [{
            "color": "#5c82a1"
        }]
    }, {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "road",
        "elementType": "all",
        "stylers": [{
            color: '#517491'
        }, {
            "saturation": -100
        }, {
            "lightness": 45
        }]
    }, {
        featureType: 'road',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#222222' }]
    }, {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [{
            "visibility": "simplified"
        }]
    }, {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "water",
        "elementType": "all",
        "stylers": [{
            "color": "#293f4c"
        }, {
            "visibility": "on"
        }]
    }]);

    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: df_localize.marker
    });
}