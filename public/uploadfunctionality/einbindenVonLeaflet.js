//****various jshint configs****
// jshint esversion: 8
// jshint browser: true
// jshint node: true
// jshint -W117
// jshint -W083
"use strict";

const lat = 51.96897313542579;
const lon = 7.596425373765546;

const start_latlng = [lat, lon];

var map = L.map("mapdiv", {
    center: start_latlng,
    zoom: 17,
});

// Darstellen der Marker auf der Leaflet-Karte und ermoeglichen der Auswahl durch User
// Wenn die Koordinaten der Marker bekannt sind, dann muessen die Koordinaten nicht erst aus der Datenbank abgefragt werden --> Zeitersparnis!
var marker1 = L.marker([51.96897313542579, 7.596425373765546]).addTo(map)
    .bindPopup('Standort 1');
var marker2 = L.marker([51.96933035015426, 7.595885496155732]).addTo(map)
    .bindPopup('Standort 2');
var marker3 = L.marker([51.968100900156045, 7.595874767311157]).addTo(map)
    .bindPopup('Standort 3');
var marker4 = L.marker([51.96955508466853, 7.596958379699424]).addTo(map)
    .bindPopup('Standort 4');
var marker5 = L.marker([51.969121591901335, 7.5966947740650665]).addTo(map)
    .bindPopup('Standort 5');

// Koordinaten der Marker zwischenspeichern
var showCoordinates1 = marker1.getLatLng();
var showCoordinates2 = marker2.getLatLng();
var showCoordinates3 = marker3.getLatLng();
var showCoordinates4 = marker4.getLatLng();
var showCoordinates5 = marker5.getLatLng();

// Grundidee: Bei einem Klick auf einen Marker werden die Koordinaten "ausgelesen" und als Informtation mit an den Server gesendet (POST Asset)

// Koordinaten des ausgewaehlten Markers ermitteln
map.on("click", function(e){
      var showCoordinates = marker1.getLatLng();
      console.log(showCoordinates);
      document.getElementById("gibKoordinatenVomMarker").innerHTML = showCoordinates;
         });

var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 18,
  attribution: "Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors",
}).addTo(map);

var mapbox = L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={access_token}", {
  maxZoom: 18,
  attribution: "Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, " +
  "<a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, " +
  "Imagery © <a href=\https://www.mapbox.com/\">Mapbox</a>",
  id: "mapbox.streets",
  access_token: token.MAPBOX_TOKEN
}).addTo(map);

var opentopomap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});

var baseMaps = {
    "opentopomap" : opentopomap,
    "osm": osm,
    "mapbox": mapbox
};

L.control.layers(baseMaps).addTo(map);
