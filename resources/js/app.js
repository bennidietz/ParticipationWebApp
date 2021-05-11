require('./bootstrap');
require('alpinejs');

document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById('map') !== null) {
        initMap();
    }
});

function initMap()
{
    var mymap = L.map('map').setView([51.967149, 7.596715], 17);

    L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        //id: 'mapbox/streets-v11',
        //tileSize: 512,
        //zoomOffset: -1
        //accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
}
