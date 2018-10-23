/* Personnages */

var Char = new Array(); 

Char[1]new Object();
Char[1].nom = "Ranok la Musclée";
Char[1].attaque = 30;
Char[1].pointdevie = 100;

Char[2] = new Object();
Char[2].nom = "Jean_Kevin_Le_Libraire";
Char[2].attaque = 15;
Char[2].pointdevie = 120;

/* Monstres */

var Monstre = new Array();
Monstre[1] = new Object();
Monstre[1].attaque  = 10;
Monstre[1].pointdevie = 40;

Monstre[2] = new Object();
Monstre[2].attaque = 20;
Monstre[2].pointdevie = 50;

Monstre[3] = new Object();
Monstre[3].attaque = 15;
Monstre[3].pointdevie = 45;

Monstre[4] = new Object();
Monstre[4].attaque = 25;
Monstre[4].pointdevie = 50;

Monstre[5] = new Object();
Monstre[5].nom = "Houdini le pas gentil"
Monstre[5].attaque = 30;
Monstre[5].pointdevie = 60;


/* --------------------------------------------------------------------------------------------------------------------*/


/* Joueur choisi*/

function joueur_choisi(){
	personnage = $_GET['perso'];
	return personnage;
}


/*Fonction de combat entre le joueur et un monstre */

 function combat(joueur, adversaire) {
 	adversaire = Monstre[1];
 	joueur = function joueur_choisi();

 	if 	(joueur.pointdevie === 0); {
 		return console.log('Vous êtes mort')};
 	

 	if  (adversaire.pointdevie === 0){
 		return console.log('Félicitations, l\'adversaire est mort dans d\'atroces souffrance!');
 	};

 	else {
 			adversaire.pointdevie == adversaire.pointdevie - function player_dice();
 			joueur.pointdevie == joueur.pointdevie - function monster_dice();
 	};

};

/* Jet de dé pour joueur et monstre */

function player_dice(){
joueur = function joueur_choisi();
let atk = joueur.attaque; 
let degats = Math.floor((Math.random()*atk)+1);
return degats;
}

function monster_dice(attaque) {
/* monstre du fight en cours */
let atk = Monstre.attaque; 
let degats = Math.floor((Math.random()*atk)+1);
return degats;
}

/*Fonction de rencontre entre le joueur et un pnj, choix A = succès, Choix B = Décès*/
function rencontre(joueur, pnj){

};



