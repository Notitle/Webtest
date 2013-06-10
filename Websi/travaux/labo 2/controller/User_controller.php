<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_controller
 *
 * @author loic&sarah
 */
class User_controller extends Abs_controller implements Controller_interface {

    public function defaultAction() {

        switch (Application::getCurrUser()->getGroup()->getId()) {
            case 1:
                $this->userHome();
                break;
            case 2:
                echo "Vous etes responsable";
                break;
            case 3:
                $this->adminHome();
                break;
            default:
                $c = new Connexion_controller();
                $c->login();
                break;
        }
    }

    public function adminHome() {
        $view = new View_vue(array(
            
            "taskList"=>  Application::getCurrUser()->getTasks()
            ));
        $view->combine($this, __FUNCTION__);
    }
    
    public function viewuser(){
        $view = new View_vue(array(
            "userList"=> Application::getDAOFactory()->getUserDao()->getUserList()
        ));
        $view->combine($this, __FUNCTION__);
    }

    public function details($params) {
        $login = isset($params[0]) ? $params[0] : 1;
        $det = Application::getDAOFactory()->getUserDao()->getUserByLogin($login);
        $v = new View_vue(array("det" => $det));
        $v->combine($this, __FUNCTION__);
    }
    
    public function update($params)
    {
        $login = isset($params[0]) ? $params[0] : 1;
        $mod_user= Application::getDAOFactory()->getUserDao()->getUserByLogin($login);
        $group_user = Application::getDAOFactory()->getGroupDao()->getGroupList();
        $v = new View_vue(array(
            "user" => $mod_user,
            "group" => $group_user));
        $v->combine($this, __FUNCTION__);
    }
    
    public function update_check($params = null) {
        try {
            Form_manager::validateForm(new UpdateUser_form($params[0]));
            $login = $this->getPostArray["use_login"];
            $firstname = $this->getPostArray["use_firstname"];
            $lastname = $this->getPostArray["use_lastname"];
            $email = $this->getPostArray["use_email"];
            $password = $this->getPostArray["use_password"];
            
            $parent = $this->getPostArray["use_fk_group"];
            $logini = $this->getPostArray["use_login"];

            $category = Application::getDAOFactory()->getUserDao()->getUserByLogin($logini);
            $category->setParentCategory($parent);
            $category->setName($login);
            $category->setName($firstname);
            $category->setName($lastname);
            $category->setName($email);
            $category->setName($password);
            
            $category->save();

            $vue = new View_vue(array(
                "form" => new UpdateUser_form($logini),
                "info" => "L'utilisateur a bien été ajouté"
            ));
            $vue->combine($this, "update");
        } catch (Exception $e) {
            $vue = new View_vue(array(
                "form" => new UpdateUser_form($logini),
                "error" => $e->getMessage()
            ));
            $vue->combine($this, "update");
        }
    }

    public function respHome() {
        $view = new View_vue(array());
        $view->combine($this, __FUNCTION__);
    }

    public function userHome() {
        $view = new View_vue(array());
        $view->combine($this, __FUNCTION__);
    }

    public function __toString() {
        return "User";
    }

    public function add() {
        $vue = new View_vue(array("form" => new AddUser_form()));
        $vue->combine($this, __FUNCTION__);
    }

    public function add_check() {
        try {
            Form_manager::validateForm(new AddUser_form());
            $login=$this->getPostArray["use_login"];
            $prenom=$this->getPostArray["use_firstname"];
            $nom=$this->getPostArray["use_lastname"];
            $email=$this->getPostArray["use_email"];
            $password=$this->getPostArray["use_password"];
            $groupe_parent=$this->getPostArray["use_fk_group"];
            
            $newUser=new Utilisateur_metier($login, $prenom, $nom, $email, $password, false, $groupe_parent);
            $newUser->save();
            
            $vue=new View_vue(array("form"=>new AddUser_form(),"info"=>"L'utilisateur a bien été ajouté"));
            $vue->combine($this, "add");
        } catch (Exception $e) {
            $vue=new View_vue(array("form"=>new AddUser_form(),"error"=>$e->getMessage()));
            $vue->combine($this, "add");
        }
    }
    
    public function disconnect()
    {
        session_destroy();
        $v = new View_vue(array());
        $v->combine($this,__FUNCTION__);
    }
    

}
?>





