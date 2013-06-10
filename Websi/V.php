<?php

function head() {
    echo "<!DOCTYPE html>";
    echo "<html lang='fr'>";
    echo "<head>";
    echo "<meta charset='UTF-8' />";
    echo "<title>SUPAWEB - Leboutte Jerome</title>";
    echo "<meta name='description' content='Site personnel de Leboutte Jerome. Developpeur Web junior.'/>";
    echo "<meta name='author' content='Leboutte Jerome' />";
    echo "<meta name='Googlebot' content='nosnippet,noarchive, notranslate' />";
    echo "<meta name='viewport' content='width=device-width'>";
    echo "<meta name='keyword' content='Leboutte, leboutte, Jerome, jerome, Jérôme, jérôme, site personnel, site perso, STE, STE-formations, Developpeur, Developppeur Web, développeur web, web developer' />";
    echo "<meta name='viewport' content='initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />";

    echo "<meta property='og:title' content='Datamaze' />";
    echo "<meta property='og:type' content='website' />";
    echo "<meta property='og:url' content='http://www.datamaze.be/' />";
    echo "<meta property='og:image' content='http://www.datamaze.be/img/???' />";
    echo "<meta property='og:site_name' content='Datamaze' />";
    echo "<meta property='fb:admins' content='598636367' />";

    echo "<link rel='icon' href='http://???/images/favicon.ico' type='image/x-icon' />";
    echo "<link rel='stylesheet' media='screen' href='css/pwet.css' type='text/css' />";
    echo "<script src='script/jquery-1.9.1.js'></script>";
    echo "<script src='script/yop.js'></script>";
    echo "<script src='script/d3.js'></script>";
    echo "</head>";
    echo "<body>";
    echo "<div id='trans'></div>";
    echo "<img class='googleback' src='img/google.png' alt='googleBack' title='googleback'/>";
    echo "<a href='https://plus.google.com/u/0/109034735526845072800'><img class='google' src='img/google+.png' alt='google+' title='google+'/></a>";
    echo "<img class='facebookback' src='img/facebook.png' alt='facebookback' title='facebookback'/>";
    echo "<a href='https://www.facebook.com/Broshambo'><img class='facebook' src='img/facebook+.png' alt='facebook' title='facebook'/></a>";
    echo "<img class='linkedBack' src='img/linked.png' alt='linkedBack' title='linkedBack'/>";
    echo "<a href='http://www.linkedin.com/pub/jerome-leboutte/66/6b5/26'><img class='linkedin' src='img/linked+.png' alt='linkedin' title='linkedin'/></a>";
}

function foot() {
    echo "<footer>";

    echo "</div>";
    echo "</footer>";
    echo "</body>";
    echo "</html>";
}

function menu() {
    create();
    labels();
}

function create() {
    for ($i = 1; $i < 5; $i++) {
        echo "<div id=Circ" . $i . ">";
        echo "<img class='icones' id='imache" . $i . "' src='img/IM" . $i . ".png' alt='pwet'/>";
        echo "<a onclick='return createTimedLink(AniTrans, 900);' href='?action=" . $i . "'><img class='icones' id='imache" . $i . "" . $i . "' src='img/IM" . $i . "" . $i . ".png' alt='pwet' /></a>";
        echo "<div id=Ico" . $i . ">";
        echo "</div>";
        echo "</div>";
    }
}

function labels() {
    echo "<div class='button'>";
    echo "<span id='One' class='label1'></span>";
    echo "<span id='Two' class='label2'></span>";
    echo "</div>";
}

function testheader() {
    echo "<canvas id = 'HCanvas'";
    echo "style = 'border:0px none;'>";
    echo "</canvas>";
}

function introduce() {
    echo "<div id='pres'>";
    echo "<h3>Présentation</h3>";
    echo "<p>Bonjour et bienvenu, visiteur anonyme, sur betaweb.com.</p>";
    echo "<p>Vous pouvez trouver ici mes travaux (achevés ou en construction), mon CV disponnible au téléchargement et de quoi me contacter. Je suis également disponible via LinkedIN/Facebook/Google+.</p>";
    echo "<p>Je m'appelle Jerome Leboutte. Développeur Web Junior, fraîchement formé chez <span class='lien'><a href='http://www.steformations.be/'>STE-Formations</a></span>.</p>";
    echo "<p>Anciennement étudiant dans les sciences à l'ISIL et diplômé en tant qu'assistant en pharmacie, je me suis redirigé vers les internets et plus précisement dans la programmation par passion.<br/> le reste est a completer</p>";
    echo "</div>";
}

