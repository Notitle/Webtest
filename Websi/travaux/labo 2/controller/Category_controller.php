<?php

class Category_controller extends Abs_controller implements Controller_interface
{

    public function defaultAction()
    {
        
    }

    public function add($params = null)
    {
        $v = new View_vue(array("form" => new AddCategory_form()));
        $v->combine($this, __FUNCTION__);
    }

    public function add_check()
    {
        try
        {
            Form_manager::validateForm(new AddCategory_form());
            $name = $this->getPostArray["cat_name"];
            $parent = $this->getPostArray["cat_parent"];

            $newCat = new Categorie_metier(0, $name, $parent);
            $newCat->save();
            $view = new View_vue(array(
                "catList" => Application::getDAOFactory()->getCategoryDao()->getCategoryList(),
                "info" => "La catégorie a été ajoutée !",
                "form" => new AddCategory_form()
            ));
            $view->combine($this, "viewall");
        }
        catch (Exception $e)
        {
            $view = new View_vue(array(
                "catList" => Application::getDAOFactory()->getCategoryDao()->getCategoryList(),
                "error" => $e->getMessage(),
                "form" => new AddCategory_form()
            ));
            $view->combine($this, "viewall");
        }
    }

    public function update($params = null)
    {
        $v = new View_vue(array("form" => new UpdateCategory_form($params[0])));
        $v->combine($this, __FUNCTION__);
    }

    public function update_check($params = null)
    {
        try
        {
            Form_manager::validateForm(new UpdateCategory_form($params[0]));
            $name = $this->getPostArray["cat_name"];
            $parent = $this->getPostArray["cat_parent"];
            $id = $this->getPostArray["cat_id"];

            $category = Application::getDAOFactory()->getCategoryDao()->getCategoryById($id);
            $category->setParentId($parent);
            $category->setName($name);
            $category->save();

            $vue = new View_vue(array(
                "form" => new UpdateCategory_form($id),
                "info" => "La catégorie a bien été ajoutée"
            ));
            $vue->combine($this, "update");
        }
        catch (Exception $e)
        {
            $vue = new View_vue(array(
                "form" => new UpdateCategory_form($id),
                "error" => $e->getMessage()
            ));
            $vue->combine($this, "update");
        }
    }

    public function viewall()
    {
        $view = new View_vue(array(
            "catList" => Application::getDAOFactory()->getCategoryDao()->getCategoryList(),
            "form" => new AddCategory_form(),
        ));
        $view->combine($this, __FUNCTION__);
    }

    public function __toString()
    {
        return 'Category';
    }

}
?>
    
