//Functionality for a slider value feedback

var header_logo_output = $('header_logo_output')[0];

$(document).on('input', 'input[name="headerlogo_size"]', function(e) {
  header_logo_output.innerHTML = e.currentTarget.value;
});

var login_logo_output = $('login_logo_output')[0];

$(document).on('input', 'input[name="loginlogo_size"]', function(e) {
  login_logo_output.innerHTML = e.currentTarget.value;
});

//Accordion for settings page

var acc = document.getElementsByClassName("login-accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
