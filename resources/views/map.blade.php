<x-guest-layout>
<div id="map"></div>
<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id="paragraph">Some text in the Modal..</p><br><br>
    <div id="surveyElement"></div>
    <div id="result"></div>
  </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
<script src="https://unpkg.com/survey-knockout@1.8.48/survey.ko.js"></script>
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block"; 
}

function preview(string) {
    modal.style.display = "block"; 
    document.getElementById("paragraph").innerHTML = string
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var json = {
    title: "Umfrage zur Gestaltung des Quartiers", showProgressBar: "top", pages: [
      {
        questions: [
 
          {
            type: "comment", name: "suggestions", title: "Welche Elemente fallen Ihnen ein, wenn Sie an die Corrensstraße und ihre Umgebung denken?"
           
          },
          
          {
            type: "comment", name: "suggestions", title: "Was gefällt Ihnen an der Corrensstraße?",
           
          },
          { type: "comment", name: "suggestions", title: "Wie oft im Monat halten Sie sich an der Corrensstraße auf?",}
        ]
      },
      {
        questions: [
          {
            type: "matrix", name: "Entwicklung", title: "Welche verkehrsmittel nutzen sie wenn Sie auf der Corrensstraße unterwegs sind?",
            columns: [{ value: 1, text: "Nie" },
            { value: 2, text: "Selten" },
            { value: 3, text: "Neutral" },
            { value: 4, text: "Oft" },
            { value: 5, text: "Immer" }],
            rows: [{ value: "Bus", text: "Bus" },
            { value: "Auto", text: "Auto" },
            { value: "Fahrrad", text: "Fahrrad" }, { value: "Zu Fuß", text: "Zu Fuß" },]
          },
          {
            type: "matrix", name: "Entwicklung", title: "Bitte kreuzen Sie an welchen Elementen im Raum Sie sich orientieren",
            columns: [{ value: 1, text: "Nie" },
            { value: 2, text: "Selten" },
            { value: 3, text: "Neutral" },
            { value: 4, text: "Oft" },
            { value: 5, text: "Immer" }],
            rows: [{ value: "Straßenname", text: "Straßennamen" },
            { value: "Art der Straße ", text: "Art oder Begebenheit der Straße" },
            { value: "Orientierungspunkte", text: "Orientierungspunkte (Gebäuden, Kreuzungen...)" },
            { value: "Gefühl", text: "Nach Gefühl" }, { value: "Lärm", text: "Nach zu erwartendem Verkehrslärm" }, { value: "Anzahl", text: "Nach Anzahl von Menschen" }]
          },
          {
            type: "matrix", name: "Elemente", title: "Welche Elemente wünschen Sie sich auf der Corrensstraße? ",
            columns: [{ value: 1, text: "gar nicht " },
            { value: 2, text: " eher nicht" },
            { value: 3, text: "Egal" },
            { value: 4, text: " eher " },
            { value: 5, text: " voll " }],
            rows: [{ value: "Verkehr", text: "Elemente zur Verkehrsberuhigung" },
            { value: "Rad ", text: "Breite Rad und Fußwege" },
            { value: "Raum", text: "Raum zur Begegnug" },
            { value: "Fläche", text: "Fläche zur Entspannung" }, { value: "Sport", text: "Flächen um Sport zu betreiben" }, { value: "Spielplätze", text: "Spielplätze" },]
          }
        ]
      },
      {
        questions: [

           {
            type: "matrix", name: "Gebiet", title: "In welche Richtung sollte sich das Gebiet entwickeln?",
            columns: [{ value: 1, text: "gar nicht" },
            { value: 2, text: " eher nicht" },
            { value: 3, text: "Egal" },
            { value: 4, text: " eher " },
            { value: 5, text: " voll " }],
            rows: [{ value: "Wohngebiet", text: "Wohngebiet" },
            { value: "Grünfläche ", text: "Grünfläche" },
            { value: "Bürofläche", text: "Büro oder Arbeitsviertel" },
            { value: "Einkauf", text: "Einkaufs und Unterhaltungsviertel" }, ]
          },

          { type: "comment", name: "suggestions", title: "Wie alt sind Sie?", },
          { type: "comment", name: "suggestions", title: "Welchem Geschlecht ordnen Sie sich zu?", },
          { type: "comment", name: "suggestions", title: "Wie lange leben Sie in Münster? Wenn Sie nicht in Münster leben geben Sie bite an, wie lange Sie schon nach Münster kommen.", },
          { type: "comment", name: "suggestions", title: "In welchem Viertel von Münster leben Sie?Wenn Sie nicht in Münster leben geben Sie bite Ihren Wohnort an.", },
          { type: "comment", name: "suggestions", title: "welcher Tätigkeit gehen sie in Münster nach?", },
          { type: "comment", name: "suggestions", title: "Welcher Einkommensgruppe würden Sie sich zuordnen?", },
          {
            type: "text", name: "email",
            title: "Danke, dass Sie an der Umfrage teigenommen haben. wenn Sie über weitere Ergebnisse der Umfrage informiert werden wollen, geben Sie bitte im unetren Feld Ihre Mailaddresse an. Clicken Sie auf submit, wenn Sie die Umfrage abgeben wollen."
          }
        ]
      }
    ]
  };

  Survey.defaultBootstrapCss.navigationButton = "btn btn-green";
  Survey.defaultBootstrapCss.progressBar = "bar-green";
  Survey.Survey.cssType = "bootstrap";

  var survey = new Survey.Model(json);

  survey.onComplete.add(function (result) {
    document.querySelector('#result').innerHTML = "result: " + JSON.stringify(result.data);
  });

  survey.render("surveyElement");
</script>

</x-guest-layout>
