<?php

/**
 * Description of FieldOption_form
 *
 * @author internet07
 */
class FieldOption_form
{

    private $content;
    private $ValueOption;
    private $isSelected;

    /**
     * constructeur
     * @param type $valueOption
     */
    function __construct($content, $ValueOption, $isSelected)
    {
        $this->content = $content;
        $this->ValueOption = $ValueOption;
        $this->isSelected = $isSelected;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getValueOption()
    {
        return $this->ValueOption;
    }

    public function setValueOption($ValueOption)
    {
        $this->ValueOption = $ValueOption;
    }

    public function getIsSelected()
    {
        return $this->isSelected;
    }

    public function setIsSelected($isSelected)
    {
        $this->isSelected = $isSelected;
    }



//selected
}

?>