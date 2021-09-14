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

let map = L.map("map", {
  center: start_latlng,
  zoom: 17,
});

// Darstellen der Marker auf der Leaflet-Karte und ermoeglichen der Auswahl durch User
// Wenn die Koordinaten der Marker bekannt sind, dann muessen die Koordinaten nicht erst aus der Datenbank abgefragt werden --> Zeitersparnis!
let marker1 = L.marker([51.96898469480461, 7.596480628244305]).addTo(map)
.bindPopup('Marker 1');
let marker2 = L.marker([51.96903558719034, 7.596355131037076]).addTo(map)
.bindPopup('Marker 2');
let marker3 = L.marker([51.96928869301577, 7.596481577258518]).addTo(map)
.bindPopup('Marker 3');
let marker4 = L.marker([51.96967930453592, 7.596549508628987]).addTo(map)
.bindPopup('Marker 4');

// Koordinaten der Marker zwischenspeichern
let showCoordinates1 = marker1.getLatLng();
let showCoordinates2 = marker2.getLatLng();
let showCoordinates3 = marker3.getLatLng();
let showCoordinates4 = marker4.getLatLng();

let osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors",
}).addTo(map);

let mapbox = L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={access_token}", {
  maxZoom: 19,
  attribution: "Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, " +
  "<a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, " +
  "Imagery © <a href=\https://www.mapbox.com/\">Mapbox</a>",
  id: "mapbox.streets",
  access_token: token.MAPBOX_TOKEN
}).addTo(map);

let opentopomap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
  maxZoom: 17,
  attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});

let baseMaps = {
  "opentopomap" : opentopomap,
  "osm": osm,
  "mapbox": mapbox
};

L.control.layers(baseMaps).addTo(map);
