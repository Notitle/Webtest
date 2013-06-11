<?php

function connexion() {

    function connexion_PDO() {
        static $connexion;
        if (!isset($connexion)) {
            $utilisateur = "datamazeallin";
            $motdepasse = "wnBU9XGg";
            $serveur = "mysql:host=mysql51-88.perso;dbname=datamazeallin";
//            $utilisateur = "root";
//            $motdepasse = "kornrok";
//            $serveur = "mysql:host=localhost;dbname=site";
            $connexion = new PDO($serveur, $utilisateur, $motdepasse);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = "SET NAMES utf8";
            $resultat = $connexion->exec($requete);
        }
        return ($connexion);
    }

}

function maili($nom, $prenom, $mail, $contenu) {
    include_once("script/wsp_captcha.php");
    if ((isset($nom) && $nom !== "") && (isset($mail) && $mail !== "") && (isset($contenu) && $contenu !== "")) {


        if (preg_match("/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/", $mail) === 0) {
            $boom = 2;
            contact($nom, $prenom, $mail, $contenu, $boom);
        } else if (WSP_CheckImageCode() != "OK") {
            $boom = 3;
            contact($nom, $prenom, $mail, $contenu, $boom);
        } else {
            $name = htmlentities($nom);
            $firstname = htmlentities($prenom);
            $email = htmlentities($mail);
            $inside = htmlentities($contenu);
            $msg = '';
            $msg .= "Nom:\t" . $firstname . "" . $name . "\n";
            $msg .= "E-Mail:\t" . $email . "\n";
            $msg .= "Content:\t" . $inside . "\n";
            $destinataire = "jerome.leboutte@gmail.com";
            $objets = "Mail from datamaze";
            mail($destinataire, $objets, $msg);
            $boom = 4;
            contact($nom, $prenom, $mail, $contenu, $boom);
        }
    } else {
        $boom = 1;
        contact($nom, $prenom, $mail, $contenu, $boom);
    }
}

function list_travaux($boom) {

    try {
        $c = connexion_PDO();
        $requete = "SELECT * from site_travaux order by tra_id";
        $resultat = $c->query($requete);
        echo "<h3 id='titri'>Travaux : </h3>";
        echo "<div id='travi'>";

        while ($row = $resultat->fetch(PDO::FETCH_OBJ)) {
            echo "<div id='travgauche' class='tra'>";
            echo "<span id='spacom'>" . $row->tra_nom . "</span><br/><br/>";
            echo "<img src='" . $row->tra_img . "' alt='travaux' title='" . $row->tra_nom . "'/><br/><br/>";
            echo "<span id='spacom'>Description:</span><br/><br/>";
            echo "<span>" . $row->tra_description . "</span><br/><br/>";
            echo "<a href='" . $row->tra_url . "'><img src='http://www.datamaze.be/img/GO1.png'/></a><br/>";
            echo "</div>";

            view_comment($row->tra_nom);
            view_add_comment($row->tra_nom, $boom);
        }
        echo "</div>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function view_comment($nom) {
    try {
        $c = connexion_PDO();
        $requete = $c->prepare("SELECT * from site_comment where com_fk_tra like :a");
        $requete->execute(array(":a" => $nom));

        echo "<div id='commid' class='tra'>";
        echo "<span id='spacom'>Commentaires : </span><br/><br/>";
        while ($row = $requete->fetch(PDO::FETCH_OBJ)) {
            echo "<span>De :" . $row->com_aut . "</span><br/><br/>";
            echo "<span>" . $row->com_text . "</span><br/><br/>";
        }
        echo "</div>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function add_comment($nom, $mail, $contenu, $id) {
    include_once("script/wsp_captcha.php");

    if ((isset($nom) && $nom !== "") && (isset($contenu) && $contenu !== "")) {
        if ($mail !== "" && preg_match("/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/", $mail) === 0) {
            $boom = 2;
            list_travaux($boom);
        } else if (WSP_CheckImageCode() != "OK") {
            $boom = 3;
            list_travaux($boom);
        } else {
            $nomi = htmlentities($nom);
            $maili = htmlentities($mail);
            $contenui = htmlentities($contenu);
            $idi = htmlentities($id);
            try {
                $c = connexion_PDO();
                $requete = $c->prepare("INSERT into site_comment (com_aut, com_mail, com_text, com_fk_tra) VALUES (:a, :b ,:c, :d)");
                $requete->execute(array(
                    ":a" => $nomi,
                    ":b" => $maili,
                    ":c" => $contenui,
                    ":d" => $idi));
                $boom = 4;
                list_travaux($boom);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            $destinataire="jerome.leboutte@gmail.com";
            $objets="nouveau commentaire sur le travail : " . $idi;
            $msg=$contenui;
            mail($destinataire, $objets, $msg);
        }
    } else {
        $boom = 1;
        list_travaux($boom);
    }
}

?>
