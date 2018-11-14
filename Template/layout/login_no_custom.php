<?php global $customizer; ?>
<?php if ($customizer['loginCheck']): ?>
<?= $this->url->link('<img src="' . $this->url->href('CustomizerFileController', 'loginlogo', array('plugin' => 'customizer')) .  '" height="' . $customizer['logoSize'] . '">', 'CustomizerFileController', 'link', array('plugin' => 'customizer')) ?> 
<?php endif ?>
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
