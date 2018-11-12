//Functionality for a slider value feedback

var header_logo_output = $('header_logo_output')[0];

$(document).on('input', 'input[type="range"]', function(e) {
  header_logo_output.innerHTML = e.currentTarget.value;
});

var login_logo_output = $('login_logo_output')[0];

$(document).on('input', 'input[type="range"]', function(e) {
  login_logo_output.innerHTML = e.currentTarget.value;
});
