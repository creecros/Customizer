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

var av_icon_output = $('av_icon_output')[0];

$(document).on('input', 'input[name="av_size"]', function(e) {
  var siz = e.currentTarget.value;
  av_icon_output.innerHTML = siz;
  if (document.querySelector(".avatar-preview .avatar-letter") !== null) {
  document.querySelector(".avatar-preview .avatar-letter").style.lineHeight = siz + "px";
  document.querySelector(".avatar-preview .avatar-letter").style.width = siz + "px";
  document.querySelector(".avatar-preview .avatar-letter").style.fontSize = (siz / 2) + "px";
  } else {
  var link = document.querySelector(".avatar-preview img").src;
  var oldhash = link.substring(
    link.indexOf("hash=") + 5, 
    link.lastIndexOf("&size=")
    );
  var path = document.getElementById("av_path").value;
  var newhash = md5(path + siz);
  var changedLink = link.substring(0, link.length-2);
  newchangedlink = changedLink.replace(oldhash, newhash);
  document.querySelector(".avatar-preview img").src = newchangedlink + siz;
  }
});

var av_radius_output = $('av_radius_output')[0];

$(document).on('input', 'input[name="av_radius"]', function(e) {
  var rad = e.currentTarget.value;
  av_radius_output.innerHTML = rad;
  if (document.querySelector(".avatar-preview .avatar-letter") !== null) {
  document.querySelector(".avatar-preview .avatar-letter").style.borderRadius = rad + "%";
  } else {
  document.querySelector(".avatar-preview img").style.borderRadius = rad + "%";
  }
});

var b_av_icon_output = $('b_av_icon_output')[0];

$(document).on('input', 'input[name="b_av_size"]', function(e) {
  var siz = e.currentTarget.value;
  b_av_icon_output.innerHTML = siz;
  if (document.querySelector(".b-avatar-preview .avatar-letter") !== null) {
  document.querySelector(".b-avatar-preview .avatar-letter").style.lineHeight = siz + "px";
  document.querySelector(".b-avatar-preview .avatar-letter").style.width = siz + "px";
  document.querySelector(".b-avatar-preview .avatar-letter").style.fontSize = (siz / 2) + "px";
  } else {
  var link = document.querySelector(".b-avatar-preview img").src;
  var oldhash = link.substring(
    link.indexOf("hash=") + 5, 
    link.lastIndexOf("&size=")
    );
  var path = document.getElementById("av_path").value;
  var newhash = md5(path + siz);
  var changedLink = link.substring(0, link.length-2);
  newchangedlink = changedLink.replace(oldhash, newhash);
  document.querySelector(".b-avatar-preview img").src = newchangedlink + siz;
  }
});

var b_av_radius_output = $('b_av_radius_output')[0];

$(document).on('input', 'input[name="b_av_radius"]', function(e) {
  var rad = e.currentTarget.value;
  b_av_radius_output.innerHTML = rad;
  if (document.querySelector(".b-avatar-preview .avatar-letter") !== null) {
  document.querySelector(".b-avatar-preview .avatar-letter").style.borderRadius = rad + "%";
  } else {
  document.querySelector(".b-avatar-preview img").style.borderRadius = rad + "%";
  }
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

// auto submit on change for user theme
if (document.getElementById('userthemeSelection')) {
    document.getElementById('userthemeSelection').onchange = function() {
        document.getElementById('ts').submit();
    }
}

//Live Preview

if (document.getElementById('loginpanel_color')) {

if (document.getElementById('form-login_note').value === '') { document.getElementById('preview-form-note').style.display = "none"; } else { document.getElementById('preview-form-note').style.display = "block"; }

  document.getElementById('loginpanel_color').oninput = function() {
    document.getElementById('preview-form-login').style.backgroundColor = document.getElementById('loginpanel_color').value;
    document.getElementById('preview-form-note').style.backgroundColor = document.getElementById('loginpanel_color').value;
  }

  document.getElementById('loginbackground_color').oninput = function() {
    document.getElementById('preview').style.backgroundColor = document.getElementById('loginbackground_color').value;
  }
  
  document.getElementById('form-login_note').oninput = function() {
    document.getElementById('preview-form-note').innerHTML = document.getElementById('form-login_note').value;
    if (document.getElementById('form-login_note').value === '') { document.getElementById('preview-form-note').style.display = "none"; } else { document.getElementById('preview-form-note').style.display = "block"; }
  }

  document.getElementById('login_shadow_color').oninput = function() {
    var slider = document.getElementById("login_shadow").value;
    var color = document.getElementById('login_shadow_color').value;
    document.getElementById('preview-form-login').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
    document.getElementById('preview-form-note').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
  }
  
  document.getElementById('login_border_color').oninput = function() {
    document.getElementById('preview-form-login').style.borderColor = document.getElementById('login_border_color').value;
    document.getElementById('preview-form-note').style.borderColor = document.getElementById('login_border_color').value;
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
    document.getElementById('preview-form-note').style.border = slider + 'px solid ' + color;
  }

  document.getElementById('login_shadow').oninput = function() {
    var slider = document.getElementById("login_shadow").value;
    var color = document.getElementById('login_shadow_color').value;
    document.getElementById('preview-form-login').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
    document.getElementById('preview-form-note').style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + color;
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
}

function OnColorChanged(selectedColor, inputId) {
              if (inputId == "login_shadow_color") {
                var slider = document.getElementById("login_shadow").value;
                document.getElementById("preview-form-login").style.color = selectedColor;
                document.getElementById("preview-form-note").style.boxShadow = '0px 0px ' + slider + 'px ' + slider * 0.1 + 'px ' + selectedColor;
              }
              if (inputId == "loginbackground_color") {
                var rgbaBox = document.getElementById("preview");
                rgbaBox.style.backgroundColor = selectedColor;
              }
              if (inputId == "loginpanel_color") {
                document.getElementById("preview-form-login").style.backgroundColor = selectedColor;
                document.getElementById("preview-form-note").style.backgroundColor = selectedColor;
              }
              if (inputId == "login_border_color") {
                document.getElementById("preview-form-login").style.borderColor = selectedColor;
                document.getElementById("preview-form-note").style.borderColor = selectedColor;
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

