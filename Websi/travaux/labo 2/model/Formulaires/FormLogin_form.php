<?php

/**
 * Description of FormLogin_form
 *
 * @author loic
 */
class FormLogin_form extends Generic_form
{

    public function __construct()
    {
        parent::__construct("connect", "/MVC/Connexion/loginCheck", Generic_form::METHOD_POST);

        $user = new Field_form("loginUser", "", "text", "Nom d'utilisateur", "input1");
        $user->addValidationRule(new Recquis_validateur());
        $user->addValidationRule(new Regex_validateur("#^[A-z0-9]+$#"));

        $password = new Field_form("loginPassword", "", "password", "Mot de passe", "input1");
        $password->addValidationRule(new Recquis_validateur());
        $password->addValidationRule(new Regex_validateur("#^[A-z0-9]+$#"));

        $this->addField($user);
        $this->addField($password);
        $this->addField(new Field_form("submit", "Envoyer", "submit", "", "input2"));
    }

}

?>
