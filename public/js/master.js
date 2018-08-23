// Show OR Hide Code Button
$(document).ready(function(){
    // Hide Flash message
    $("#successMessage").delay(2500).fadeOut(300);
    $("#errorMessage").delay(2500).fadeOut(300);
    $("#postMessage").delay(2500).fadeOut(300);

});

// Framework visible
function myFramework(){
  // Get the checkbox
  var checkBox = document.getElementById("yCheck");
  // Get the output text
  var fields = document.getElementById("framework-field");

  // if checked - display fields
  if (checkBox.checked == true){
      fields.style.display = "block";
  } else {
      fields.style.display = "none";
  }
}

// Menu Show hidden on auth link
$('html').click(function() {
    $('#dropdown-menu-auth').hide();
 })

 $('.navbar-menu').click(function(e){
     e.stopPropagation();
 });

$('#auth-name').click(function(e) {
 $('#dropdown-menu-auth').toggle();
});
// mobile navbar
// Menu Function
function openSlideMenu(){
    document.getElementById('side-menu').style.width = '250px';
}

function closeSlideMenu(){
    document.getElementById('side-menu').style.width = '0';
}

// Preloader
setTimeout(function() {
  $('#preload').fadeOut('slow');
}, 1500);
