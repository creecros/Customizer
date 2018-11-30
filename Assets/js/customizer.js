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
  document.getElementById('preview-form-login').style.backgroundColor = document.getElementById('loginpanel_color').value;
}

document.getElementById('loginbackground_color').oninput = function() {
  document.getElementById('preview').style.backgroundColor = document.getElementById('loginbackground_color').value;
}

document.getElementById('login_shadow_color').oninput = function() {
  var slider = document.getElementById("login_shadow").value;
  var color = document.getElementById('login_shadow_color').value;
  document.getElementById('preview-form-login').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
}

document.getElementById('login_border_color').oninput = function() {
  document.getElementById('preview-form-login').style.borderColor = document.getElementById('login_border_color').value;
}

document.getElementById('login_btn_color').oninput = function() {
  document.getElementById('preview-login-btn').style.backgroundColor = document.getElementById('login_btn_color').value;
}

document.getElementById('login_btn_shadow_color').oninput = function() {
  var slider = document.getElementById("login_btn_shadow").value;
  var color = document.getElementById('login_btn_shadow_color').value;
  document.getElementById('preview-login-btn').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
}

document.getElementById('login_btn_font_color').oninput = function() {
  document.getElementById('preview-login-btn').style.color = document.getElementById('login_btn_font_color').value;
}

document.getElementById('login_btn_shade_color').oninput = function() {
  var color = document.getElementById('login_btn_shade_color').value;
  document.getElementById('preview-login-btn').style.backgroundImage = 'linear-gradient(-180deg, transparent 0%, ' + color + ' 90%';
}

document.getElementById('login_btn_shadow').oninput = function() {
  var slider = document.getElementById("login_btn_shadow").value;
  var color = document.getElementById('login_btn_shadow_color').value;
  document.getElementById('preview-login-btn').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
}

document.getElementById('login_btn_border').oninput = function() {
  var slider = document.getElementById("login_btn_border").value;
  var color = document.getElementById('login_btn_border_color').value;
  document.getElementById('preview-login-btn').style.border = slider + 'px solid ' + color;
}

document.getElementById('login_border').oninput = function() {
  var slider = document.getElementById("login_border").value;
  var color = document.getElementById('login_border_color').value;
  document.getElementById('preview-form-login').style.border = slider + 'px solid ' + color;
}

document.getElementById('login_shadow').oninput = function() {
  var slider = document.getElementById("login_shadow").value;
  var color = document.getElementById('login_shadow_color').value;
  document.getElementById('preview-form-login').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
}

document.getElementById('login_btn_width').oninput = function() {
  var slider = document.getElementById("login_btn_width").value;
  document.getElementById('preview-login-btn').style.width = slider + 'px';
}

document.getElementById('preview-login-btn').onmouseover = function() {
  document.getElementById('preview-login-btn').style.color = document.getElementById('login_btn_color').value;
  document.getElementById('preview-login-btn').style.backgroundColor = document.getElementById('login_btn_font_color').value;
}

document.getElementById('preview-login-btn').onmouseout = function() {
  document.getElementById('preview-login-btn').style.backgroundColor = document.getElementById('login_btn_color').value;
  document.getElementById('preview-login-btn').style.color = document.getElementById('login_btn_font_color').value;
}

document.getElementById('form-background_url').oninput = function() {
  var val = document.getElementById("form-background_url").value;
  document.getElementById('preview').style.background = 'url("' + val +'") no-repeat center center';
  document.getElementById('preview').style.backgroundSize = 'cover';
}

function OnColorChanged(selectedColor, inputId) {
              if (inputId == "login_shadow_color") {
                var rgbaBox = document.getElementById("preview-form-login");
                rgbaBox.style.color = selectedColor;
              }
              if (inputId == "loginbackground_color") {
                var rgbaBox = document.getElementById("preview");
                rgbaBox.style.backgroundColor = selectedColor;
              }
              if (inputId == "loginpanel_color") {
                var rgbaBox = document.getElementById("preview-form-login");
                rgbaBox.style.backgroundColor = selectedColor;
              }
              if (inputId == "login_border_color") {
                var rgbaBox = document.getElementById("preview-form-login");
                rgbaBox.style.borderColor = selectedColor;
              }
              if (inputId == "login_btn_color") {
                var rgbaBox = document.getElementById("preview-login-btn");
                rgbaBox.style.backgroundColor = selectedColor;
              }
              if (inputId == "login_btn_shadow_color") {
                var rgbaBox = document.getElementById("preview-login-btn");
                var slider = document.getElementById("login_btn_shadow").value;
                rgbaBox.style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + selectedColor;
              }
              if (inputId == "login_btn_font_color") {
                var rgbaBox = document.getElementById("preview-login-btn");
                rgbaBox.style.color = selectedColor;
              }
              if (inputId == "login_btn_shade_color") {
                var rgbaBox = document.getElementById("preview-login-btn");
                rgbaBox.style.backgroundImage = 'linear-gradient(-180deg, transparent 0%, ' + selectedColor + ' 90%';
              }
}

