<?php

/**
 * Description of Project_DAO
 *
 * @author sarah
 */
class Projects_DAO {

    /**
     *
     * @var tableau des projets $project_liste
     */
    private $pdo;
    private $project_liste = array();

    public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
    }

    /**
     * requete de sélection des projets--
     * @return tableau de projets
     */
    public function getProjectList() {
        $sql = 'SELECT * FROM project';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $key => $row) {
            $this->project_liste[$row["pro_id"]] = new Projet_metier
                    ($row["pro_id"], $row["pro_name"], $row["pro_category_fk"], $row["pro_deleted"]);
        }
        return $this->project_liste;
    }

    public function getProjectById($id) {
        if (!isset($this->project_liste[$id])) {

            $query = '
                    SELECT *
                    FROM project
                    WHERE pro_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $this->project_liste[$id] = new Projet_metier
                    ($row["pro_id"], $row["pro_name"], $row["pro_category_fk"], $row["pro_deleted"]);
        }
        return $this->project_liste[$id];
    }
    

    /**
     * ajout du Projet
     * @param categorie_metier $cm
     * 
     */
    public function setProject(projet_metier $pm) {
        if ($pm->getId() != 0) {
            $project = $this->pdo->prepare("UPDATE project SET pro_name=:n, pro_category_fk=:p WHERE pro_id=:a");
            $project->execute(array(':a' => $pm->getId(), ':n' => $pm->getName(), ':p'=>$pm->getParentCategory()->getId()));
        } else {
            $project = $this->pdo->prepare("INSERT INTO project (pro_name, pro_category_fk) VALUES (:n,:p)");
            $project->execute(array(':n' => $pm->getName(),':p'=>$pm->getParentCategory()->getId()));
        }
    }

    /**
     * delete du Projet
     * @param type $id
     * @return string
     */
    public function deleteProject($id) {
        if (isset($this->project_liste[$id])) {
            unset($this->project_liste[$id]);
        } else {
            return "Le projet n'existe pas";
        }
        $project = $this->PDO->prepare("UPDATE project SET pro_deleted=1 WHERE pro_id=:a");
        $project->execute(array(':a' => $id));
    }

    /**
     * Fonction affichant les projets correspandant à une catégorie
     * @param type $cat
     */
    public function getProjectByCat(Categorie_metier $cat) {
        $query = '
                    SELECT *
                    FROM project
                    WHERE pro_category_fk = :a
                    ORDER BY pro_name DESC';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(":a" => $cat->getCategorie()));
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $return = array();
        foreach ($stmt as $key => $row) {
            if (!isset($this->project_liste[$row["pro_id"]])) {
                $this->project_liste[$row["pro_id"]] = new Projet_metier
                        ($row["pro_id"], $row["pro_name"], $row["pro_category_fk"], $row["pro_deleted"]);
            }
            $return[] = $this->project_liste[$row["pro_category_fk"]];
        }
        return $return;
    }
   

}

?>
