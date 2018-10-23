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
.form-login {
    background-color: <?= $customizer['loginpanel_color'] ?>;
}
/*------ MOVED FROM PLUGIN CSS FILE TO AVOID AFFECTING OTHER PARTS OF KANBOARD.  STYLES SET HERE APPLY ONLY TO THE LOGIN PAGE. ------*/
.form-actions {
	text-align: center;
} /* This moves the login button to the centre of the box */

label:nth-of-type(3n) {
	font-size: smaller;
	color: grey;
} /* This makes the 'remember me' smaller */

label:nth-of-type(1), label:nth-of-type(2n), .form-actions > .btn-blue {
	font-variant-caps: all-small-caps;
} /* This makes the title text of the labels and the login button all capitals */

input[type="password"], input[type="text"]:not(.input-addon-field) {
	margin: auto;
	display: block;
} /* This centralises the input fields */

.form-required { display: none;} /* This removes the standard required asterisk */

label:nth-of-type(1):after, label:nth-of-type(2n):after {
	content: "*";
	transform: scale(1.3);
	margin-left: 5px;
	color: red;
	transform: scale(1.3);
	display: inline-block;
} /* This repositions the standard required asterisk */

</style>
<?php
if (session_exists('redirectAfterLogin') && ! filter_var(session_get('redirectAfterLogin'), FILTER_VALIDATE_URL)) {
            $redirect = session_get('redirectAfterLogin');
           if (strpos($redirect, 'Customizer') !== false) {
            session_remove('redirectAfterLogin');
           }
}
?>
