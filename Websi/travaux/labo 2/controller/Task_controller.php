<?php

/**
 * Description of Project_controller
 *
 * @author Sarah
 */
class Task_controller extends Abs_controller implements Controller_interface
{

    public function defaultAction()
    {
        ;
    }

    public function __toString()
    {
        return 'Task';
    }

    public function viewtasks()
    {
        $vue = new View_vue(array("taskList" => Application::getDAOFactory()->getTaskDao()->getTaskList()));
        $vue->combine($this, __FUNCTION__);
    }

    public function add()
    {
        $vue = new View_vue(array("form" => new AddTask_form()));
        $vue->combine($this, __FUNCTION__);
    }

    public function add_check()
    {
        try
        {
            Form_manager::validateForm(new AddTask_form());
            $name = $this->getPostArray["task_name"];
            $parent = $this->getPostArray["phase_parent"];
            $description = $this->getPostArray["task_desc"];

            $newTask = new Task_metier(0, $name, time(), $parent);
            $newTask->setDescription($description);
            $newTask->save();

            $vue = new View_vue(array(
                "form" => new AddTask_form(),
                "info" => "La tâche a bien été ajoutée"
            ));
            $vue->combine($this, "add");
        }
        catch (Exception $e)
        {
            $vue = new View_vue(array(
                "form" => new AddTask_form(),
                "error" => $e->getMessage()
            ));
            $vue->combine($this, "add");
        }
    }
       public function details($params) {
        $id = isset($params[0]) ? $params[0] : 1;
        $det = Application::getDAOFactory()->getTaskDao()->getTaskById($id);
        $hist = Application::getDAOFactory()->gethistoryDao()->getHistoryByTask($det);
        $v = new View_vue(array(
            "det" => $det,
            "hist"=>$hist,
            ));
        $v->combine($this, __FUNCTION__);
    }

}

?>
