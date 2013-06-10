<?php

/**
 * Description of User_manager
 *
 * @author loic
 */
class User_manager
{
    /**
     * Retourne l'objet Utilisateur_metier stocké dans une session utilisateur, ou un utilisateur anonyme si non connecté.
     * @return Utilisateur_metier
     */
    public static function createUserFromSession()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : new Utilisateur_metier(-1);
    }
    
    /**
     * 
     * @param type $user
     * @param type $password
     * @return boolean
     */
    public static function checkLoginPassword($user, $password)
    {
        $u = Application::getDAOFactory()->getUserDao()->getUserByLogin($user);
        return $u->getPassword() == $password;
    }
}

?>
