<?php

class Updateuser_form extends Generic_form {

    private $user;

    public function __construct($id) {


        parent::__construct("UpdateUser", "/MVC/User/update_check/" . $id, Generic_form::METHOD_POST);
        $this->user = Application::getDAOFactory()->getUserDao()->getUserById($id);

        $login = new Field_form("use_login", $this->user->getIdentifiant(), "text", "Login");
        $login->addValidationRule(new Recquis_validateur());
        $login->addValidationRule(new Regex_validateur("#[A-z]#"));

        $firstname = new Field_form("use_firstname", $this->user->getPrenom(), "text", "Prénom");
        $firstname->addValidationRule(new Recquis_validateur());
        $firstname->addValidationRule(new Regex_validateur("#[A-z]#"));

        $lastname = new Field_form("use_lastname", $this->user->getNom(), "text", "Nom");
        $lastname->addValidationRule(new Recquis_validateur());
        $lastname->addValidationRule(new Regex_validateur("#[A-z]#"));

        $email = new Field_form("use_email", $this->user->getEmail(), "text", "Email");
        $email->addValidationRule(new Recquis_validateur());
        $email->addValidationRule(new Regex_validateur("#[A-z]#"));

        $password = new Field_form("use_password", $this->user->getPassword(), "password", "Password");
        $password->addValidationRule(new Recquis_validateur());
        $password->addValidationRule(new Regex_validateur("#[A-z]#"));

        $id = new Field_form("use_login", $id, "hidden");
        //la flemme de changer id en login 

        $parent = new FieldSelect_form("use_parent", "groupe");
        $groupeList = Application::getDAOFactory()->getGroupDao()->getGroupList();
        $parent->addOption(new FieldOption_form("Groupes", null, false));
        foreach ($groupeList as $gro) {

            $isSelected = $gro->getId() == $this->user->getGroup()->getId();
            $parent->addOption(new FieldOption_form($gro->getName(), $gro->getId(), $isSelected));
        }
        $parent->addValidationRule(new Regex_validateur("#[0-9]+#"));

        $this->addField($login);
        $this->addField($firstname);
        $this->addField($lastname);
        $this->addField($email);
        $this->addField($password);
        $this->addField($parent);
        $this->addField($id);
        $this->addField(new Field_form("submit", "Envoyer", "submit"));
    }

}

?>
