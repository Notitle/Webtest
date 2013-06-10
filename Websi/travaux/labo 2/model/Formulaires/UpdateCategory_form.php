<?php

class UpdateCategory_form extends Generic_form
{

    private $category;

    public function __construct($id)
    {


        parent::__construct("UpdateCategory", "/MVC/Category/update_check/".$id, Generic_form::METHOD_POST);
        $this->category = Application::getDAOFactory()->getCategoryDao()->getCategoryById($id);
        $name = new Field_form("cat_name", $this->category->getName(), "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z ]+#"));

        $id = new Field_form("cat_id", $id, "hidden");

        $parent = new FieldSelect_form("cat_parent", "Catégorie parente");
        $categoryList = Application::getDAOFactory()->getCategoryDao()->getCategoryList();
        $parent->addOption(new FieldOption_form("Catégories", null, false));
        foreach ($categoryList as $cat)
        {

            $isSelected = $cat->getId() == $this->category->getParentId();
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
