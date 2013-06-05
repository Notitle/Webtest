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
    echo "<meta name='viewport' content='width=device-width'>"; //This tells the browser to assume that the page is as wide as the device
    echo "<meta name='keyword' content='Leboutte, leboutte, Jerome, jerome, Jérôme, jérôme, site personnel, site perso, STE, STE-formations, Developpeur, Developppeur Web, développeur web, web developer' />";
    echo "<meta name='viewport' content='initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />";

    echo "<meta property='og:title' content='???' />";
    echo "<meta property='og:type' content='website' />";
    echo "<meta property='og:url' content='???' />";
    echo "<meta property='og:image' content='http://???/images/???' />";
    echo "<meta property='og:site_name' content='???' />";
    echo "<meta property='fb:admins' content='598636367' />";
    
    echo "<link rel='icon' href='http://???/images/favicon.ico' type='image/x-icon' />";
    echo "<link rel='stylesheet' media='screen' href='css/pwet.css' type='text/css' />";
    echo "<script src='script/jquery-1.9.1.js'></script>";
    echo "<script src='script/yop.js'></script>";
    echo "</head>";
    echo "<body>";
    echo "<div id='trans'></div>";
    echo "<img class='googleback' src='img/google.png' alt='googleBack' title='googleback'/>";
    echo "<a href='https://plus.google.com/u/0/109034735526845072800'><img class='google' src='img/google+.png' alt='google+' title='google+'/></a>";
    echo "<img class='facebookback' src='img/facebook.png' alt='facebookback' title='facebookback'/>";
    echo "<a href='https://plus.google.com/u/0/109034735526845072800'><img class='facebook' src='img/facebook+.png' alt='facebook' title='facebook'/></a>";
    echo "<img class='linkedBack' src='img/linked.png' alt='linkedBack' title='linkedBack'/>";
    echo "<a href='https://plus.google.com/u/0/109034735526845072800'><img class='linkedin' src='img/linked+.png' alt='linkedin' title='linkedin'/></a>";
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
        echo "<img class='icones' id='imache".$i."' src='img/IM" . $i . ".png' alt='pwet'/>";
        echo "<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=".$i."'><img class='icones' id='imache".$i."".$i."' src='img/IM" . $i . "" . $i . ".png' alt='pwet' /></a>";
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

function introduce(){
    echo "<div id='pres'>";
    echo "<h3>Présentation</h3>";
    echo "<p>Bonjour et bienvenu, visiteur anonyme, sur betaweb.com.</p>";
    echo "<p>Vous pouvez trouver ici mes traveaux (achevés ou en construction), mon CV disponnible au téléchargement et de quoi me contacter. Je suis également disponible via LinkedIN/Facebook/Google+.</p>";
    echo "<p>Je m'appelle Jerome Leboutte. Développeur Web Junior, fraîchement formé chez <span class='lien'><a href='http://www.steformations.be/'>STE-Formations</a></span>.</p>";
    echo "<p>Anciennement étudiant dans les sciences à l'ISIL et diplômé en tant qu'assistant en pharmacie, je me suis redirigé vers les internets et plus précisement dans la programmation par passion.<br/> le reste est a completer</p>";
    echo "</div>";
}
function menu2(){
    echo "<div id='menu2'>";
    echo "<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=1'><img src='img/IM1.png' alt='Me'/></a><br/><br/>";
    echo "<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=2'><img src='img/IM2.png' alt='Contact'/></a><br/><br/>";
    echo "<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=3'><img src='img/IM3.png' alt='Traveaux'/></a><br/><br/>";
    echo "<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=4'><img src='img/IM4.png' alt='CV'/></a>";
    echo "</div>";
}
?>


