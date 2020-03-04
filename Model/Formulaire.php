<?php

/**
 * User: pierremm
 * Date: 08/07/19
 * Version: 1.0
 */

class Formulaire
{

    private $action;
    private $method;
    private $html;

    public function __construct($action, $method)
    {
        $this->action = $action;
        if ($method == 'POST' || $method == 'GET') {
            $this->method = $method;

            $this->html = "<form action ='$this->action' method='$this->method'>";
        } else {
            $this->html = '';
        }
    }

    public function input($type, $name, $value = null, $placeholder = null, $checked = null)
    {
        $this->html .= "<input type='$type' name='$name' ";

        if (!empty($value)) {
            $this->html .= 'value="' . htmlentities($value, ENT_QUOTES) . '" ';
        }
        if ($type == 'submit') {
            $this->html .= "class='btn btn-primary' ";
        } else {
            $this->html .= "class='form-control' ";
        }
        if (!empty($placeholder)) {
            
            $this->html .= 'placeholder="' . htmlentities($placeholder, ENT_QUOTES) . '" ';
        }
        if (!empty($checked)) {
            $this->html .= " checked ";
        }
        $this->html .= " />";
    }



    public function select($name, array $options, $selected)
    {
        $this->html .= "<select name='$name'>";
        foreach ($options as $key => $option) {

            if ($key == $selected) {
                $this->html .= "<option value='$key' selected>$option</option>";
            } else {
                $this->html .= "<option value='$key'>$option</option>";
            }
        }
        $this->html .= "</select>";
    }
    public function label($name, $for)
    {
        $this->html .= "<label for='$for'>";
        $this->html .= $name;
        $this->html .= "</label>";
    }
    public function divers($divers)
    {
        $this->html .= $divers;
    }


    public function render()
    {
        return $this->html . '</form>';
    }
}
