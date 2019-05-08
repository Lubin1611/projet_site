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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/stylePhrases.css">
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
            <li><a id="bloc3" href='index.php?controler=jeux&action=jeu_mots'>Jeu 2</a></li>
            <li><a id="bloc5" href='index.php?controler=jeux&action=quizz'>Jeu 3</a></li>
            <?php

            if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {

                ?>

                <li><a id="bloc4" href='index.php?controler=users&action=vue_espace_membres'>Membres</a></li>

                <?php

            } else if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1) { ?>

                <li><a id="bloc4" href='index.php?controler=users&action=panel_admin'>Admin</a></li>

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


<div id="menuJeu">

    <div class="jumbotron" id="info_start2">
        <h1>Bienvenue sur la page de jeu Find the Code !</h1>
        <p>Le but du jeu est simple : des exemples de mots-clefs vont seront demandés en français, et vous
            devrez les
            restituer en anglais, et respectant l'ordre des lettres.
            Vous pouvez faire un choix dans plusieures matières, comme le html, le css, le javascript ou encore le php.
            Bon jeu !
        <hr class="my-2">
        <div id='contain_buttons' class="d-flex justify-content-around flex-wrap">
            <button class="btn btn-primary" id="jeuHtml">HTML</button>
            <button class="btn btn-primary" id="jeuCss">CSS</button>
            <button class="btn btn-primary" id="jeuJs">Javascript</button>
            <button class="btn btn-primary" id="jeuPhp">PHP</button>
        </div>

    </div>

    <?php
    if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1 || $_SESSION['rang'] == 0) {
        ?>
        <div id="commenter">
            <form action="index.php?controler=jeux&action=comsWords" method="post">
                <label>Commentez :</label><textarea name="contenu_com" id="contenu_com"></textarea>
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
                    <h5 class="mt-0">De : <?= $com->pseudo_user ?>, Date d'émission : <?= $com->date_com ?>
                        <?php if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1) { ?>

                            <a href="index.php?controler=jeux&action=editCom2&id=<?= $com->id_com ?>"><i
                                        class="far fa-edit"></i></a>

                            <a href="index.php?controler=jeux&action=supprCom2&id=<?= $com->id_com ?>"><i
                                        class="far fa-trash-alt"></i></a>

                        <?php } ?>

                    </h5>
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

    </div>

    <div id="boutons">
        <button id="verifier">Vérifiez</button>
        <button id="Retry">Ré-essayer</button>
        <button id="Restart">Recommencer</button>
        <button id="NouvMot">Suivant</button>
    </div>
</div>

<div id='resultats'>

    <div class="jumbotron" id="info_end2">
        <h1>Vous avez totalisé un score de : <span id="resultatjeu"></span></h1>
        <p>Félicitations, vous pouvez recommencer une série de questions</p>
        <hr class="my-2">

        <p class="lead">
            <a class="btn btn-primary" role="button" onclick="recommencer()">Recommencer !</a>
        </p>

        <script src="Js/java.js"></script>
        <script src="Js/java_phrases.js"></script>
</body>
</html>