function menu2() {
    echo "<div id='menu2'>";
    echo "<a class='but1' onclick='return createTimedLink(AniTrans, 900);' href='?action=1'><img id='imaj1' src='img/IM1.png' alt='Me'/><img id='imaj11' src='img/IM11.png' alt='Me'/></a><br/><br/><br/><br/>";
    echo "<a class='but2' onclick='return createTimedLink(AniTrans, 900);' href='?action=2'><img id='imaj2' src='img/IM2.png' alt='Contact'/><img id='imaj22' src='img/IM22.png' alt='Contact'/></a><br/><br/><br/><br/>";
    echo "<a class='but3' onclick='return createTimedLink(AniTrans, 900);' href='?action=3'><img id='imaj3' src='img/IM3.png' alt='Travaux'/><img id='imaj33' src='img/IM33.png' alt='Travaux'/></a><br/><br/><br/><br/>";
    echo "<a class='but4' onclick='return createTimedLink(AniTrans, 900);' href='?action=4'><img id='imaj4' src='img/IM4.png' alt='CV'/><img id='imaj44' src='img/IM44.png' alt='CV'/></a>";
    echo "</div>";
}

function CV() {
    echo "<label id='checkbox'><input type='checkbox'>Trier les valeurs</label>";
    echo "<div id='contain1'>";
    echo "<h3 id='langTit'>Languages</h3>";

    echo "</div>";
    Objectifs();
    Formations();
    Atouts();
    echo "<div id='contain2'>";
    echo "<h3 id='langTit'>Applications</h3>";
    echo "</div>";
}

function cat() {
    echo "<div id='cats'>";
    echo "<ul>";
    echo "<li id='objec'>Objectifs</li>";
    echo "<li id='forma'>Formations</li>";
    echo "<li id='langui'>Languages</li>";
    echo "<li id='appli'>Applications ~ Logiciels de gestion</li>";
    echo "<li id='ati'>Atouts ~ Loisirs ~ Langues</li>";
    echo "</ul>";
    echo "</div>";
}

function Objectifs() {
    echo "<div id='objectifs'>";
    echo "<h3 id='langTit'>Objectifs</h3>";
    echo "<span id='objecti'>Fort d'une formation qualifiante en Développement Web, 
        <br/>je souhaite aujourd'hui professionnaliser mes compétences au service d'une entreprise active 
        dans le secteur web en tant que programmeur internet.</span>";
    echo "</div>";
}

function Formations() {
    echo "<div id='formations'>";
    echo "<h3 id='langTit'>Formations</h3>";
    echo "<div id='objecti'>
        <p>2013 ~ en cour Formation en développement web STE Formations, Université de Liège.<br/>
    Apprentissage et mise en pratique des langages de programmation orientés web.</p>
    
    <p>Juin ~ Décembre 2012 E-learning<br/>
    Référencement et CSS. Technofutur-TIC.</p>
    
    <p>Avril ~ Juin 2012 Initiation à la programmation
STE Formations, Université de Liège.<br/>
Introduction aux différents langages de programmation (Java, sql, html, php...)</p>

<p>2010 ~ 2012 Recherche d’emploi et réorientation professionnelle en informatique
Autoformation</p>
<p>2008 ~ 2010 Formation d’assistant pharmaceutico-technique</p>
Diplôme obtenu. Promotion Sociale, Jemeppe.</p>
<p>2005 ~ 2008 Biotechnologie à l’ISIL, Liège</p>
<p>2002 ~ 2005 CESS en biotechnologie
École secondaire IPEA La Reid.</p></div>";
    echo "</div>";
}

function Atouts() {
    echo "<div id='atouts'>";

    echo " <h3 id='atts'>Atouts</h3><br/><br/>
        <p>Rigueur Respect des échéances/ délais<br/>
        Expérience avec le contact client <br/>
        Respect des règles et des procédures</p> 
            
        <h3 id='lois'>Loisirs</h3><br/>
        <p>Interet pour les nouvelles technologies <br/>
        Jeux [consoles, pc, table]</p>
        
        <h3 id='langs'>Langues</h3>  <br/>  
            <p>Anglais ~ Bon niveau (ecrit / parlé)<br/>
            Français ~ Langue maternelle</p>";

    echo "</div>";
}

function contact($nom, $prenom, $mail, $contenu, $boom) {
    
    $erreur[0] = "";
    $erreur[1] = "<span id='erreur'>Champs manquant</span>";
    $erreur[2] = "<span id='erreur'>Adresse mail incorrecte</span>";
    $erreur[3] = "<span id='victory'>Mail envoyé, merci.</span>";
    
    echo "<div id='contact'>";
    echo "<h3 id='atts'>Contact</h3><br/><br/><br/>";
    echo "<form method=post action='?action=5'>";
    echo "<label for='nom'>Nom :</label><input type='text' name='nom' id='nom' value='" . $nom . "'/><br />";
    echo "<label for='prenom'>Prénom :</label><input type='text' name='prenom' id='prenom' value='" . $prenom . "'/><br />";
    echo "<label for='mail'>Adresse mail :</label><input type='mail' name='mail' id='mail' value='" . $mail . "'/><br />";
    echo "<label for='contenu'>Contenu :</label><textarea id='contenu' name='contenu' rows='4' cols='16'>" . $contenu . "</textarea><br />";
    echo "<input type='submit' value='Envoyer'>";
    echo "</form>";
    
    echo $erreur[$boom];
    echo "</div>";
    
    
}

?>


