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
  var MARKERS = {};
  //var markers = L.layerGroup([]);

  var mymap = L.map('map', {
      attributionControl: false,
      center: [51.968159, 7.596715],
      zoom: 17
      //layers: [markers]
  });

    var greenIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

  // L.control.zoom({
  //     position: 'botttomright'
  // }).addTo(mymap);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 22,
    //id: 'mapbox/streets-v11',
    //tileSize: 512,
    //zoomOffset: -1
    //accessToken: 'your.mapbox.access.token'
  }).addTo(mymap);

    const polygonColors = [
        'rgb(16, 185, 129)',
        'rgb(59, 130, 246)',
        'rgb(239, 68, 68)',
        'rgb(245, 158, 11)',
        'rgb(107, 114, 128)',
    ];

    var polygonIndex = 0;

    fetch('api/polygon')
        .then(response => response.json())
        .then(data => addPolygon(data));

    fetch('api/marker')
        .then(response => response.json())
        .then(data => addMarker(data));


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
        for (index in data.data) {
            polygon = data.data[index];
            var polystyle = {
                fillColor: polygonColors[polygonIndex],
                weight: 2,
                opacity: 1,
                color: polygonColors[polygonIndex++],
                fillOpacity: 0.7
            };
            var geojsonShape = L.geoJson(JSON.parse(polygon.geojson), {style: polystyle}).addTo(mymap);
            geojsonShape.bindPopup("<div class=\"flex items-center p-4 rounded-lg shadow-xs m-2\">\n" +
                "            <div>\n" +
                "                <p class=\"text-lg font-semibold\">\n" +
                polygon.name +
                "<p className='mb-2 font-medium text-sm'>" + polygon.description + "</p>" +
                "                <p class=\"mb-2 font-bold text-lg text-blue-900\">\n" +
                "<a><button type=\'button\' onclick=\'" +
                "showPopup(" + polygon.id + ")\'>An der Umfrage teilnehmen</button></a>" , 1);
            POLYGONS[polygon.id] = geojsonShape
            document.getElementById('card_polygon-' + polygon.id).onclick = function(view) {
                id = this.id.substr(this.id.lastIndexOf("-") + 1);
                // console.log(id);
                POLYGONS[id].openPopup();
            };
        }
    }
    function getCoordinates(marker) {
        if (marker.name == 'Marker 1') {
            return [51.96784585567931, 7.596464252259507];
        } else if (marker.name == 'Marker 2') {
            return [51.967875824358856, 7.596282949194921];
        } else if (marker.name == 'Marker 3') {
            return [51.968185447063746, 7.596422955590237];
        } else if (marker.name == 'Marker 4') {
            return [51.9686147392282, 7.596396925911135];
        } else {
            return [51.96, 7.59];
        }
    }

    function addMarker(data) {
        for (index in data.data) {
            suggestion = data.data[index];
            // console.log(suggestion);
            var marker = L.marker(getCoordinates(suggestion), {icon: greenIcon}).addTo(mymap);
            marker.bindPopup("<div class=\"flex items-center p-4 rounded-lg shadow-xs m-2\">\n" +
                "            <div>\n" +
                "                <p class=\"text-lg font-semibold\">\n" +
                suggestion.name +
                "                </p>\n<br>\<a class='font-black' href='https://correnslab.de/ar'><img src='https://chart.apis.google.com/chart?chs=500x500&cht=qr&chld=L&chl=https://correnslab.de/ar'/><br>oder: <span class='text-lg hover:underline hover:font-bold hover:text-blue'>Hier klicken</span></a>" +
                "            </div>\n" +
                "            </div>", 1);
            MARKERS[marker.id] = marker
            document.getElementById('card_polygon-' + polygon.id).onclick = function(view) {
                id = this.id.substr(this.id.lastIndexOf("-") + 1);
                // console.log(id);
                POLYGONS[id].openPopup();
            };
        }
    }

    window.showPopup = function (id) {
        if (id == 1) {
            frameUrl = "https://docs.google.com/forms/d/e/1FAIpQLSdl1ls7uR0sL48kD7IUZAFDZzpiGH3fZH4nmpaibRwWsxtMTw/viewform?embedded=true";
        } else if (id == 2) {
            frameUrl = "https://docs.google.com/forms/d/e/1FAIpQLSea687T4qPTrxm3UKzoK9kgoG3rxWzWtJg7EJ7HFl7or3Z1NA/viewform?embedded=true";
        } else if (id == 3) {
            frameUrl = "https://docs.google.com/forms/d/e/1FAIpQLSf7jKzhVfLcDF9mvSuo-XwpmoFBa-RgvNSln0f1RzVdW6QwyA/viewform?embedded=true";
        } else if (id == 4) {
            frameUrl = "https://docs.google.com/forms/d/e/1FAIpQLSc0T53UxzTUXEzNimVU0Nm2LvJ_4zkmzj1VC5ac_eJPIyTFYg/viewform?embedded=true";
        } else if (id == 5) {
            frameUrl = "https://docs.google.com/forms/d/e/1FAIpQLSdWIGMITjeRXOpFyCgtrDBzbhvtpY90Vblbue_ygFdNZ0BYMg/viewform?embedded=true";
        }
        document.getElementById('popup-content').innerHTML = '<iframe src="' + frameUrl + '" width="700" height="520" frameborder="0" marginheight="0" marginwidth="0">Wird geladen…</iframe>';
        document.getElementById('popup').style.display = 'flex';
    }

    /*function preview(string) {
        modal.style.display = "block";
        document.getElementById("paragraph").innerHTML = string;
    }*/

    // When the user clicks on <span> (x), close the modal
    /*span.onclick = function() {
      modal.style.display = "none";
    }*/

    // When the user clicks anywhere outside of the modal, close it
    /*window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }*/

    /*var json = {
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

      survey.render("surveyElement");*/
}
