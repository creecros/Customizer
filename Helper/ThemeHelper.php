<?php

namespace Kanboard\Plugin\Customizer\Helper;

use Kanboard\Core\Base;

class ThemeHelper extends Base
{

    public function reverseSelect($name, array $options, array $values = array(), array $errors = array(), array $attributes = array(), $class = '')
    {
        $html = '<select name="'.$name.'" id="form-'.$name.'" class="'.$class.'" '.implode(' ', $attributes).'>';
        foreach ($options as $id => $value) {
            $html .= '<option value="'.$this->helper->text->e($value).'"';
            if (isset($values->$name) && $value == $values->$name) {
                $html .= ' selected="selected"';
            }
            if (isset($values[$name]) && $value == $values[$name]) {
                $html .= ' selected="selected"';
            }
            $html .= '>'.$this->helper->text->e($id).'</option>';
        }
        $html .= '</select>';
        $html .= $this->errorList($errors, $name);
        return $html;
    }
    
    public function reverseSelectOnChange($name, array $options, array $values = array(), array $errors = array(), array $attributes = array(), $class = '')
    {
        $html = '<select name="'.$name.'" id="userthemeSelection" class="'.$class.'" '.implode(' ', $attributes).'>';
        foreach ($options as $id => $value) {
            $html .= '<option value="'.$this->helper->text->e($value).'"';
            if (isset($values->$name) && $value == $values->$name) {
                $html .= ' selected="selected"';
            }
            if (isset($values[$name]) && $value == $values[$name]) {
                $html .= ' selected="selected"';
            }
            $html .= '>'.$this->helper->text->e($id).'</option>';
        }
        $html .= '</select>';
        $html .= $this->errorList($errors, $name);
        return $html;
    }
    
    private function errorClass(array $errors, $name)
    {
        return ! isset($errors[$name]) ? '' : ' form-error';
    }

    private function errorList(array $errors, $name)
    {
        $html = '';
        if (isset($errors[$name])) {
            $html .= '<ul class="form-errors">';
            foreach ($errors[$name] as $error) {
                $html .= '<li>'.$this->helper->text->e($error).'</li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }
    
 }
