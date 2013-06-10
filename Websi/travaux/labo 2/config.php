<?php

$config = array(
    "PATH" => array(
        "base" => __DIR__,
        "model" => "model",
        "vue" => "view",
        "controller" => "controller",
        "exception" => "model/Exceptions",
        "interface" => "model/Interfaces",
        "validateur" => "model/Validateurs",
        "utils" => "utils",
        "manager" =>"model/Manager",
        "DAO" => "model/DAO",
        "metier" => "model/Metiers",
        "factory" => "model/Factories",
        "form" => "model/Formulaires",
        "manager" => "model/Manager",
        "domain" => "labo2.nylgraphics.be"
    ),
    "DB" => array(
        "HOST" => "mysql51-88.perso",
        "USER" => "datamazeallin",
        "PWD" => "wnBU9XGg",
        "DB" => "datamazeallin"
    ),
    "MVC" => array(
        "default_controller" => "User_controller",
        "default_action" => "main",
        "ViewTag" => array(
            "menuAdmin" => "layout/Menus/menuAdmin.phtml",
            "loginForm" => "layout/Formulaires/loginForm.phtml"
            
        )
    )
);
?>
