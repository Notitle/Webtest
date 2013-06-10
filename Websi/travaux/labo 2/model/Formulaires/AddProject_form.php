<?php
/**
 * Description of AddProject_form
 *
 * @author Sarah
 */
class AddProject_form extends Generic_form {
    public function __construct() {
        parent::__construct("addcategory", "/MVC/project/add_check", Generic_form::METHOD_POST);
        
        $name=new Field_form("project_name", "", "text", "Nom");
        $name->addValidationRule(new Recquis_validateur());
        $name->addValidationRule(new Regex_validateur("#[A-z]#"));
        
        $parent=new FieldSelect_form("cat_parent", "Catégorie parente");
        $categoryList=  Application::getDAOFactory()->getCategoryDao()->getCategoryList();
        $parent->addOption(new FieldOption_form("Categories",null,true));
        foreach($categoryList as $cat){
            $parent->addOption(new FieldOption_form($cat->getName(),$cat->getid(),false));
        }
        $parent->addValidationRule(new Regex_validateur("#[0-9]+#"));
        $this->addField($name);
        $this->addField($parent);
        $this->addField(new Field_form("submit","Envoyer","submit"));
    }
}

?>
