<?php global $customizer; ?>
<style>
.preview-form-login > a > img {
	display: block;
	margin: auto;
	padding-top: 10px
} /* This aligns the logo to the text.  Adds padding to top of logo. */
	
	
.preview-form-login, .preview-form-note {
	background-color: <?= $customizer['loginpanel_color'] ?>;
	-webkit-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px;
	-moz-box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px;
	box-shadow: 0px 0px <?= $customizer['login_shadow'] ?>px <?= $customizer['login_shadow'] * .1 ?>px;
	padding: 10px;
	border: <?= $customizer['login_border'] ?>px solid <?= $customizer['login_border_color'] ?>;
	border-radius: 5px;
	text-align: center;
	max-width: max-content;
	margin: 5% auto 0;;
}
.preview-login-btn {
	width: <?= $customizer['login_btn_width'] ?>px;
	-webkit-box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
	-moz-box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
	box-shadow: 0px 0px <?= $customizer['login_btn_shadow'] ?>px <?= $customizer['login_btn_shadow'] * .1 ?>px <?= $customizer['login_btn_shadow_color'] ?>;
	border: <?= $customizer['login_btn_border'] ?>px solid <?= $customizer['login_btn_border_color'] ?>;
	background: <?= $customizer['login_btn_color'] ?>;
	color: <?= $customizer['login_btn_font_color'] ?>;
	background-image: linear-gradient(-180deg, transparent 0%, <?= $customizer['login_btn_shade_color'] ?> 90%);
	border-radius: 5px;
	}
  
.preview-login-btn:hover, .preview-login-btn:focus {
	border-color: <?= $customizer['login_btn_border_color'] ?>;
	background: <?= $customizer['login_btn_font_color'] ?>;
	color: <?= $customizer['login_btn_color'] ?>;
	background-image: unset;
}
	
.preview-form-actions > .preview-login-btn {
	font-variant-caps: all-small-caps;
	text-align: center;
	transition: cubic-bezier(0.1, 0.75, 0.57, 1) 0.4s;
	-webkit-transition: cubic-bezier(0.1, 0.75, 0.57, 1) 0.4s;
} 


.preview-form-actions {
	text-align: center;
	padding-top: unset;
	padding-bottom: 10px;
} /* This moves the login button to the centre of the box and removes the useless padding above the login button.  Adds padding to bottom of login button. */



.preview-form-required { display: none;} /* This removes the standard required asterisk */
	
.avatar-preview img, .avatar-preview div {
	border-radius: <?= $this->task->configModel->get('av_radius','50') ?>%;
}
.avatar-preview .avatar-letter {
    line-height: <?= $this->task->configModel->get('av_size','20') ?>px;
    width: <?= $this->task->configModel->get('av_size','20') ?>px;
    font-size: <?= $this->task->configModel->get('av_size','20') / 2 ?>px;
}

.b-avatar-preview img, .b-avatar-preview div {
	border-radius: <?= $this->task->configModel->get('b_av_radius','50') ?>%;
}
.b-avatar-preview .avatar-letter {
    line-height: <?= $this->task->configModel->get('b_av_size','20') ?>px;
    width: <?= $this->task->configModel->get('b_av_size','20') ?>px;
    font-size: <?= $this->task->configModel->get('b_av_size','20') / 2 ?>px;
}
	
</style>
