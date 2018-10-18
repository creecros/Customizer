<?php

namespace Kanboard\Plugin\Customizer\Helper;

use Kanboard\Plugin\Customizer\Model\CustomizerFileModel;
use Kanboard\Plugin\Customizer\Controller\CustomizerFileController;
use Kanboard\Model\ConfigModel;
use Kanboard\Core\Base;

class LoginHelper extends Base
{

    public function logo()
    {
        $file = $this->customizerFileModel->getByType(1);
        $this->customizerFileController->renderFileWithCache($file, $this->helper->file->getImageMimeType($file['name']));
    }
    
    public function link()
    {
        return $this->configModel->getOptions('login_link', 'https://kanboard.org');
    }
    
    public function logoexists()
    {
        if (null !== $this->customizerFileModel->getByType(1)) { return true; } else { return false; }  
    }
   
    public function linkexists()
    {
        if ($this->configModel->exists('login_link')) { return true; } else { return false; }  
    }
    
    public function loginpage()
    {
        if ($this->logoexists() && $this->linkexists()) {
            return 	'<a href="" target="_blank"><?php endif ?>
		             <img src="' . $this->logo() . '" height="50">
	                 </a>';
        } else if ($this->logoexists()) {
            return '<img src="' . $this->logo() . '" height="50">'
        } else {
            return '';            
    }
    
}
