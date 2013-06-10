<?php

class Updatephase_form extends Generic_form
{

    private $phase;

    public function __construct($id)
    {


        parent::__construct("UpdatePhase", "/MVC/Phase/update_check/".$id, Generic_form::METHOD_POST);
        $this->phase = Application::getDAOFactory()->getPhaseDao()->getPhaseById($id);
        $name = new Field_form("pha_name", $this->phase->getName(), "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z ]+#"));

        $id = new Field_form("pha_id", $id, "hidden");

        $parent = new FieldSelect_form("pha_parent", "projet");
        $projetList = Application::getDAOFactory()->getProjectDao()->getProjectList();
        $parent->addOption(new FieldOption_form("Projets", null, false));
        foreach ($projetList as $pha)
        {

            $isSelected = $pha->getId() == $this->phase->getProject()->getId();
            $parent->addOption(new FieldOption_form($pha->getName(), $pha->getId(), $isSelected));
        }
        $parent->addValidationRule(new Regex_validateur("#[0-9]+#"));

        $this->addField($name);
        $this->addField($parent);
        $this->addField($id);
        $this->addField(new Field_form("submit", "Envoyer", "submit"));
    }

}

?>
