
// set height of map div same as form div
var firstColumnHeight = document.getElementById('firstColumn').clientHeight;
document.getElementById('mapid').setAttribute("style","height:" + firstColumnHeight + "px");

var mymap = L.map('mapid').setView([51.96828993098943, 7.596451674038503], 19);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(mymap);
var marker1 = L.marker([51.96784585567931, 7.596464252259507]).addTo(mymap);
var marker2 = L.marker([51.967875824358856, 7.596282949194921]).addTo(mymap);
var marker3 = L.marker([51.968185447063746, 7.596422955590237]).addTo(mymap);
var marker4 = L.marker([51.9686147392282, 7.596396925911135]).addTo(mymap);

function submitForm() {
    var name = $("#name").val();
    var desc = $("#desc").val();
    var file = document.getElementById('file').files[0];
    var marker = $('#markerDropdown').find(":selected").val();
    var assetData = {
        "name": name,
        "object": "",
        "type": "picture",
        "is_template": "1",
        "is_visible": "1",
        "file": file
    }

    if(name == "") {
        bulmaToast.toast({
            message: "Bitte Namen angeben! " + "<i class='fas fa-exclamation-triangle'></i>",
            type: "is-danger",
            dismissible: true,
            closeOnClick: true,
            animate: { in: "fadeInLeftBig", out: "fadeOutRightBig" },
            position: "top-center",
            duration: 5000
          });
        return;
    }

    if(desc == "") {
        bulmaToast.toast({
            message: "Bitte Beschreibung angeben! " + "<i class='fas fa-exclamation-triangle'></i>",
            type: "is-danger",
            dismissible: true,
            closeOnClick: true,
            animate: { in: "fadeInLeftBig", out: "fadeOutRightBig" },
            position: "top-center",
            duration: 5000
          });
        return;
    }

    if(file == null) {
        bulmaToast.toast({
            message: "Bitte Bild auswählen! " + "<i class='fas fa-exclamation-triangle'></i>",
            type: "is-danger",
            dismissible: true,
            closeOnClick: true,
            animate: { in: "fadeInLeftBig", out: "fadeOutRightBig" },
            position: "top-center",
            duration: 5000
          });
        return;
    }

    var asset_form_data = new FormData();

    for (var key in assetData) {
        asset_form_data.append(key, assetData[key]);
    }


    $.ajax({
        url: "/api/asset",
        type: "POST",
        data: asset_form_data,
        contentType: false,
        processData: false,
        success: (res) => {
            console.log("Asset: ");
            console.log(res);
            var assetID = res.id;
            var suggestionData = {
                "user_id": 1,
                "asset_id": assetID,
                "geojson": "geojson",
                "latitude": 0,
                "longitude": 0,
                "title": name,
                "description": desc,
                "marker_id": marker
            }
            var suggestion_form_data = new FormData();

            for (var key in suggestionData) {
                suggestion_form_data.append(key, suggestionData[key]);
            }

            $.ajax({
                url: "/api/suggestion",
                type: "POST",
                data: suggestion_form_data,
                contentType: false,
                processData: false,
                success: (res) => {
                    console.log("Suggestion: ");
                    console.log(res);
                    bulmaToast.toast({
                        message: "Vorschlag erfolgreich hochgeladen! " + "<i class='fas fa-check-circlet'></i>",
                        type: "is-success",
                        dismissible: true,
                        closeOnClick: true,
                        animate: { in: "fadeInLeftBig", out: "fadeOutRightBig" },
                        position: "top-center",
                        duration: 5000
                      });
                },
                error: (err) => {
                    console.log(err);
                    bulmaToast.toast({
                        message: "Bitte Angaben überprüfen! " + "<i class='fas fa-exclamation-triangle'></i>",
                        type: "is-danger",
                        dismissible: true,
                        closeOnClick: true,
                        animate: { in: "fadeInLeftBig", out: "fadeOutRightBig" },
                        position: "top-center",
                        duration: 5000
                      });
                }
            })
        },
        error: (err) => {
            console.log(err);
            bulmaToast.toast({
                message: "Bitte Angaben überprüfen! " + "<i class='fas fa-exclamation-triangle'></i>",
                type: "is-danger",
                dismissible: true,
                closeOnClick: true,
                animate: { in: "fadeInLeftBig", out: "fadeOutRightBig" },
                position: "top-center",
                duration: 5000
              });
        }
    });
}