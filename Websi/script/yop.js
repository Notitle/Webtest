$(document).ready(function() {

    window.onresize = canovas;
    window.onload = canovas;

    console.log()

    var tabCOL = new Array();
    tabCOL[0] = "";
    var borderWIDTH = 10;
    var miniborderWIDTH = 5;
    var link = "";
    var act = 0;
    var cpt = 0;
    

    for (var j = 1; j < 5; j++) {
        var boxWIDTH = 100;
        var boxHEIGHT = 100;
        var boxCOLOR = 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + 0.65 + ')';
        tabCOL[j] = boxCOLOR;
        $('#Circ' + j).css({/*"background-color": boxCOLOR,*/
            "width": boxWIDTH,
            "height": boxHEIGHT,
            "text-align": "center",
            "position": "absolute",
            "border-radius": "50%",
            "border-width": borderWIDTH,
            "border-color": tabCOL[j],
            "border-style": "solid",
            "display": "inline-block",
            "top": "50%",
            "margin": -((boxHEIGHT += borderWIDTH) / 2) + "px 0 0 " + -((boxWIDTH += borderWIDTH) / 2) + "px"
        });

        $('#Ico' + j).css({
            "width": boxWIDTH - borderWIDTH * 2,
            "height": boxHEIGHT - borderWIDTH * 2,
            "text-align": "center",
            "display": "inline-block",
            "background-color": boxCOLOR,
            "border-radius": "50%",
            "border-width": miniborderWIDTH,
            "border-color": "white",
            "border-style": "solid"
        });

        if (j === 1) {
            $('#Circ' + j).css({
                "top": "30%"
            });
        }
        ;
        if (j === 2) {
            $('#Circ' + j).css({
                "top": "70%"
            });
        }
        ;
        if (j === 3) {
            $('#Circ' + j).css({
                "left": "30%"
            });
        }
        ;
        if (j === 4) {
            $('#Circ' + j).css({
                "left": "70%"
            });
        }
        ;
    }
    ;
    $('.plan').css({
        "margin": -((40) / 2) + "px 0 0 " + -((90) / 2) + "px",
        "display": "inline-block",
        "top": "50%"
    });

    $('#Ico1,#Ico2,#Ico3,#Ico4,#imache11,#imache22,#imache33,#imache44').hide();

    $("#Circ1").hover(function() {
        link = "Me & Myself";
        act = 1;
        Switch();
        Rename();
        $("#Ico1").fadeIn();
        $("#imache11").fadeIn();
        $("#imache1").fadeOut();

    }, function() {
        $("#Ico1").fadeOut();
        $("#imache11").fadeOut();
        $("#imache1").fadeIn();
    });
    $("#Circ2").hover(function() {
        link = "Contact";
        act = 2;
        Switch();
        Rename();
        $("#Ico2").fadeIn();
        $("#imache22").fadeIn();
        $("#imache2").fadeOut();
    }, function() {
        $("#Ico2").fadeOut();
        $("#imache22").fadeOut();
        $("#imache2").fadeIn();
    });
    $("#Circ3").hover(function() {
        link = "Traveaux";
        act = 3;
        Switch();
        Rename();
        $("#Ico3").fadeIn();
        $("#imache33").fadeIn();
        $("#imache3").fadeOut();
    }, function() {
        $("#Ico3").fadeOut();
        $("#imache33").fadeOut();
        $("#imache3").fadeIn();
    });
    $("#Circ4").hover(function() {
        link = "CV";
        act = 4;
        Switch();
        Rename();
        $("#Ico4").fadeIn();
        $("#imache44").fadeIn();
        $("#imache4").fadeOut();
    }, function() {
        $("#Ico4").fadeOut();
        $("#imache44").fadeOut();
        $("#imache4").fadeIn();
    });


    function Switch() {
        cpt = cpt + 1;
        if (cpt % 2 !== 0) {
            $(".label1").css({
                "top": "+100%"});
            $(".label2").css({
                "top": "-100%"});
            $(".label2").html("<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=" + act + "'>" + link + "</a>");
        } else {
            $(".label1").css({
                "top": "+0%"});
            $(".label1").html("<a onclick='return createTimedLink(this, AniTrans, 900);' href='?action=" + act + "'>" + link + "</a>");
            $(".label2").css({
                "top": "-0%"});
        }
    }
//////////////////////////////////////////////////////////
////////////////////





















//////////////////////////////////////
    function Rename() {

        if (cpt % 2 !== 0) {
            $("#One").toggleClass(false);
            $("#Two").toggleClass(false);
            $("#One").toggleClass("label2", true);
            $("#Two").toggleClass("label1", true);
        } else {
            $("#Two").toggleClass(false);
            $("#One").toggleClass(false);
            $("#Two").toggleClass("label2", true);
            $("#One").toggleClass("label1", true);
        }

    }

    function canovas() {
        var canvas = document.getElementById('HCanvas');
        var context = canvas.getContext('2d');
        var CanWidth = window.innerWidth;
        var CanHeight = window.innerHeight;
        canvas.className = "canivas";
        canvas.width = CanWidth;
        canvas.height = CanHeight;
        context.fillStyle = "#ffffff";
        
        context.moveTo(0, 0);
        context.lineTo(0, 200);
        context.lineTo(CanWidth, 150);
        context.lineTo(CanWidth, 0);
        context.closePath();
        
        context.moveTo(0, CanHeight);
        context.lineTo(0, CanHeight - 150);
        context.lineTo(CanWidth, CanHeight - 200);
        context.lineTo(CanWidth, CanHeight);
        context.closePath();
        context.fill();
        
        open();
    }

});

function createTimedLink(element, callback, timeout){
    console.log(element);
  setTimeout( function(){callback(element);}, timeout);
  return false;
}

function AniTrans() { 
  
        $('#trans').toggleClass("animat2",false);
        $('#trans').addClass('animat');
        
        var dest = $("a").attr('href');
        if (typeof(dest) !== "undefined" && dest !== "") {
            
            setTimeout(function(){window.location.href = dest;}, 1200);
        }
        
 }

function open(){
    $("#trans").addClass('animat2');
    
}