<?php
function connexion(){
	function connexion_PDO() {
		static $connexion;
		if (!isset ($connexion)) {
			$utilisateur ="root";
			$motdepasse="kornrok";
			$serveur= "mysql:host=localhost;dbname=labo1";
			$connexion = new PDO ($serveur,$utilisateur,$motdepasse);
		 	$connexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$requete="SET NAMES utf8";
			$resultat= $connexion->exec($requete);
 	  	}
 	  	return ($connexion);
 	}
} 
?>
