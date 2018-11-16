//Functionality for a slider value feedback

var header_logo_output = $('header_logo_output')[0];

$(document).on('input', 'input[name="headerlogo_size"]', function(e) {
  header_logo_output.innerHTML = e.currentTarget.value;
  document.getElementById("hl1").style.height = e.currentTarget.value + "px";
});

var login_logo_output = $('login_logo_output')[0];

$(document).on('input', 'input[name="loginlogo_size"]', function(e) {
  login_logo_output.innerHTML = e.currentTarget.value;
  document.getElementById("ll1").style.height = e.currentTarget.value + "px";
});

//Accordion for settings page

document.addEventListener("DOMContentLoaded", function(event) { 


    var acc = document.getElementsByClassName("login-accordion");
    var panel = document.getElementsByClassName('login-accordian-panel');
    
    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            var setClasses = !this.classList.contains('current');
            setClass(acc, 'current', 'remove');
            setClass(panel, 'show', 'remove');
    
            if (setClasses) {
                this.classList.toggle("current");
                this.nextElementSibling.classList.toggle("show");
            }
        }
    }
    
    function setClass(els, className, fnName) {
        for (var i = 0; i < els.length; i++) {
            els[i].classList[fnName](className);
        }
    }
});

// Valid for the form id="settings" checkboxes, when the "change" event occurs, the module is sent.

$(document).ready(function(){
    $("#settings").on("change", "input:checkbox", function(){
        $("#settings").submit();
    });
});

//Live Preview

document.getElementById('loginpanel_color').oninput = function() {
  document.getElementById('preview-form-login').style.backgroundColor = document.getElementById('loginpanel_color').value
}
