<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 19/04/2019
 * Time: 09:47
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entraine-toi a l'italien</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <script src="lib/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Federant|Lobster" rel="stylesheet">
</head>
<body>



<div id="boutonListe">+</div>

<aside class="menuderoulant">
    <div id="menu">
        <a href = "index.php?" id="bloc1"><div>Accueil</div></a>
        <a href ="index.php?controler=jeux&action=entrainement"  id="bloc2"><div>Entrainement au vocabulaire Italien</div></a>
        <a href ="index.php?controler=jeux&action=jeu_mots"  id="bloc3"><div>Jeu phrases</div></a>

        <?php

        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {

            ?>

            <a href ="index.php?page=membres"  id="bloc4"><div>Espace membres</div></a>

            <?php

        } else {

            ?>
            <?php
        }
        ?>
    </div>
</aside>

<div id = "titre">
    <h1>Accueil site</h1>
    <div id = "connection">

        <?php

        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {

            ?>
            <p>Bienvenue, <?php echo $_SESSION['nom'];?>&nbsp;<?php $_SESSION['prenom'];?></p>
            <p>vous pouvez désormais accéder à votre espace membre a partir du menu</p>
            <a href="index.php?controler=users&action=log_out">Se déconnecter</a>

            <?php

        } else {
            ?>

            <h3>Connectez-vous</h3>

            <form action="index.php?controler=users&action=connection" method="post">
                <label>Votre Pseudo : </label><input type = "text" name = "logPseudo">
                <label>Votre mot de passe : </label><input type = "text" name = "logMdp">
                <input type="submit" name="Connectez-vous"><br><br>
            </form>
            <a href="index.php?controler=users&action=vue_inscription">Inscrivez-vous ici</a>

            <?php
        }
        ?>

    </div>
</div>

<div id="accueil_jeu">
    <h1>Bienvenue sur votre espace de revision !</h1>
    <p>Dans ce jeu, vous devez simplement traduire en francais le mot anglais generé aleatoirement</p>
    <p>Vous jouez par série de 10 questions, et vous avez votre score a la fin de chaque série.</p>
    <p>Plus vous répondez, et plus vous marquez des points, alors faites péter votre high-score !</p>

    <div id ="start">Commencez !</div>

    <div id="commenter">
        <form action="index.php?controler=jeux&action=coms_revisions" method="post">
            <label>Commentez :</label><textarea name="contenu_com" id="contenu_com"></textarea>
            <input type="submit" value="Envoyez" class="btn btn-primary mb-2" id="btn">
        </form>
    </div>

    <div id = "commentaires">

        <?php foreach ($commentaires as $com) { ?>

            <h5>De : <?= $com->pseudo_user ?>, Date d'émission : <?= $com->date_com ?></h5>

            <div id="contenu_commentaire"><?= $com->contenu_com ?></div>

        <?php } ?>
    </div>
</div>


<div id="container_questions">

    <div id = "questions"></div>

    <div id = "placementJeu">
        <label for = "champUtilisateur"> Ecris ta réponse : </label>
        <input type="text" placeholder="Ta réponse ici ..." id = "champUtilisateur" class="tailleBouton"/>
        <button id = "bouton" class="tailleBouton" onclick="boutonReponse()">Envoyer la réponse</button>
    </div>

    <div id = "reponse"></div>
    <div id = "nextButton"></div>

    <div id = "note_serie"><span id = bonsPts ></span></div>
    <div id = "highScore"><?php echo $highscore['score'] ?></div>

</div>

<div id = "fin_serie">
    Félicitations ! vous avez fini une série de 10 questions !
    <span>Vous avez un score de :</span><span id = "resultat_quest"></span>

    <h1>Classement</h1>

    <span id = id_joueur></span>
    <span id = resultat_joueur></span>

    <span>Recommencer une serie de questions ? </span><span onclick="recommencer()">Cliquez ici</span>
</div>

<script src="Js/javavoca.js"></script>
<script src="Js/java.js"></script>
</body>
</html>
