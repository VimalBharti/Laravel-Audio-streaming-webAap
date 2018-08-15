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

// Preloader
setTimeout(function() {
  $('#preload').fadeOut('slow');
}, 1100);


(function() {
  var burger = document.querySelector('.burger');
  var nav = document.querySelector('#'+burger.dataset.target);

  burger.addEventListener('click', function(){
    burger.classList.toggle('is-active');
    nav.classList.toggle('is-active');
  });
})();
