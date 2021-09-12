//****various jshint configs****
// jshint esversion: 8
// jshint browser: true
// jshint node: true
// jshint -W117
// jshint -W083
"use strict";

// Abfrage der Marker aus der Datenbank
// console.log("Abfrage der Marker starten");
// let request = new XMLHttpRequest();
// request.onload = function() {
  //const myObj2 = JSON.parse(this.responseText);
  //document.getElementById("demo").innerHTML = myObj2.name;
// };
// request.open("Get", "http://giv-project10.uni-muenster.de/api/marker", false);
// request.send();
//console.log("Get request wurde versendet.");

// Umwandlung der JSON-Zeichenkette in ein Java-Script-Objekt
//let objectParsed = JSON.parse(
//  string,                       // JSON
//  (key, value) => {             // Ersetzungsfunktion
//    return value;               // Rückgabewert bestimmt Zielwert
//  }
//);

// const myJSON = '{"name":"John", "age":31, "city":"New York"}';
// const myObj = JSON.parse(myJSON);
// document.getElementById("listeMarkerAuf").innerHTML = myObj.name;

// Senden eines Assets an den Server
function sendAsset(){
  const goAsset = new XMLHttpRequest();
    goAsset.onload = function() {
      document.getElementById("name").innerHTML = this.responseText;
    };
    goAsset.open("POST", "http://giv-project10.uni-muenster.de/api/asset");
    goAsset.send();
  }
