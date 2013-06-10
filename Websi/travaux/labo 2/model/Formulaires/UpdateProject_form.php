<?php

class UpdateProject_form extends Generic_form{

    private $project;

    public function __construct($id)
    {


        parent::__construct("UpdateProject", "/MVC/Project/update_check/".$id, Generic_form::METHOD_POST);
        $this->project = Application::getDAOFactory()->getProjectDao()->getProjectById($id);
        $name = new Field_form("pro_name", $this->project->getName(), "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z ]+#"));

        $id = new Field_form("pro_id", $id, "hidden");

        $parent = new FieldSelect_form("pro_category_fk", "Catégorie parente");
        $categoryList = Application::getDAOFactory()->getCategoryDao()->getCategoryList();
        $parent->addOption(new FieldOption_form("Catégorie", null, false));
        foreach ($categoryList as $cat)
        {
            $isSelected = $cat->getId() == $this->project->getParentCategory()->getId();
            $parent->addOption(new FieldOption_form($cat->getName(), $cat->getId(), $isSelected));
        }
        $parent->addValidationRule(new Regex_validateur("#[0-9]+#"));

        $this->addField($name);
        $this->addField($parent);
        $this->addField($id);
        $this->addField(new Field_form("submit", "Envoyer", "submit"));
    }

}

?>
