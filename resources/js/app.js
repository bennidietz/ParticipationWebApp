require('./bootstrap');
require('alpinejs');

window.AOS = require('AOS');

AOS.init({
  offset: 0,
  duration: 600,
  easing: 'ease-in-sine',
  once: true,
});

document.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById('map') !== null) {
    initMap();
  }
});

function initMap() {
  var POLYGONS = {};

  var mymap = L.map('map', {attributionControl: false}).setView([51.967149, 7.596715], 17);

  // L.control.zoom({
  //     position: 'botttomright'
  // }).addTo(mymap);

  L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png?api_key=3fe5a8c3-600e-49fa-9cb5-3f95270fb8ef', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    //id: 'mapbox/streets-v11',
    //tileSize: 512,
    //zoomOffset: -1
    //accessToken: 'your.mapbox.access.token'
  }).addTo(mymap);

    fetch('api/polygon')
        .then(response => response.json())
        .then(data => addPolygon(data));


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

    function addPolygon(data) {
        console.log(data)
        for (index in data.data) {
            polygon = data.data[index];
            console.log(polygon)
            var geojsonShape = L.geoJson(JSON.parse(polygon.geojson)).addTo(mymap);
            geojsonShape.bindPopup("<h1>" + polygon.name + "</h1><a><button type=\'button\' onclick=\'preview(\"Umfrage für Polygon \" + polygon.name + \":\")\'>An der Umfrage teilnehmen</button></a>", 1);
            POLYGONS[polygon.id] = geojsonShape
            document.getElementById('card_polygon-' + polygon.id).onclick = function(view) {
                id = this.id.substr(this.id.lastIndexOf("-") + 1);
                console.log(id)
                POLYGONS[id].openPopup();
            };
        }
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
        title: "Product Feedback Survey Example", showProgressBar: "top", pages: [
          {
            questions: [
              {
                type: "matrix", name: "Quality", title: "Please indicate if you agree or disagree with the following statements",
                columns: [{ value: 1, text: "Strongly Disagree" },
                { value: 2, text: "Disagree" },
                { value: 3, text: "Neutral" },
                { value: 4, text: "Agree" },
                { value: 5, text: "Strongly Agree" }],
                rows: [{ value: "affordable", text: "Product is affordable" },
                { value: "does what it claims", text: "Product does what it claims" },
                { value: "better then others", text: "Product is better than other products on the market" },
                { value: "easy to use", text: "Product is easy to use" }]
              },
              {
                type: "rating", name: "satisfaction", title: "How satisfied are you with the Product?",
                mininumRateDescription: "Not Satisfied", maximumRateDescription: "Completely satisfied"
              },
              {
                type: "rating", name: "recommend friends", visibleIf: "{satisfaction} > 3",
                title: "How likely are you to recommend the Product to a friend or co-worker?",
                mininumRateDescription: "Will not recommend", maximumRateDescription: "I will recommend"
              },
              { type: "comment", name: "suggestions", title: "What would make you more satisfied with the Product?", }
            ]
          },
          {
            questions: [
              {
                type: "radiogroup", name: "price to competitors",
                title: "Compared to our competitors, do you feel the Product is",
                choices: ["Less expensive", "Priced about the same", "More expensive", "Not sure"]
              },
              {
                type: "radiogroup", name: "price", title: "Do you feel our current price is merited by our product?",
                choices: ["correct|Yes, the price is about right",
                  "low|No, the price is too low for your product",
                  "high|No, the price is too high for your product"]
              },
              {
                type: "multipletext", name: "pricelimit", title: "What is the... ",
                items: [{ name: "mostamount", title: "Most amount you would every pay for a product like ours" },
                { name: "leastamount", title: "The least amount you would feel comfortable paying" }]
              }
            ]
          },
          {
            questions: [
              {
                type: "text", name: "email",
                title: "Thank you for taking our survey. Your survey is almost complete, please enter your email address in the box below if you wish to participate in our drawing, then press the 'Submit' button."
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
}
