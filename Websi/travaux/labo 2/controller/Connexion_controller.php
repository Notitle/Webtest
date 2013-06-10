<?php

class Connexion_controller extends Abs_controller implements Controller_interface
{

    public function __toString()
    {
        return "Connexion";
    }

    public function defaultAction()
    {
        $this->login();
    }

    public function login()
    {
        $vue = new View_vue(array(
            "form" => new FormLogin_form(),
        ));
        $vue->combine($this, "login");
    }

    public function loginCheck()
    {
        try
        {
            Form_manager::validateForm(new FormLogin_form());
            $user = $this->getPostArray["loginUser"];
            $password = $this->getPostArray["loginPassword"];

            if (User_manager::checkLoginPassword($user, $password))
            {
                $_SESSION['user'] = Application::getDAOFactory()->getUserDao()->getUserByLogin($user);
                $v = new View_vue(array("info" => "Vous êtes connecté"));
                $v->combine($this, __FUNCTION__);
            }
            else
            {
                $v = new View_vue(array(
                    "error" => "Mauvais utilisateur/mot de passe",
                    "form" => new FormLogin_form()
                ));
                $v->combine($this, "login");
            }
        }
        catch (Exception $e)
        {
            $v = new View_vue(array(
                "error" => $e->getMessage(),
                "form" => new FormLogin_form()
            ));
            $v->combine($this, "login");
        }
    }

}

?>
