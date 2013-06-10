<?php

function connexion() {

    function connexion_PDO() {
        static $connexion;
        if (!isset($connexion)) {
            $utilisateur = "datamazeallin";
            $motdepasse = "wnBU9XGg";
            $serveur = "mysql:host=mysql51-88.perso;dbname=datamazeallin";
            $connexion = new PDO($serveur, $utilisateur, $motdepasse);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = "SET NAMES utf8";
            $resultat = $connexion->exec($requete);
        }
        return ($connexion);
    }

}

function maili($nom, $prenom, $mail, $contenu) {

    if ((isset($nom) && $nom !== "") && (isset($mail) && $mail !== "") && (isset($contenu) && $contenu !== "")) {

        if (preg_match("/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/", $mail) === 0) {
            $boom = 2;
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
            $boom = 3;
            contact($nom, $prenom, $mail, $contenu, $boom);
        }
    } else {
        $boom = 1;
        contact($nom, $prenom, $mail, $contenu, $boom);
    }
}

function list_travaux() {

    try {
        $c = connexion_PDO();
        $requete = "SELECT * from site_travaux";
        $resultat = $c->query($requete);
        echo "<h3 id='atts'>Travaux : </h3>";
        echo "<div id='travi'>";
        while ($row = $resultat->fetch(PDO::FETCH_OBJ)) {
            echo "<span>" . $row->tra_nom . "</span><br/>";
            echo "<img src='" . $row->tra_img . "' alt='travaux' title='" . $row->tra_nom . "'/><br/>";
            echo "<span>description:</span><br/>";
            echo "<span>" . $row->tra_description  . "</span><br/>";
            echo "<a href='" . $row->tra_url . "'><img src='http://www.datamaze.be/img/GO1.png'/></a><br/>";
            
            echo "<a href='#' onClick='view_comment($row->tra_nom);'><img src='http://www.datamaze.be/img/COMM1.png'></a>";
            
        }
        echo "</div>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function view_comment($nom){
    try {
        $c = connexion_PDO();
        $requete =$c->prepare("SELECT * from site_comment where com_fk_tra like :a");
        $requete->execute(array (":a"=>$nom));
        echo "<h3>Liste des commentaires : </h3>";
        while ($row = $requete->fetch(PDO::FETCH_OBJ)) {
            echo "<span>" . $row->com_aut . "</span><br/>";
            echo "<span>" . $row->com_mail . "</span><br/><br/>";
            echo "<span>" . $row->com_text . "</span>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
