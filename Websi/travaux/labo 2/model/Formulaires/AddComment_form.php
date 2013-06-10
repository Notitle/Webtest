<?php

class AddCategory_form extends Generic_form
{
    public function __construct($idTask)
    {
        parent::__construct("addcomment", "/MVC/Commentaire/add_check", Generic_form::METHOD_POST);

        $name = new Field_form("cat_name", "", "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z ]#"));

        $parent = new FieldSelect_form("cat_parent", "Catégorie parente");
        $categoryList = Application::getDAOFactory()->getCategoryDao()->getCategoryList();
        $parent->addOption(new FieldOption_form("Catégories", null, true));
        foreach ($categoryList as $cat)
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
