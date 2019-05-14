<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 12/04/2019
 * Time: 13:48
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="lib/jquery.js"></script>
    <link rel="stylesheet" href="Css/style_quizz.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
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


<header class="d-flex flex-wrap">
    <div id="first-level">
        <div id='container_btn'>
            <div id="btn_menu">Menu</div>
        </div>
        <div id='titre_site'>
            <h1>Page d'accueil</h1>

        </div>
    </div>
    <div id="connection">

        <?php
        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {
            ?>

            <p>Bienvenue, <?php echo $_SESSION['nom'];
                echo $_SESSION['prenom'];
                echo $_SESSION['pseudo']; ?></p>
            <p>Id de session : <?php echo $_SESSION['id']; ?></p>
            <p>vous pouvez désormais accéder à votre espace personnel a partir du menu</p>
            <a href="index.php?controler=users&action=log_out">Se déconnecter</a>

            <?php
        } else {
            ?>
            <form action="index.php?controler=users&action=connection" method="post">
                <div id='groupe'>
                    <div>
                        <label>Votre pseudo : </label>
                        <input type="text" name="logPseudo" id='pseudo'>
                    </div>
                    <div>
                        <label>Votre mot de passe : </label>
                        <input type="password" name="logMdp" id='password'>
                    </div>
                </div>

                <div id="voyez">
                    <input type="submit" class="btn btn-primary mb-2" name="Envoyez" id='envoyez'>
                </div>
            </form>
            <div id="btn_submit">
                <a href="index.php?controler=users&action=vue_inscription">Inscrivez-vous ici</a>
            </div>
            <?php
        }
        ?>

    </div>

</header>

<div id = 'accueil_quizz'>

    <div class="jumbotron" id="info_start3">
        <h1>Bienvenue sur le quizz, vous aurez une serie de 10 questions !</h1>
        <p>A la fin de cette serie, vous pourrez sauvegarder vos scores, et un nouveau quizz sera généré aleatoirement,
        et vos resultats seront sauvegardés. Bon jeu !
        <hr class="my-2">
        <p>
            <a class="btn btn-primary btn-lg" id ="commencer" role="button">Commencez !</a>
        </p>
    </div>


    <?php
    if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1 || $_SESSION['rang'] == 0) {
    ?>
    <div id="commenter">
        <form action="index.php?controler=jeux&action=comsQuizz&table=<?php echo 'quiz' ?>" method="post">
            <label>Commentez :</label><textarea name="contenu_com" id="contenu_com"></textarea>
            <input type="submit" value="Envoyez" class="btn btn-primary mb-2">
        </form>
    </div>
        <?php
    } else {
        ?>
        <div class="alert alert-info">Connectez-vous pour écrire un commentaire</div>
        <?php
    }
    ?>

    <div id = "commentaires">

        <?php foreach ($commentaires as $com) { ?>

            <div class="media" id="affichage_commentaires">
                <img class="d-flex mr-3" src=<?= $com->avatar ?> >
                <div class="media-body">
                    <h5 class="mt-0">De : <?= $com->pseudo_user ?>, Date d'émission : <?= $com->date_com ?></h5>
                    <?= $com->contenu_com ?>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

    <div id="container_quiz">
       <!-- <span id = 'message_erreur'></span> -->
        <span id="questions"></span>

        <div id="container_reponses">
            <div class="container">
                <div class="row" id = "choix">
                    <div class="col" id="reponse1">Column</div>
                    <div class="col" id="reponse2">Column</div>
                    <div class="w-100"></div>
                    <div class="col" id="reponse3">Column</div>
                    <div class="col" id="reponse4">Column</div>
                </div>
            </div>
        </div>
    </div>


    <div id="container_scores">

        <div id="score" class="styleScore">

        </div>


        <span>Recommencer une serie de questions ? </span><span onclick="recommencer()">Cliquez ici</span>

        <div id="explications_score" class="styleScore"></div>


    </div>

<script src="Js/quizz.js"></script>
<script src="Js/java.js"></script>
</body>
</html>
