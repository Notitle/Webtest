<?php

class AddTask_form extends Generic_form
{

    public function __construct()
    {
        parent::__construct("addtask", "/MVC/Task/add_check", Generic_form::METHOD_POST);

        $name = new Field_form("task_name", "", "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z0-9]#"));

        $description = new Field_form("task_desc", "", "text", "Description ");
        $description->addValidationRule(new Recquis_validateur());
        $description->addValidationRule(new Regex_validateur("#[A-z0-9 ]#"));

        $parent = new FieldSelect_form("phase_parent", "Phase parente");
        $phaseList = Application::getDAOFactory()->getPhaseDao()->getPhaseList();
        $parent->addOption(new FieldOption_form("Phases", null, true));
        foreach ($phaseList as $pha)
        {
            $parent->addOption(new FieldOption_form($pha->getName(), $pha->getid(), false));
        }
        $this->addField($name);
        $this->addField($description);
        $this->addField($parent);
        $this->addField(new Field_form("submit", "Envoyer", "submit"));
    }

}
?>

