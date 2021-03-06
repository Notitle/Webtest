<?php

/**
 * Classe reprennant categorie_metier
 * @author sarah (Rangé et commenté par loic <3)
 * 
 */
class Categorie_metier extends Generic_metier
{

    private $nom;
    private $id;
    private $parentId;
    private $parentCategory;

    /**
     * Function construct
     * @param string $categorie - nom de la categorie
     * @param string $id - nom de l'id
     */
    public function __construct($id, $nom, $parentid)
    {
        $this->validationArray = array(
            "categorie" => array("required" => true, "type" => "string"),
            "id" => array("required" => true, "type" => "integer")
        );
        $this->setName($nom);
        $this->setId($id);
        $this->setParentId($parentid);
        if ($parentid != null)
        {
            $this->setParentCategory($parentid);
        }
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * Retourne la catégorie parents
     * @return String
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Retourn le nom de la catégorie
     * @return type
     */
    public function getName()
    {
        return $this->nom;
    }

    public function setParentCategory($id)
    {
        Application::getDAOFactory()->getCategoryDao()->getCategoryById($id);
    }

    /**
     * Défini le nom de la catégorie
     * @param String $name
     */
    public function setName($name)
    {
        try
        {
            $this->nom = $name;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    /**
     * Retourne l'ID de la catégorie
     * @return type
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Défini l'id de la catégorie
     * @param integer $id
     */
    public function setId($id)
    {
        try
        {
            $this->id = $id;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    public function save()
    {
        Application::getDAOFactory()->getCategoryDao()->setCategory($this);
    }

}

?>
