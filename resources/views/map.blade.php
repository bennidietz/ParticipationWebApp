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
</script>

</x-guest-layout>
