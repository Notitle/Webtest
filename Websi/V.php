<?php

function head() {
    echo "<!DOCTYPE html>";
    echo "<html lang='fr'>";
    echo "<head>";
    echo "<meta charset='UTF-8' />";
    echo "<title>DataMaze - Leboutte Jerome</title>";
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
    parallax();
    echo "<a href='https://plus.google.com/u/0/109034735526845072800'><img class='google' src='img/google+.png' alt='google+' title='google+'/></a>";
    echo "<a href='https://www.facebook.com/Broshambo'><img class='facebook' src='img/facebook+.png' alt='facebook' title='facebook'/></a>";
    echo "<a href='http://www.linkedin.com/pub/jerome-leboutte/66/6b5/26'><img class='linkedin' src='img/linked+.png' alt='linkedin' title='linkedin'/></a>";
}

function foot() {
    echo "<footer>";

    echo "</div>";
    echo "</footer>";
    echo "</body>";
    echo "</html>";
}

function parallax() {
    ?>
    <a href='?action=0'>
    <div id="Parallax">
        <img class="bot" src="img/para3.png" />
        <img class="mid" src="img/para2.png" />
        <img class="top" src="img/para1.png" />
    </div>
        </a>
    <?php
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

function menu2() {
    echo "<div id='menu2'>";
    echo "<a class='but1' onclick='return createTimedLink(AniTrans, 900);' href='?action=1'><img id='imaj1' title='Me & myslef' src='img/IM1.png' alt='Me'/><img title='Me & Myself' id='imaj11' src='img/IM11.png' alt='Me'/></a><br/><br/><br/><br/>";
    echo "<a class='but2' onclick='return createTimedLink(AniTrans, 900);' href='?action=2'><img id='imaj2' title='Contact' src='img/IM2.png' alt='Contact'/><img title='Contact' id='imaj22' src='img/IM22.png' alt='Contact'/></a><br/><br/><br/><br/>";
    echo "<a class='but3' onclick='return createTimedLink(AniTrans, 900);' href='?action=3'><img id='imaj3' title='Travaux' src='img/IM3.png' alt='Travaux'/><img title='Travaux' id='imaj33' src='img/IM33.png' alt='Travaux'/></a><br/><br/><br/><br/>";
    echo "<a class='but4' onclick='return createTimedLink(AniTrans, 900);' href='?action=4'><img id='imaj4' title='CV' src='img/IM4.png' alt='CV'/><img title='CV' id='imaj44' src='img/IM44.png' alt='CV'/></a>";
    echo "</div>";
}

function introduce() {
    echo "<h3 id='prestitre'>Présentation</h3>";
    echo "<div id='pres'>";
    echo "<div id='presgauche'>";
    echo "<p>Bonjour et bienvenue, visiteur anonyme, sur betaweb.com.</p>";
    echo "<p>Vous pouvez trouver ici mes travaux (achevés ou en construction), mon CV disponnible au téléchargement et de quoi me contacter. Je suis également disponible via LinkedIN/Facebook/Google+.</p>";
    echo "</div>";
    echo "<div id='presmid'>";
    echo "<p>Je m'appelle Jerome Leboutte. Développeur Web Junior, fraîchement formé chez <span class='lien'><a href='http://www.steformations.be/'>STE-Formations</a></span>.</p>";
    echo "<p>Anciennement étudiant dans les sciences à l'ISIL et diplômé en tant qu'assistant en pharmacie, je me suis redirigé vers les internets et plus précisement dans la programmation par passion.<br/> le reste est a completer</p>";
    echo "</div>";
    echo "<div id='presdroit'>";
    echo "<img src='' title='hi there'/>";
    echo "</div>";
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
        <p><span class='formnom'>2013 ~ en cour.</span> <span class='formtitre'>Formation en développement web STE Formations, Université de Liège.</span><br/>
    Apprentissage et mise en pratique des langages de programmation orientés web.</p>
    
    <p><span class='formnom'>Juin ~ Décembre 2012.</span> <span class='formtitre'>E-learning</span><br/>
    Référencement et CSS. Technofutur-TIC.</p>
    
    <p><span class='formnom'>Avril ~ Juin 2012.</span> <span class='formtitre'>Initiation à la programmation
    STE Formations, Université de Liège.</span><br/>
    Introduction aux différents langages de programmation (Java, sql, html, php...)</p>

    <p><span class='formnom'>2010 ~ 2012</span> <span class='formtitre'>Recherche d’emploi et réorientation professionnelle en informatique</span><br/>
    Autoformation</p>
    
    <p><span class='formnom'>2008 ~ 2010</span> <span class='formtitre'>Formation d’assistant pharmaceutico-technique</span></br>
    Diplôme obtenu. Promotion Sociale, Jemeppe.</p>
    
    <p><span class='formnom'>2005 ~ 2008</span> <span class='formtitre'>Biotechnologie à l’ISIL, Liège</span></p>
    
    <p><span class='formnom'>2002 ~ 2005</span> <span class='formtitre'>CESS en biotechnologie</span>
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
    $erreur[3] = "<span id='erreur'>Captcha incorrecte</span>";
    $erreur[4] = "<span id='victory'>Mail envoyé, merci.</span>";

    echo "<div id='contact'>";
    echo "<h3 id='atts'>Contact</h3><br/><br/><br/>";
    echo "<form method=post action='?action=5'>";
    echo "<label for='nom'>Nom :</label><input type='text' name='nom' id='nom' value='" . $nom . "'/><br />";
    echo "<label for='prenom'>Prénom :</label><input type='text' name='prenom' id='prenom' value='" . $prenom . "'/><br />";
    echo "<label for='mail'>Adresse mail :</label><input type='mail' name='mail' id='mail' value='" . $mail . "'/><br />";
    echo "<label for='contenu'>Contenu :</label><textarea id='contenu' name='contenu' rows='4' cols='16'>" . $contenu . "</textarea><br />";
    ?>
    <label for='captcha'>Code :</label><input id='captcha' type="text" name="wsp_code"/><br/>
 
    <div>
        <script type="text/javascript" src="http://webspamprotect.com/captcha/5746/"></script>
        <noscript>This form protected by <a href="http://webspamprotect.com" target="_blank" title="Web form spam protection">WebSpamProtect</a>. JavaScript must be enabled in your browser to view this image.
        </noscript>
    </div>
    <br/>

    <?php
    echo "<input type='submit' value='Envoyer'>";
    echo "</form>";

    echo $erreur[$boom];
    echo "</div>";
}

function view_add_comment($id,$boom) {
    
    $erreur[0] = "";
    $erreur[1] = "<span id='erreur2'>Champs manquant</span>";
    $erreur[2] = "<span id='erreur2'>Adresse mail incorrecte</span>";
    $erreur[3] = "<span id='erreur2'>Captcha incorrecte</span>";
    $erreur[4] = "<span id='victory2'>Commentaire ajouté, merci.</span>";
    
    echo "<div id='ajoudroit' class='tra'>";
    echo "<span id='spacom'>Ajouter un commentaire</span><br/><br/>";
    echo "<form method=post action='?action=6'>";
    echo "<label for='nom'>Nom :</label><input type='text' name='nom' id='nom' value=''/><br />";
    echo "<label for='mail'>Adresse mail :</label><input type='mail' name='mail' id='mail' value=''/><br />";
    echo "<label for='contenu'>Contenu :</label><textarea id='contenu' name='contenu' rows='4' cols='16'></textarea><br />";
    echo "<input type='hidden' name='id' value='" . $id . "'>";
    ?>
     <label for='captcha'>Code :</label><input id='captcha' type="text" name="wsp_code"/><br/>
 
    <div>
        <script type="text/javascript" src="http://webspamprotect.com/captcha/5746/"></script>
        <noscript>This form protected by <a href="http://webspamprotect.com" target="_blank" title="Web form spam protection">WebSpamProtect</a>. JavaScript must be enabled in your browser to view this image.
        </noscript>
    </div>
    <br/>
    <?php
    echo "<input type='submit' value='Envoyer'><br/><br/>";
        echo $erreur[$boom];
    echo "</form>";

    echo "</div>";

    echo "<br/>";
}
?>


