// Navbar Dropdown
$( document ).ready(function() {
    $(".dropdown-trigger").dropdown();

});

//Alert Close
$('#alert_close').click(function(){
    $( "#alert_box" ).fadeOut( "slow", function() {
    });
  });