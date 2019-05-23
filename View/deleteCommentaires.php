<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 07/05/2019
 * Time: 23:06
 */

if ($_SESSION['rang'] === NULL and $_SESSION['rang'] != 1) {

    header('Location:View/acces_interdit.html');

} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Votre site de révisions</title>
        <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
              crossorigin="anonymous">
        <script src="lib/jquery.js"></script>
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="Css/stylr.css">
        <link rel="stylesheet" type="text/css" href="Css/styledeletecom.css">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
    </head>
    <body>

    <header>
        <div id='container_btn'>
            <div id="btn_menu">Menu</div>
        </div>
        <div id = 'box_titre'>
            <div id='titre_site'>
                <h1>Page d'accueil</h1>
            </div>
            <div id="connection">
                <?php
                if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {
                    ?>

                    <p>Bienvenue, <?php echo $_SESSION['nom'];
                        echo $_SESSION['prenom']; ?>
                    </p>
                    <a href="index.php?controler=users&action=deconnection">Se déconnecter</a>
                    <?php
                } else {
                ?>
                <div id='redir_connect'>
                    <a href="index.php?controler=users&action=vueConnection">Connectez-vous</a>
                </div>
                <div id="redir_signup">
                    <a href="index.php?controler=users&action=vueInscription">Inscrivez-vous ici</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </header>

    <div class="container_page">
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

                    <li><a id="bloc4" href='index.php?controler=users&action=panelAdmin'>Menu Admin</a></li>

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

    <h1>Etes vous sur de vouloir supprimer le commentaire ? </h1>

    <div class="media">
        <img class="d-flex mr-3" src=<?= $commentaire['avatar'] ?>>
        <div class="media-body">
            <h5 class="mt-0">De :  <?= $commentaire['id_users'] ?>, Date d'émission :<?= $commentaire['date_com'] ?> </h5>
            <?= $commentaire['contenu_com'] ?>
        </div>
    </div>
    <div id ="control_btn">
    <a href="index.php?controler=jeux&action=confirmSuppr2&id=<?= $commentaire['id_com'] ?>">Oui</a>
    <a href="index.php?controler=jeux&action=jeuMots">Non</a> (retour a la page d'accueil du jeu)
    </div>
    </div>

    <script src="Js/java.js"></script>
    </body>
    </html>

    <?php
}