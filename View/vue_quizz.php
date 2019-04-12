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
</head>
<body>
<div id="boutonListe">+</div>

<aside class="menuderoulant">
    <div id="menu">
        <a href="index.php?" id="bloc1">
            <div>Accueil</div>
        </a>
        <a href="index.php?controler=redirections&action=entrainement" id="bloc2">
            <div>Entrainement au vocabulaire Italien</div>
        </a>
        <a href="index.php?controler=redirections&action=jeu_mots" id="bloc3">
            <div>Jeu phrases</div>
        </a>
        <a href="index.php?controler=redirections&action=quizz" id="bloc5">
            <div>Quizz</div>
        </a>

        <?php

        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {

            ?>

            <a href="index.php?page=membres" id="bloc4">
                <div>Espace membres</div>
            </a>

            <?php

        } else {

            ?>
            <?php
        }
        ?>
    </div>
</aside>

<div id="titre">
    <h1>Accueil site</h1>
    <div id="connection">

        <?php

        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {

            ?>
            <p>Bienvenue, <?php echo $_SESSION['nom']; ?>&nbsp;<?php $_SESSION['prenom']; ?></p>
            <p>vous pouvez désormais accéder à votre espace membre a partir du menu</p>
            <a href="index.php?controler=users&action=log_out">Se déconnecter</a>

            <?php

        } else {
            ?>

            <h3>Connectez-vous</h3>

            <form action="index.php?controler=users&action=connection" method="post">
                <label>Votre Pseudo : </label><input type="text" name="logPseudo">
                <label>Votre mot de passe : </label><input type="text" name="logMdp">
                <input type="submit" name="Connectez-vous"><br><br>
            </form>
            <a href="index.php?controler=users&action=vue_inscription">Inscrivez-vous ici</a>

            <?php
        }
        ?>

    </div>
</div>


<div id="container_qcm">

    <!--<span id="titre_quizz">Quizz</span>-->

    <div id="container_quiz">


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


        <div id="score" class="styleScore"></div>
        <div id="explications_score" class="styleScore"></div>

    </div>
</div>
<script src="Js/quizz.js"></script>
<script src="Js/java.js"></script>
</body>
</html>
