<?php

/**
 * Classe reprennant categorie_metier
 *
 * @author rodo/loic
 */
class Task_DAO
{

    private $pdo;
    private $task_Liste = array();

    public function __construct(MyPDO_DAO $mpdo)
    { // connexion
        $this->pdo = $mpdo;
    }

    /**
     * Retourne toute la liste des taches
     * @return Array
     */
    public function getTaskList()
    { //liste des taches (fn get)
        $sql = 'Select tas_id, tas_description, tas_creation, tas_phase_fk from task'; //requete
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt

        foreach ($stmt as $key => $row)
        { // boucle foreach pr parcourir le tableau associatif, utilisation de l'objet instancié à la classe task_metier avec les paramètres correspondants
            if (!isset($this->task_Liste[$row["tas_id"]]))
            {
                $this->task_Liste[$row["tas_id"]] = new Task_metier($row['tas_id'], $row['tas_description'], $row['tas_creation'], $row['tas_phase_fk']);
            }
        }
        return $this->task_Liste; // !! ne pas oublier le return!! ;-)
    }

    /**
     * select d'une tache via un id
     * @param type $id
     * @return Task_metier
     */
    public function getTaskById($id)
    {

        if (!isset($this->task_Liste[$id]))
        {

            $query = '
                    SELECT tas_id, tas_description, tas_creation, tas_phase_fk
                    FROM task
                    WHERE tas_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt
            $row = $stmt->fetch();

            if (!isset($this->task_Liste[$id]) && $id != "")
            {
                $this->task_Liste[$id] = new Task_metier($row["tas_id"], $row["tas_description"], $row["tas_creation"], $row["tas_phase_fk"]);
            }
        }
        return $this->task_Liste[$id];
    }

    /**
     * modif/ajout d'une tache
     * @param Task_metier $tm
     */
    public function setTask(Task_metier $tm)
    {
        if ($tm->getId() != 0)
        {
            $tache = $this->pdo->prepare("UPDATE task SET tas_description = :b, tas_creation = :c, tas_phase_fk = :d WHERE tas_id = :a");
            $tache->execute(array(':a' => $tm->getId(), ':b' => $tm->getTache(), ':c' => $tm->getDate(), ':d' => $tm->getPhase()));
        }
        else
        {
            $tache = $this->pdo->prepare("INSERT INTO task (tas_description, tas_phase_fk) VALUES (:b,:d)");
            $tache->execute(array(':b' => $tm->getTache(), ':d' => $tm->getPhase()->getId()));
            $tache = $this->pdo->prepare("INSERT INTO history (his_task_fk,his_description,his_state,his_user_fk) VALUES (:a,:b,:c,:d)");
            $tache->execute(array(
                ":a" => $this->pdo->lastInsertId(),
                ":b" => $tm->getDescription(),
                ":c" => "todo",
                ":d" => null
            ));
        }
    }

    /**
     * suppression d'une tâche
     * @param type $id
     * @return string
     */
    public function deleteTask($id)
    {
        if (isset($this->task_Liste[$id]))
        {
            unset($this->task_Liste[$id]);
        }
        else
        {
            return "La tâche n'existe pas, Nom d'un chien ! Le capitaine Jérôme a encore bu trop de Whisky !!!!!!!!!!!!!!!!!! !";
        }
        $task = $this->PDO->prepare("DELETE FROM task WHERE tas_id=:a");
        $task->execute(array(':a' => $id));
    }

    /**
     * select d'une tache via l'objet phase
     * @param Phase_metier $phase
     * @return type
     */
    public function getTaskByPhase(Phase_metier $phase)
    {
        $query = '
            SELECT tas_id, tas_description, tas_creation, tas_phase_fk
            FROM task
            WHERE tas_phase_fk =:a';
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $phase->getId()));
        $return = array();
        foreach ($result as $key => $row)
        {
            if (!isset($this->task_Liste[$row["tas_id"]]))
            {
                $this->task_Liste[$row["tas_id"]] = new Task_metier($row["tas_id"], $row["tas_description"], $row["tas_creation"], $row["tas_phase_fk"]);
            }
            $return[] = $this->task_Liste[$row["tas_id"]];
        }
        return $return;
    }

    /**
     * T'as qu'as lire le nom de la fonction, c'est clair. 
     * @param Utilisateur_metier $user
     * @return Array
     */
    public function getTasksByUser(Utilisateur_metier $user)
    {
        $query = 'SELECT his_task_fk FROM history WHERE his_user_fk=:a';
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

    //function pour todo/running/done/cancelled/blocked
    public function getTasksByUserTodo(Utilisateur_metier $user)
    {
        $query = "SELECT his_task_fk FROM history WHERE his_user_fk=:a AND his_state LIKE 'todo'";
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

    public function getTasksByUserRunning(Utilisateur_metier $user)
    {
        $query = "SELECT his_task_fk FROM history WHERE his_user_fk=:a AND his_state LIKE 'running'";
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

    public function getTasksByUserDone(Utilisateur_metier $user)
    {
        $query = "SELECT his_task_fk FROM history WHERE his_user_fk=:a AND his_state LIKE 'done'";
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

    public function getTasksByUserCanceled(Utilisateur_metier $user)
    {
        $query = "SELECT his_task_fk FROM history WHERE his_user_fk=:a AND his_state LIKE 'canceled'";
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

    public function getTasksByUserBlocked(Utilisateur_metier $user)
    {
        $query = "SELECT his_task_fk FROM history WHERE his_user_fk=:a AND his_state LIKE 'blocked'";
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

    public function getTasksByUserRunningAndTodo(Utilisateur_metier $user)
    {
        $query = "SELECT his_task_fk FROM history 
            WHERE 
            (his_user_fk=:a AND his_state LIKE 'running')
            OR
            (his_user_fk=:a AND his_state LIKE 'todo')";
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $user->getIdentifiant()));
        $return = array();
        foreach ($result as $key => $row)
        {
            $taskID = $row['his_task_fk'];

            if (!isset($this->task_Liste[$taskID]))
            {
                $this->task_Liste[$taskID] = $this->getTaskById($taskID);
            }
            $return[] = $this->task_Liste[$taskID];
        }
        return $return;
    }

}
?>


