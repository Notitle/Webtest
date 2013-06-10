<?php

include_once ('V.php');
include_once ('M.php');
head();
testheader();
connexion();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (!in_array($action, array('0', '1', '2','3','4','5','6'))) {
        $action = 0;           //erreur
    }
} else {
    $action = 0;
}

switch ($action) {
    case 0:
        menu();
        labels();
        break;
    case 1:
        menu2();
        introduce();
        break;
    case 2:
        menu2();
        contact($nom="", $prenom="", $mail="", $contenu="", $boom=0);
        break;
    case 3:
        menu2();
        list_travaux();
        break;
    case 4:
        CV();
        menu2();
        cat();
        break;
    case 5:
        menu2();
        maili($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['contenu']);
        break;
    case 6:
        menu2();
        add_comment($_POST['nom'],$_POST['mail'],$_POST['contenu'],$_POST['id']);
        list_travaux();
        break;
            
};