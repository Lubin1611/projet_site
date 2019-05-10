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
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <script src="lib/jquery.js"></script>

</head>
<body>
<div class="menu">
    <div id="sidebar">
        <ul>
            <li><a id="bloc1" href='index.php?'>Accueil</a></li>
            <li><a id="bloc2" href='index.php?controler=jeux&action=entrainement'>Jeu 1</a></li>
            <li><a id="bloc3" href='index.php?controler=jeux&action=jeuMots'>Jeu 2</a></li>
            <li><a id="bloc5" href='index.php?controler=jeux&action=quizz'>Jeu 3</a></li>
            <?php

            if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {

                ?>

                <li><a id="bloc4" href='index.php?controler=users&action=espaceMembres'>Membres</a></li>

                <?php

            } else if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1) { ?>

                <li><a id="bloc4" href='index.php?controler=users&action=panelAdmin'>Admin</a></li>

                <?php
            } else {
                ?>

                <?php
            }
            ?>
        </ul>
    </div>
    <div><a id="btn">X</a></div>
</div>


<header class="d-flex">
    <div id="first-level">
        <div id='container_btn'>
            <div id="btn_menu">Menu</div>
        </div>
        <div id='titre_site'>
            <h1>Page d'accueil</h1>
            <div id="connection">

                <?php
                if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {
                    ?>

                    <p>Bienvenue, <?php echo $_SESSION['nom'];
                        echo $_SESSION['prenom'];?>
                    </p>
                    <p>Id de session : <?php echo $_SESSION['id']; ?></p>
                    <p>vous pouvez désormais accéder à votre espace personnel a partir du menu</p>
                    <a href="index.php?controler=users&action=log_out">Se déconnecter</a>

                    <?php
                } else {
                ?>
                <form action="index.php?controler=users&action=connection" method="post">
                    <label>Votre pseudo : </label>
                    <input type="text" name="logPseudo" id='pseudo'>

                    <label>Votre mot de passe : </label>
                    <input type="password" name="logMdp" id='password'>
                    <input type="submit" name="Envoyez" id='envoyez'>
                </form>
                <div id="btn_submit">
                    <a href="index.php?controler=users&action=vue_inscription">Inscrivez-vous ici</a>
                </div>
            </div>

            <?php
            }
            ?>

        </div>
    </div>
</header>

<div id="accueil_jeu">
    <div class="jumbotron" id="info_start">
        <h1>Bienvenue sur votre espace de revision !</h1>
        <p class="prez">Dans ce jeu, vous devez simplement traduire en francais le mot anglais generé aleatoirement.</p>
        <hr class="my-2">
        <p>Vous jouez par série de 10 questions, et vous avez votre score a la fin de chaque série.</p>
        <p>Plus vous répondez, et plus vous marquez des points, alors faites péter votre high-score !</p>
        <p class="lead">
            <a class="btn btn-primary mb-2" id="start" role="button">Commencez !</a>
        </p>
    </div>

    <?php
    if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1 || $_SESSION['rang'] == 0) {
    ?>

    <div id="commenter">
        <form action="index.php?controler=jeux&action=comsRevisions" method="post">
            <label><b>Section commentaires</b></label>
            <input class="form-control" type="text" name="contenu_com" id="contenu_com">
            <input type="submit" value="Envoyez" class="btn btn-primary mb-2" id="btn_com">
        </form>
    </div>

        <?php
    } else {
        ?>
        <div class="alert alert-info">Connectez-vous pour écrire un commentaire</div>
        <?php
    }

    ?>

    <div id="commentaires">

        <?php foreach ($commentaires as $com) { ?>

            <div class="media" id="affichage_commentaires">
                <img class="d-flex mr-3" src=<?= $com->avatar ?>>
                <div class="media-body">
                    <h5 class="mt-0">De : <?= $com->pseudo_user ?>, Date d'émission : <?= $com->date_com ?></h5>
                    <?= $com->contenu_com ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<div id ='dim'>


    <div id="container_questions">

        <div id='box_questions'>

            <div id="questions"></div>

            <div id="note_serie"><span id='bonsPts'></span></div>

        </div>

        <div id="placementJeu">
            <label for="champUtilisateur"> Ecris ta réponse : </label>
            <input type="text" placeholder="Ta réponse ici ..." id="champUtilisateur" class="tailleBouton"/>
            <button id="bouton" class="tailleBouton" onclick="boutonReponse()">Envoyer la réponse</button>
        </div>

        <div id="reponse"></div>


        <div id="highScore">

            <?php if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1 || $_SESSION['rang'] == 0){ ?>

                <?= $highscore['score'] ?>


            <?php } else { ?>

                no high score

            <?php } ?>

        </div>
    </div>
</div>


<div id="fin_serie">
    <div class="jumbotron" id="info_end">
        <h1> Félicitations ! vous avez fini une série de 10 questions !</h1>
        <p><span>Vous avez un score de :</span>&nbsp;<span id="resultat_quest"></span></p>
        <span id ='info'></span>
        <hr class="my-2">
        <p>Pour voir le classement, </p><input type="button" id = 'table_membres' value="cliquez ici">
        <div id = "affichage_classement">

            <h1>Classement</h1>

        <div id='classement'>
            <div id='nom'></div>
            <div id='score'></div>
        </div>

            <a class="btn btn-primary btn-lg" role="button" onclick="recommencer()">Recommencer !</a>
    </div>

    <script src="Js/javavoca.js"></script>
    <script src="Js/java.js"></script>
</body>
</html>

