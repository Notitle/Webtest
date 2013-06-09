<?php

include_once ('V.php');
include_once ('M.php');
head();
testheader();



if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (!in_array($action, array('0', '1', '2','3','4'))) {
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
    case 4:
        CV();
        menu2();
        cat();
        break;
};
