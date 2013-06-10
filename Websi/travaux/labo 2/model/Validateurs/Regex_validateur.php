<?php

/**
 * Validation des regex, parent
 *
 * @author Jerome
 */
class Regex_validateur implements Validateur_interface{

    protected $regex;
      /**
      * CONSTRUCT, BLANC MORT ! CONSTRUCT D'UN REGEX QUOI  !
      * @param string $regex recupère la valeur d'un champs  
      */
    public function __construct($regex){
        $this->regex = $regex;
    }
    /**
     * fonction qui renvoie une exception si la chaine
     * ne correspond pas aux regexS
     * @param string $valeur valeur max dans un champs
     * @throws Regex_validateur_exception
     */
    public function valide($valeur){
        if(!preg_match($this->regex,$valeur))
            throw new Regex_validateur_exception('Format invalide');
    }
}
?>
