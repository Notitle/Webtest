window.onload=function(){
console.log("rdy");
	document.forms[0].ok.onclick=function(){
		var colors =new Array("red","yellow","cyan","magenta","Lime ","blue");	//plutot que d'aller chercher des couleurs dans un form[] de l'html, je créé 
																				//un tableau ici avec des couleurs prédéfinies
				
		for(var i=0; i<document.forms[0].ch1.value;i++){
			for(var j=0;j<document.forms[0].ch2.value;j++){						//double boucle pour creer la grille où iront les couleurs
				
				var alea=colors[Math.floor(Math.random() * (colors.length))];	//variable "alea" qui récupere la valeur d'une case du tableau créé plus haut, 
																			    //avec un random pour l'indice de la case, il en ressort un string (hohoho) d'une couleur
				
				var id = "L"+i+"C"+j;											//variable qui créé l'ID d'une case de la grille, comme un simple tableau, avec un indice i et j
				
				document.getElementById("jeu").innerHTML+="<span class=\"\" id=\""+id+"\"></span>";	//dans mon html le <div> où ira se placer la grille à comme ID : "jeu"
																									//l'instruction dit : dans le <div id="jeu"> je rajoute de l'html !(+= pour "ajouter" et pas "ecraser")
																									//l'html ajouté est un <span> et on lui donne comme ID : la variable créée au dessus qui indique
																									//sa place dans la grille	
																									
				document.getElementById(id).setAttribute("class",alea)			//ici je selectionne un element qui a comme ID : id (c'est a dire : LiCj) 
																				//et je change son attribut "class" dans laquelle je met la valeur récupérée par 
																				//le random line10 (dans mon css j'ai 6classes une pour chaque couleurs)
																				
				// console.log(alea);												//rien d'important il m'affiche juste la valeur de 'alea'
				
			
			};																	//fin de la boucle de la line
			document.getElementById("jeu").innerHTML+="<br/>"					//retour a la line
		};																		//fin des boucles
		
		document.getElementById("jeu").innerHTML+="<div id=\"bouton_conteneur\"></div>"	//eeeuh je sais plus, je regarderais plus tard
		
		
		var txt="<br/>";														//variable dans laquelle on met plein de code sous forme de "texte" ici ca commence
																				//par un retour a line (juste pour faire un peu despace entre ma grille et mes boutons
																				
		txt+="<form name=\"formulaire\"><input type='button' class='boutonr' name='red' value='red'  >";	//à la suite du code du dessus (<br/>) on ajoute (grace a +=)
																											//un début de form <form ..> qu'on appelle formulaire ET
																											//un premier bouton de nom 'red' et valeur 'red' (le nom de la 
																											//valeur est important il sera réutiliser pour changer la classe
																											//du premier bouton
		txt+="<input type='button' class='boutony' name='yellow' value='yellow' >";							//on ajoute a la suite, tjs dans la même variable, un second bouton
		txt+="<input type='button' class='boutonm' name='magenta' value='magenta' >";						//3ieme bouton
		txt+="<br/>"																						//retour a la line pour plus de clarté
		txt+="<input type='button' class='boutonc' name='cyan' value='cyan' >";								//...
		txt+="<input type='button' class='boutonl' name='Lime ' value='Lime ' >";
		txt+="<input type='button' class='boutonn' name='blue' value='blue' ></form>";						//dernier bouton et la fin de formulaire qui conclue la grosse 
																											//variable TXT
		
		document.getElementById("jeu").innerHTML+=txt;							//instruction qui ajoute un code html contenant la variable TXT DANS le <div> 'jeu'
		
		for (i=0;i<colors.length;i++){											
			document.formulaire[i].onclick=change;								//instruction qui appelle la fonction 'change' quand on clique sur un
																				//des boutons du formulaire (boucle pour le parcourir)
																				//en gros : on clique, il parcour le formulaire quon a créé juste au dessus pour trouver 
																				//le bouton et applique la fonction change dessus
		};
	};
	
};
function change(){																//fonction "change" qui a pour but de modifier la couleur du 1er <span> dans la grille
	console.log(this);															//simple appel du bouton sur lequel on a cliqué pour avoir les détails dans la console
	
	var coul=this.value;														//pareil mais juste la 'value' du bouton, comme javais dit line 39
	
	//document.getElementById("L0C0").setAttribute("class",coul);					//va chercher le premier carré en haut a gauche c'est a dire celui qui aura l'ID L0C0
																				//et change sa classe par la valeur du bouton sur lequel on a cliqué !
	changecarre(document.getElementById("L0C0"),coul);
};


function changecarre(carre,coul){
		// console.log("debut",carre,coul)
		var Prems=carre.getAttribute("class")
		carre.setAttribute("class",coul);
		
		var tmp = carre.id.match(/^L(\d+)C(\d+)$/)
		var line= Number(tmp[1])
		var col =Number(tmp[2])
	    console.log("fin",coul,Prems,"L"+(line+1)+"C"+col)
		
		if (col<(document.forms[0].ch2.value)-1) { 
			if (document.getElementById("L"+line+"C"+(col+1)).className==Prems){					
				changecarre(document.getElementById("L"+line+"C"+(col+1)),coul);
			};
		};
		
		if (line<(document.forms[0].ch1.value)-1){
			if(document.getElementById("L"+(line+1)+"C"+col).className==Prems){						
				changecarre(document.getElementById("L"+(line+1)+"C"+col),coul);
			};
		};
		
		if (col>0) {
			if (document.getElementById("L"+line+"C"+(col-1)).className==Prems){						
				changecarre(document.getElementById("L"+line+"C"+(col-1)),coul);
			};
		};
		
		if (line>0){
			if (document.getElementById("L"+(line-1)+"C"+col).className==Prems){						
				changecarre(document.getElementById("L"+(line-1)+"C"+col),coul);
			};
		};
};

	

