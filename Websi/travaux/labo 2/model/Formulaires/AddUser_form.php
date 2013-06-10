<?php

/**
 * Description of AddUser_form
 *
 * @author Sarah
 */
class AddUser_form extends Generic_form {

    public function __construct() {
        parent::__construct("addUser", "/MVC/User/add_check", Generic_form::METHOD_POST);

        $login = new Field_form("use_login", "", "text", "Login");
        $login->addValidationRule(new Recquis_validateur());
        $login->addValidationRule(new Regex_validateur("#[A-z]#"));

        $prenom = new Field_form("use_firstname", "", "text", "Prénom");
        $prenom->addValidationRule(new Recquis_validateur());
        $prenom->addValidationRule(new Regex_validateur("#[A-z]#"));

        $nom = new Field_form("use_lastname", "", "text", "Nom");
        $nom->addValidationRule(new Recquis_validateur());
        $nom->addValidationRule(new Regex_validateur("#[A-z]#"));

        $email = new Field_form("use_email", "", "text", "Email");
        $email->addValidationRule(new Recquis_validateur());
        $email->addValidationRule(new Regex_validateur("#[A-z]#"));

        $password = new Field_form("use_password", "", "password", "Password");
        $password->addValidationRule(new Recquis_validateur());
        $password->addValidationRule(new Regex_validateur("#[A-z]#"));
        
        $groupe_parent = new FieldSelect_form("use_fk_group", "Groupe parent");
        $groupeList = Application::getDAOFactory()->getGroupDao()->getGroupList();
        $groupe_parent->addOption(new FieldOption_form("Groupes", null, true)); 
             
        foreach ($groupeList as $groupe) {
            $groupe_parent->addOption(new FieldOption_form($groupe->getName(), $groupe->getId(), false));
        }
        $groupe_parent->addValidationRule(new Regex_validateur("#[0-9+]#"));
        
        $this->addField($login);
        $this->addField($prenom);
        $this->addField($nom);
        $this->addField($email);
        $this->addField($password);
        $this->addField($groupe_parent);
        $this->addField(new Field_form("submit", "Envoyer", "submit"));
    }

}
?>

