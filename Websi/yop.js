$(document).ready(function() {

    window.onresize = canovas;
    window.onload = canovas;



    var tabCOL = new Array();
    tabCOL[0] = "";
    var borderWIDTH = 10;
    var miniborderWIDTH = 5;
    var link = "";
    var act = 0;
    var timeout;
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

    $('#Ico1,#Ico2,#Ico3,#Ico4').hide();

    $("#Circ1").hover(function() {
        link = "Me & Myself";
        act = 1;
        Switch();
        Rename();
        $("#Ico1").fadeIn();

    }, function() {
        $("#Ico1").fadeOut();
    });
    $("#Circ2").hover(function() {
        link = "Contact";
        $("#Ico2").fadeIn();
        act = 2;
        Switch();
        Rename();
    }, function() {
        $("#Ico2").fadeOut();
    });
    $("#Circ3").hover(function() {
        link = "Traveaux";
        act = 3;
        $("#Ico3").fadeIn();
        Switch();
        Rename();
    }, function() {
        $("#Ico3").fadeOut();
    });
    $("#Circ4").hover(function() {
        link = "CV";
        act = 4;
        $("#Ico4").fadeIn();
        Switch();
        Rename();
    }, function() {
        $("#Ico4").fadeOut();
    });


    function Switch() {
        cpt = cpt + 1;
        console.log(cpt);
        if (cpt % 2 !== 0) {
            $(".label1").css({
                "top": "+100%"});
            $(".label2").css({
                "top": "-100%"});
            $(".label2").html("<a class='links' href='?action=" + act + "'>" + link + "</a>");
        } else {
            $(".label1").css({
                "top": "+0%"});
            $(".label1").html("<a class='links' href='?action=" + act + "'>" + link + "</a>");
            $(".label2").css({
                "top": "-0%"});

        }
    }

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
        
        context.fillStyle = "#FFFFFF";
        context.moveTo(0, 0);
        context.lineTo(0, 200);
        context.lineTo(CanWidth, 150);
        context.lineTo(CanWidth, 0);
        context.closePath();
        context.strokeStyle = '#ffffff';
        context.stroke();
        context.fill();

        context.moveTo(0, CanHeight);
        context.lineTo(0, CanHeight - 150);
        context.lineTo(CanWidth, CanHeight - 200);
        context.lineTo(CanWidth, CanHeight);
        context.closePath();
        context.strokeStyle = '#ffffff';
        context.stroke();
        context.fill();
        console.log(window.outerWidth);
    }






$("a").click(function(e) {
        e.preventDefault();
        timeout = setTimeout(function() {
            $("#transi").css({
                "z-index": "9999",
                "transition": "width 0.5s",
                "-webkit-transition": "width 0.5s",
                "width": window.innerWidth
            });
        }, 500);
    },
            function() {

            timeout = setTimeout(function() {
            $("#transi").css({
                "z-index": "9999",
                "transition": "width 0.5s",
                "-webkit-transition": "width 0.5s",
                "width": 0
            });
        }, 900);  });

});