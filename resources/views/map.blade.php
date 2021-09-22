<x-guest-layout>
<div id="sidebar">
    <b class="text-lg">Starthilfe</b>
    <button onclick="document.getElementById('description').style.display = (document.getElementById('description').style.display != 'block') ? 'block' : 'none';">
    <div class="flex items-center p-4 hover:bg-gray-300 border-solid border-4 border-light-gray-500 rounded-lg shadow-xs m-2">
            <div>
                <p class="font-semibold">
                    Wie benutze ich diese Seite?
                </p>

            </div>
        {{--            <div class="p-3 text-blue-500 bg-blue-100 rounded-full">--}}
        {{--                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">--}}
        {{--                    <path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>--}}
        {{--                </svg>--}}
        {{--            </div>--}}
    </div>
    </button>
    <div id="description" class="p-4 hidden">Das CorrensLab wurde in vier Straßenabschnitte aufgeteilt, welche in der Karte in unterschiedlichen Farben dargestellt sind. Um an einer Umfrage bezüglich des Straßenabschnittes teilzunehmen, klicke bitte auf den jeweiligen Straßenabschnitt und dann auf "An der Umfrage teilnehmen". Darüber hinaus befinden sich sogennante Marker auf dem Gebiet. Hier wurden Vorschläge für alternative Nutzungen der Fläche erstellt und diese können in einer Augmented Reality-Ansicht auf die echte Welt projeziert werden. Klicke hierzu auf <a class="text-blue-600 font-bold hover:underline" href="/ar">diesen Link</a> und scanne den jeweiligen Marker an der richtigen Stelle.</div>
    <b class="text-lg">Straßenabschnitte</b>
    @php
        $colors = [
            'green',
            'blue',
            'red',
            'yellow',
            'gray',
        ];
    @endphp
    @foreach (\App\Models\Polygon::all() as $polygon)
        <div id="card_polygon-{{ $polygon->id }}" class="flex items-center p-4 bg-{{ $colors[$loop->index] }}-500 hover:bg-{{ $colors[$loop->index] }}-600 rounded-lg shadow-xs m-2">
            <button>
                <div>
                    <p class="font-semibold text-white">
                        {{ $polygon->name }}
                    </p>

                </div>
            </button>
{{--            <div class="p-3 text-blue-500 bg-blue-100 rounded-full">--}}
{{--                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>--}}
{{--                </svg>--}}
{{--            </div>--}}
        </div>
    @endforeach
    @if (\App\Models\Suggestion::all()->count() > 0)
    <br><b class="text-lg">Marker</b>
    <div id="markers" class="flex border-solid border-4 border-light-gray-500 items-center p-4 bg-gray-100 rounded-lg shadow-xs m-2">
        <div>
            <p class="mb-2 text-sm font-medium">
                Alle Marker
            </p>
            <p class="text-lg font-semibold">
                {{ \App\Models\Marker::all()->count() }}
            </p>
        </div>
        {{--            <div class="p-3 text-blue-500 bg-blue-100 rounded-full">--}}
        {{--                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">--}}
        {{--                    <path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>--}}
        {{--                </svg>--}}
        {{--            </div>--}}
    </div>
    @endif
    <br><b><span class="text-lg">Augmented Reality Ansicht</span></b><br>
    <small class="text-base"><a class="text-blue-600 font-bold hover:underline" href="/ar">Hier</a> geht es zur <a class="hover:text-blue-600 font-bold hover:underline" href="/ar">Augmented Reality (AR) Ansicht</a> der Vorschläge.</small>
</div>
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
