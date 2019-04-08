<?php

namespace Kanboard\Plugin\Customizer\Helper;

use Kanboard\Helper\AvatarHelper;
use Kanboard\Core\Base;
/**
 * Avatar Helper
 *
 * @package helper
 * @author  Craig Crosby
 */
class DynamicAvatar extends AvatarHelper
{

    public function dynamic($user_id, $username, $name, $email, $avatar_path, $css = '', $size)
    {
        return $this->render($user_id, $username, $name, $email, $avatar_path, $css, $size);
    }

    public function currentUserDynamic($css = '')
    {
        $user = $this->userSession->getAll();
        return $this->dynamic($user['id'], $user['username'], $user['name'], $user['email'], $user['avatar_path'], $css, $this->configModel->get('av_radius', '50'));
    }
    
 }
