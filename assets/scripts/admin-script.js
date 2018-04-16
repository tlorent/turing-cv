$(document).ready(function(){

  // Adding multiple hobby input fields
  $deletehobby = $("#delete-hobby-input-field");

  $deletehobby.hide();

  var counter = 0;

  $("#add-hobby-input-field").on('click', function() {

    counter += 1;

    $addHobby = $('#add-extra-hobby-' + counter);

    $deletehobby.show();

    $addHobby.addClass("animated fadeIn extra-input-visible");
    $addHobby.attr("name", "hobby_add[]");

  });

  // CHANGE THIS CODE/LOGIC!!!
  $deletehobby.on('click', function(){

    if($("#add-extra-hobby-2").hasClass("extra-input-visible")) {
      $("#add-extra-hobby-2").removeClass("extra-input-visible");
    } else {
      $("#add-extra-hobby-1").removeClass("extra-input-visible");
    }

    addedHobbyInputs = 0;

  });

});
