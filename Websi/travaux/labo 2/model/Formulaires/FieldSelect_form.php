<?php

/**
 * Description of FieldSelect_formµ
 *
 * @author internet07
 */
class FieldSelect_form extends Field_form {

    private $options;
    
    /**
     * constructeur
     * @param type $name
     * @param type $options
     */
    function __construct($name, $label) {
        parent::__construct($name,'','select',$label);
    }

    public function getOption_liste() {
        return $this->options;
    }

    public function addOption(FieldOption_form $option) {
        $this->options[] = $option;
    }
}

?>
