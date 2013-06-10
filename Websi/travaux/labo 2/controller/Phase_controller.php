<?php

class Phase_controller extends Abs_controller implements Controller_interface {

    public function __toString() {
        return "Phase";
    }

    public function defaultAction() {
        
    }

    public function add() {
        $v = new View_vue(array("form" => new AddPhase_form()));
        $v->combine($this, __FUNCTION__);
    }

    public function viewphase() {
        $view = new View_vue(array(
            "phaseList" => Application::getDAOFactory()->getPhaseDao()->getPhaseList()
        ));
        $view->combine($this, __FUNCTION__);
    }

    public function add_check() {
        try {
            Form_manager::validateForm(new AddPhase_form());
            $name = $this->getPostArray["pha_name"];
            $parent = $this->getPostArray["pha_parent"];

            $newPhase = new Phase_metier(0, $name, $parent);
            $newPhase->save();
            echo "Phase ajoutée";
        } catch (Validateur_exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($params = null) {
        $v = new View_vue(array("form" => new UpdatePhase_form($params[0])));
        $v->combine($this, __FUNCTION__);
    }

    public function update_check($params = null) {
        try {
            Form_manager::validateForm(new UpdatePhase_form($params[0]));
            $name = $this->getPostArray["pha_name"];
            $parent = $this->getPostArray["pha_project_fk"];
            $id = $this->getPostArray["pha_id"];

            $category = Application::getDAOFactory()->getPhaseDao()->getPhaseById($id);
            $category->setParentId($parent);
            $category->setName($name);
            $category->save();

            $vue = new View_vue(array(
                "form" => new UpdatePhase_form($id),
                "info" => "La phase a bien été ajoutée"
            ));
            $vue->combine($this, "update");
        } catch (Exception $e) {
            $vue = new View_vue(array(
                "form" => new UpdatePhase_form($id),
                "error" => $e->getMessage()
            ));
            $vue->combine($this, "update");
        }
    }

}

?>
