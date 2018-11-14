<?php global $customizer; ?>
<style>
.preview-form-login > a > img {
	display: block;
	margin: auto;
	padding-top: 10px
} /* This aligns the logo to the text.  Adds padding to top of logo. */
	
.preview-form-login {
		background-color: <?= $customizer['loginpanel_color'] ?>;
		-webkit-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
		-moz-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
		box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px <?= $customizer['login_shadow_color'] ?>;
		padding: 10px;
		border: <?= $customizer['login_border'] ?>px solid <?= $customizer['login_border_color'] ?>;
	        border-radius: 5px;
}
.preview-login-btn {
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
  
.preview-login-btn:hover, .preview-login-btn:focus {
	border-color: <?= $customizer['login_btn_border_color'] ?>;
	background: <?= $customizer['login_btn_font_color'] ?>;
	color: <?= $customizer['login_btn_color'] ?>;
}

.preview-form-actions {
	text-align: center;
	padding-top: unset;
	padding-bottom: 10px;
} /* This moves the login button to the centre of the box and removes the useless padding above the login button.  Adds padding to bottom of login button. */



.preview-form-required { display: none;} /* This removes the standard required asterisk */
	
</style>
