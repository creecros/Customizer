<?php global $customizer; ?>
<?php if ($customizer['loginCheck']): ?>
<?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) .  '" height="' . $customizer['logoSize'] . '">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
<?php endif ?>
<style>
body  {
    background: url("<?= $customizer['backURL'] ?>") no-repeat center center fixed;
    background-size:     cover;
    background-color: <?= $customizer['backColor'] ?>;
}
.mb-10 {
    margin-bottom: 10px !important;
}
.mb-15 {
    margin-bottom: 15px !important;
}

.form-login > a > img {
    display: block;
    margin: auto;
    padding-top: 10px
} /* This aligns the logo to the text.  Adds padding to top of logo. */

.form-login {
        background-color: <?= $customizer['loginpanel_color'] ?>;
        -webkit-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
        -moz-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
        box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
        padding: 10px;
        border: <?= $customizer['login_border'] ?>px solid <?= $customizer['login_border_color'] ?>;
            border-radius: 5px;
            max-width: max-content;
            text-align: center;
}
.login-btn {
    width: <?= $customizer['login_btn_width'] ?>px;
    -webkit-box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
    -moz-box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
    box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
    border: <?= $customizer['login_btn_border'] ?>px solid <?= $customizer['login_btn_border_color'] ?>;
    background: <?= $customizer['login_btn_color'] ?>;
    color: <?= $customizer['login_btn_font_color'] ?>;
    background-image: linear-gradient(-180deg, <?= $customizer['login_btn_color'] ?> 0%, <?= $customizer['login_btn_shade_color'] ?> 90%);
    border-radius: 5px;
    }
.login-btn:hover, .login-btn:focus {
    border-color: <?= $customizer['login_btn_border_color'] ?>;
    background: <?= $customizer['login_btn_font_color'] ?>;
    color: <?= $customizer['login_btn_color'] ?>;
}
/*------ MOVED FROM PLUGIN CSS FILE TO AVOID AFFECTING OTHER PARTS OF KANBOARD.  STYLES SET HERE APPLY ONLY TO THE LOGIN PAGE. ------*/
.form-actions {
    text-align: center;
    padding-top: unset;
    padding-bottom: 10px;
} /* This moves the login button to the centre of the box and removes the useless padding above the login button.  Adds padding to bottom of login button. */

label:nth-of-type(3n) {
    color: grey;
    text-align: center;
} /* This makes the 'remember me' smaller and centralised*/

.form-actions > .login-btn {
    font-variant-caps: all-small-caps;
    text-align: center;
    transition: cubic-bezier(0.1, 0.75, 0.57, 1) 0.4s;
    -webkit-transition: cubic-bezier(0.1, 0.75, 0.57, 1) 0.4s;
} /* This makes the title text of the login button all capitals.  Also adds smoothing when hover on the login button */

label:nth-of-type(1) {
    visibility: hidden;
} /* This hides (to maintain the gap) the text of the labels */

label:nth-of-type(2n) {
    visibility: hidden;
    margin-top: -5px;
} /* This hides (to maintain the gap) the text of the labels and also reduces the top margin */

input::-webkit-input-placeholder {
    color: #000;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
} /* This styles the placeholder to emphasise it.  Cross-browser compatibility */

input::-moz-placeholder {
    color: #000;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
} /* This styles the placeholder to emphasise it.  Cross-browser compatibility */

input:-ms-input-placeholder {
    color: #000;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
} /* This styles the placeholder to emphasise it.  Cross-browser compatibility */

input::placeholder {
    color: #000;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
} /* This styles the placeholder to emphasise it.  Cross-browser compatibility */

input[type="password"], input[type="text"]:not(.input-addon-field) {
    margin: auto;
    display: block;
    border-radius: 5px;
} /* This centralises the input fields and makes the borders consistent with the outer form */

.form-required { display: none;} /* This removes the standard required asterisk */

</style>
<?php
if (function_exists('session_exists')) {
if (session_exists('redirectAfterLogin') && ! filter_var(session_get('redirectAfterLogin'), FILTER_VALIDATE_URL)) {
            $redirect = session_get('redirectAfterLogin');
           if (strpos($redirect, 'Customizer') !== false) {
            session_remove('redirectAfterLogin');
           }
}
} else {
if (isset($this->task->sessionStorage->redirectAfterLogin) && ! empty($this->task->sessionStorage->redirectAfterLogin) && ! filter_var($this->task->sessionStorage->redirectAfterLogin, FILTER_VALIDATE_URL)) {
            $redirect = $this->task->sessionStorage->redirectAfterLogin;
       if (strpos($redirect, 'Customizer') !== false) {
            unset($this->task->sessionStorage->redirectAfterLogin);
       }
}
}
?>
