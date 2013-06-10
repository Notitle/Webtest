<?php

class AddPhase_form extends Generic_form
{

    public function __construct()
    {
        parent::__construct("addphase", "/MVC/Phase/add_check", Generic_form::METHOD_POST);

        $name = new Field_form("pha_name", "", "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z ]#"));

        $parent = new FieldSelect_form("pha_parent", "Catégorie parente");
        $projetList = Application::getDAOFactory()->getProjectDao()->getProjectList();
        $parent->addOption(new FieldOption_form("Projets", null, true));
        foreach ($projetList as $cat)
        {
            $parent->addOption(new FieldOption_form($cat->getName(), $cat->getId(), false));
        }
        $parent->addValidationRule(new Regex_validateur("#[0-9]+#"));

        $this->addField($name);
        $this->addField($parent);
        $this->addField(new Field_form("submit", "Envoyer", "submit"));
    }

}

?>
