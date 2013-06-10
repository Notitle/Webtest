<?php

/**
 * Description of Project_controller
 *
 * @author Sarah
 */
class Project_controller extends Abs_controller implements Controller_interface {

    public function defaultAction() {
        ;
    }

    public function __toString() {
        return 'Project';
    }

    public function add() {
        $vue = new View_vue(array("form" => new AddProject_form()));
        $vue->combine($this, __FUNCTION__);
    }

    public function viewproject() {
        $vue = new View_vue(array("projectList" => Application::getDAOFactory()->getProjectDao()->getProjectList()));
        $vue->combine($this, __FUNCTION__);
    }

    public function add_check() {
        try {
            Form_manager::validateForm(new AddProject_form());
            $name = $this->getPostArray["project_name"];
            $parent = $this->getPostArray["cat_parent"];

            $newProject = new Projet_metier(0, $name, $parent);
            $newProject->save();
            echo "Projet ajouté";
        } catch (Validateur_exception $e) {
            echo $e->getMessage();
        }
    }
    
        public function update($params = null) {
        $v = new View_vue(array("form" => new UpdateProject_form($params[0])));
        $v->combine($this, __FUNCTION__);
    }

    public function update_check($params = null) {
        try {
            Form_manager::validateForm(new UpdateProject_form($params[0]));
            $name = $this->getPostArray["pro_name"];
            $parent = $this->getPostArray["pro_category_fk"];
            $id = $this->getPostArray["pro_id"];

            $category = Application::getDAOFactory()->getProjectDao()->getProjectById($id);
            $category->setParentCategory($parent);
            $category->setName($name);
            $category->save();

            $vue = new View_vue(array(
                "form" => new UpdateProject_form($id),
                "info" => "Le projet a bien été ajouté"
            ));
            $vue->combine($this, "update");
        } catch (Exception $e) {
            $vue = new View_vue(array(
                "form" => new UpdateProject_form($id),
                "error" => $e->getMessage()
            ));
            $vue->combine($this, "update");
        }
    }


}
?>

