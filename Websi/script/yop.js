$(document).ready(function() {
    open();
    window.onresize = canovas;
    window.onload = canovas;

    var tabCOL = new Array();
    tabCOL[0] = "";
    var borderWIDTH = 10;
    var miniborderWIDTH = 5;
    var link = "";
    var act = 0;
    var cpt = 0;
    var loc = "";

    for (var j = 1; j < 5; j++) {
        var boxWIDTH = 100;
        var boxHEIGHT = 100;
        var boxCOLOR = 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + 0.65 + ')';
        tabCOL[j] = boxCOLOR;

        $('#Circ' + j).css({
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

    $('#Ico1,#Ico2,#Ico3,#Ico4,#imache11,#imache22,#imache33,#imache44,.googleback,.linkedBack,.facebookback,#contain1,#contain2,label,#formations,#atouts').hide();

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
        link = "Travaux";
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
    $(".google").hover(function() {
        $(".googleback").fadeIn();

    }, function() {
        $(".googleback").fadeOut();
    });
    $(".linkedin").hover(function() {
        $(".linkedback").fadeIn();

    }, function() {
        $(".linkedback").fadeOut();
    });
    $(".google").hover(function() {
        $(".googleback").fadeIn();

    }, function() {
        $(".googleback").fadeOut();
    });

    function Switch() {
        cpt = cpt + 1;
        if (cpt % 2 !== 0) {
            $(".label1").css({
                "top": "+100%"});
            $(".label2").css({
                "top": "-100%"});
            $(".label2").html("<a id='pwet' onclick='return createTimedLink(this, AniTrans, 900);' href='?action=" + act + "'>" + link + "</a>");
        } else {
            $(".label1").css({
                "top": "+0%"});
            $(".label1").html("<a id='pwet' onclick='return createTimedLink(this, AniTrans, 900);' href='?action=" + act + "'>" + link + "</a>");
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
    }
    
    $("#objec").click(function() {
        d3.select("svg").remove();
        $("#objectifs").fadeIn();
        $("#contain1,#contain2,#formations,#atouts,label").fadeOut();
    });
    $("#forma").click(function() {
        d3.select("svg").remove();
        $("#formations").fadeIn();
        $("#contain1,#contain2,#objectifs,#atouts,label").fadeOut();
    });
    $("#ati").click(function() {
        d3.select("svg").remove();
        loc = "tsv/Languages.tsv";
        $("#atouts").fadeIn();
        $("#contain2,#objectifs,#formations,#contain1,label").fadeOut();

    });
    $("#langui").click(function() {
        d3.select("svg").remove();
        loc = "tsv/Languages.tsv";
        BarChart(loc);
        $("#contain1,label").fadeIn();
        $("#contain2,#objectifs,#formations,#atouts").fadeOut();

    });
    $("#appli").click(function() {
        d3.select("svg").remove();
        loc = "tsv/Log.tsv";
        BarChart(loc);
        $("#contain2,label").fadeIn();
        $("#contain1,#objectifs,#formations,#atouts").fadeOut();
    });

    function open() {
        $("#trans").addClass('animat2');
    }



    function BarChart(loc) {
        var margin = {top: 20, right: 20, bottom: 30, left: 40},
        width = 700 - margin.left - margin.right,
                height = 300 - margin.top - margin.bottom;

        var formatLVL = d3.format(".0%");
        var x = d3.scale.ordinal()
                .rangeRoundBands([0, width], .1, 1);

        var y = d3.scale.linear()
                .range([height, 0]);

        var xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom");

        var yAxis = d3.svg.axis()
                .scale(y)
                .orient("left")
                .tickFormat(formatLVL);

        var svg = d3.select("body").append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


        d3.tsv(loc, function(error, data) {
            var j = 0;
            data.forEach(function(d) {
                d.Niveau = +d.Niveau;
            });

            x.domain(data.map(function(d) {
                return d.Lang;
            }));
            y.domain([0, d3.max(data, function(d) {
                    return d.Niveau;
                })]);

            svg.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + height + ")")
                    .call(xAxis);

            svg.append("g")
                    .attr("class", "y axis")
                    .call(yAxis)
                    .append("text")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", ".71em")
                    .style("text-anchor", "end")
                    .text("Niveau");

            svg.selectAll(".bar")
                    .data(data)
                    .enter().append("rect")
                    .attr("class", "bar")
                    .attr("x", function(d) {
                return x(d.Lang);


            })
                    .attr("width", x.rangeBand())
                    .attr("y", function(d) {
                return y(d.Niveau);
            })
                    .attr("height", function(d) {
                return height - y(d.Niveau);
            });

            d3.select("input").on("change", change);

            //incrementation des id

            d3.selectAll(".bar").attr("id", function(d, i) {
                return "barlos" + i;
            });

            //query pour les 
            var o=1;
            var boxiCOLOR = 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + o + ')';
            //recuperer la valeur de chaque barre pour etablir une opacite en fct de la taille et non juste décroissante.
            d3.selectAll('.bar').each(function(d,i) { 
                
                o=o-0.06;
                d3.select(this).style("fill", boxiCOLOR).style("opacity",o); 
                
            });
            
//            d3.select(".bar").style("fill", "red");

            var sortTimeout = setTimeout(function() {
                d3.select("input").property("unchecked", true).each(change);
            }, 500);

            function change() {
                clearTimeout(sortTimeout);


                var x0 = x.domain(data.sort(this.checked
                        ? function(a, b) {
                    return b.Niveau - a.Niveau;
                }
                : function(a, b) {
                    return d3.ascending(a.Lang, b.Lang);
                })
                        .map(function(d) {
                    return d.Lang;
                }))
                        .copy();

                var transition = svg.transition().duration(600),
                        delay = function(d, i) {
                    return i * 50;
                };

                transition.selectAll(".bar")
                        .delay(delay)
                        .attr("x", function(d) {
                    return x0(d.Lang);
                });

                transition.select(".x.axis")
                        .call(xAxis)
                        .selectAll("g")
                        .delay(delay);
            }

        });

    }
$("a").click(function(){
    console.log("plop");
    setTimeout(function(){window.location.href='test.de/#thankyou';}, 10000); 
})
//fin onload
});

function createTimedLink(element, callback, timeout) {

    setTimeout(function() {
        callback(element);
    }, timeout);
    return false;
}

function AniTrans() {

    $('#trans').toggleClass("animat2", false);
    $('#trans').addClass('animat');

    var dest = $('#pwet').attr('href');
    if (typeof(dest) !== "undefined" && dest !== "") {

        setTimeout(function() {
            window.location.href = dest;
        }, 1200);
    }
    console.log(dest);

}

function createTimedLink2(element, callback, timeout) {

    setTimeout(function() {
        callback(element);
    }, timeout);
    return false;
}

function AniTrans() {

    $('#trans').toggleClass("animat2", false);
    $('#trans').addClass('animat');

    var dest = $('#pwet').attr('href');
    if (typeof(dest) !== "undefined" && dest !== "") {

        setTimeout(function() {
            window.location.href = dest;
        }, 1200);
    }
    console.log(dest);

}
