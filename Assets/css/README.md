## How to add a theme.
1. Add your css to this folder, named `yourtheme.css`, figuratively
2. Add your Theme to the array in Plugin.php in the main folder, starting on L#17
  * `'YourTheme' => '/var/www/app/plugins/Customizer/Assets/css/yourtheme.css'`
  
https://github.com/creecros/Customizer/blob/master/Plugin.php

``` php
  $customizer['themes'] = array(
		'Default' => '',
		'Github' => '/var/www/app/plugins/Customizer/Assets/css/github.css',
		'Galaxy' => '/var/www/app/plugins/Customizer/Assets/css/galaxy.css',
		'Breathe' => '/var/www/app/plugins/Customizer/Assets/css/breathe.css',
		'YourTheme' => '/var/www/app/plugins/Customizer/Assets/css/yourtheme.css'
		);
```
3. Make a Pull Request

Themes
--------

Github:

![image](https://user-images.githubusercontent.com/26339368/47761386-8636b880-dc8e-11e8-9b6e-c46e7b5dcc44.png)

Galaxy:

![image](https://user-images.githubusercontent.com/26339368/47761350-68695380-dc8e-11e8-9e87-a9471e5e1adf.png)


Breathe:

![image](https://user-images.githubusercontent.com/26339368/47761312-47086780-dc8e-11e8-9460-5b1ce4b54d5e.png)
