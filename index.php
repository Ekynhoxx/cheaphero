<?php
session_start();
try {$bdd = new PDO('mysql:host=localhost;dbname=cheaphero;charset=utf8', 'root', '');}
catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="css/index.css"/>

    <link rel="icon" type="image/png" href="#"/> <!-- Icone de la page -->
    <title></title>
</head>
<body>
<?php
if (!isset($_SESSION['pseudo'])) {?>
    <div id="connexion">
        <h1>Connexion</h1>
        <form method="POST" action="index.php?action=connexion" id="connexion_form">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo"/></br>
            <label for="pseudo">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp"/></br>
            <input type="submit" name="ok" id="ok"/>
        </form>
    </div>
    <div id="inscription">
        <h1>Inscrivez vous</h1>
        <form method="POST" action="index.php?action=inscription" id="inscription_form">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo"/></br>
            <label for="pseudo">E-mail :</label>
            <input type="email" name="mail" id="mail"/></br>
            <label for="pseudo">Age :</label>
            <input type="number" name="age" id="age"/></br>
            <label for="pseudo">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp"/></br>
            <label for="pseudo">Confirmation du mot de passe :</label>
            <input type="password" name="mdpc" id="mdpc"/></br>
            <input type="submit" name="ok" id="ok"/>
        </form>
    </div>
<?php
    if (isset ($_GET['action'])) {
        if ($_GET['action'] == 'connexion') {
            $pseudo = $_POST['pseudo'];
            $mdp = md5($_POST['mdp']) ;

            $pseudo = htmlspecialchars($pseudo);

            $req_connect="SELECT * FROM membre WHERE pseudo= :pseudo AND mdp= :mdp";

            $membre=$bdd->prepare($req_connect);
            $membre -> bindValue('pseudo',$pseudo, PDO::PARAM_STR);
            $membre -> bindValue('mdp',$mdp, PDO::PARAM_STR);
            $membre->execute();

            $m = $membre -> fetch();
            if($m)
	        {
                $_SESSION['pseudo'] = $m['pseudo'];
                $_SESSION['mail'] = $m['mail'];
                $_SESSION['mdp'] = $m['mdp'];
                $_SESSION['age'] = $m['age'];
                $_SESSION['partie'] = $m['partie'];
                $_SESSION['defaite'] = $m['defaite'];
                $_SESSION['score'] = $m['score'];
	        }
	        header ("Location: index.php");
        }
        if ($_GET['action'] == 'inscription') {
            $pseudo= $_POST['pseudo'];
            $mail= $_POST['mail'];
            $age= $_POST['age'];
            $mdp= md5($_POST['mdp']);
            $score= "0";
            $partie= "0";
            $defaite= "0";

            $req='INSERT INTO membre (pseudo, age, score, mail, mdp, partie, defaite)
                  VALUES(:pseudo, :age, :score, :mail, :mdp, :partie, :defaite)';

            $post = $bdd->prepare($req);
            $post ->bindValue('score', $score , PDO::PARAM_INT);
            $post ->bindValue('partie', $partie , PDO::PARAM_INT);
            $post ->bindValue('defaite', $defaite , PDO::PARAM_INT);
            $post ->bindValue('pseudo', $pseudo , PDO::PARAM_STR);
            $post ->bindValue('mail', $mail , PDO::PARAM_STR);
            $post ->bindValue('mdp', $mdp , PDO::PARAM_STR);
            $post ->bindValue('age', $age , PDO::PARAM_STR);
            $inscr = $post ->execute();
        }
    }
}else{
    ?>
    <div class="menu">
        <a href="choix_perso.php">
            <img src="img/histoire.jpg" alt="histoire" class="img"/>
            <div class="titre">
                <p>HISTOIRE</p>
            </div>
        </a>
    </div>
    <div class="menu">
        <a href="#">
            <img src="img/multi.jpg" alt="multi" class="img"/>
            <div class="titre">
                <p>MULTI-JOUEUR</p>
            </div>
        </a>
    </div>
    <div class="menu">
        <a href="#">
            <img src="img/stat.jpg" alt="stat" class="img"/>
            <div class="titre">
                <p>MES STATS</p>
            </div>
        </a>
    </div>
<?php
}
?>

</body>
</html>