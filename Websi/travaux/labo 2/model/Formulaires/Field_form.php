<?php

class Field_form
{

    private $name;
    private $value;
    private $validators = array();
    private $id;
    private $class;
    private $id_css;
    private $type;
    private $label;
            
    function __construct($name, $value, $type, $label = null, $class = NULL, $id_css = NULL)
    {
        $this->name = $name;
        $this->value = isset($_POST[$this->name]) ? $_POST[$this->name] : $value;
        $this->type = $type;
        $this->label = $label;
        $this->class = $class;
        $this->id_css = $id_css;
    }

    public function addValidationRule(Validateur_interface $validator)
    {
        $this->validators[] = $validator;
    }

    public function getValidators()
    {
        return $this->validators;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    
    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getId_css() {
        return $this->id_css;
    }

    public function setId_css($id_css) {
        $this->id_css = $id_css;
    }


}

?>
