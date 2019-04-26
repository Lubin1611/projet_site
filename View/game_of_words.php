<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 11/04/2019
 * Time: 10:18
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="Css/stylePhrases.css">
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <script src="lib/jquery.js"></script>
</head>
<body>

<div id="boutonListe">+</div>

<aside class="menuderoulant">
    <div id="menu">
        <a href="index.php?" id="bloc1">
            <div>Accueil</div>
        </a>
        <a href="index.php?controler=jeux&action=entrainement" id="bloc2">
            <div>Entrainement au vocabulaire Italien</div>
        </a>
        <a href="index.php?controler=jeux&action=jeu_mots" id="bloc3">
            <div>Jeu phrases</div>
        </a>
        <a href="index.php?controler=jeux&action=quizz" id="bloc5">
            <div>Quizz</div>
        </a>
        <?php

        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {

            ?>

            <a href="index.php?controler=users&action=vue_espace_membres" id="bloc4">
                <div>Espace membres</div>
            </a>

            <?php

        } else if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1) { ?>
            <a href="index.php?controler=users&action=panel_admin" id="bloc4">
                <div>Espace admin</div>
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

<div id="menuJeu">

    <div class="jumbotron" id="info_start2">
        <h1 class="display-3">Bienvenue sur la page de jeu Find the Code !</h1>
        <p class="lead">Le but du jeu est simple : des exemples de mots-clefs vont seront demandés en français, et vous
            devrez les
            restituer en anglais, et respectant l'ordre des lettres.
            Vous pouvez faire un choix dans plusieures matières, comme le html, le css, le javascript ou encore le php.
            Bon jeu !
        <hr class="my-2">
        <div id='contain_buttons' class = "d-flex justify-content-around">
                <button class="btn btn-primary btn-lg" id="jeuHtml">HTML</button>
                <button class="btn btn-primary btn-lg" id="jeuCss">CSS</button>
                <button class="btn btn-primary btn-lg" id="jeuJs">Javascript</button>
                <button class="btn btn-primary btn-lg" id="jeuPhp">PHP</button>
            </div>

    </div>


    <div id="commenter">
        <form action="index.php?controler=jeux&action=coms_words" method="post">
            <label>Commentez :</label><textarea name="contenu_com" id="contenu_com"></textarea>
            <input type="submit" value="Envoyez" class="btn btn-primary mb-2" id="btn">
        </form>
    </div>

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


<div id="containerJeu">

    <div id="Question"></div>

    <div id="aleaphrase"></div>
    <div id="message"></div>

    <div id="recupmots">
        <button id="verifier">Vérifiez</button>
    </div>

    <div id="boutons">
        <button id="Retry">Ré-essayer</button>
        <button id="Restart">Recommencer</button>
        <button id="NouvMot">Suivant</button>
    </div>
</div>

<div id='resultats'>

    <div class="jumbotron" id = "info_end2">
        <h1 class="display-3">Vous avez totalisé un score de :  <span id="resultatjeu"></span></h1>
        <p class="lead">Félicitations, vous pouvez recommencer une série de questions</p>
        <hr class="my-2">

        <p class="lead">
            <a class="btn btn-primary btn-lg" role="button" onclick="recommencer()">Recommencer !</a>
        </p>

    <script src="Js/java.js"></script>
    <script src="Js/java_phrases.js"></script>
</body>
</html>
