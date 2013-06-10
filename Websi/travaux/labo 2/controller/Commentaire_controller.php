<?php

class Commentaire_controller extends Abs_controller implements Controller_interface
{

    public function __toString()
    {
        return "Commentaire";
    }

    public function defaultAction()
    {
        
    }

    public function add($args)
    {
        if (count($args) < 1)
        {
            echo "Erreur de parametres";
        }
        else
        {
            echo $args[0];
            $taskID = $args[0];
            $task = Application::getDAOFactory()->getTaskDao()->getTaskById($taskID);
            
            $hist = new History_metier();
            $hist->rempli(0, $task->getId(), time() , $task->getDescription(), "tourbilol", $task->getState(), Application::getCurrUser()->getIdentifiant(), null);
            $hist->save();
            
            
            
        }
    }

}

?>
