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

</x-guest-layout>
