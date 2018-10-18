<?php

namespace Kanboard\Plugin\Customizer\Helper;

use Kanboard\Core\Base;

class LoginHelper extends Base
{
    
    public function loginlogo($logo, $link)
    {
	if (isset($link)){
        	return '<a href="'.$this->helper->text->e($link).'><img src="'.$logo.'" height="50"></a>';
	} else if (isset($logo)) {
        	return '<img src="'.$logo.'" height="50">';
	} else {
		return '';
	}
    }
    
}
