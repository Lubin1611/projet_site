<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 12/03/2019
 * Time: 17:56
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="lib/jquery.js"></script>
</head>
<body>

<div class="container">


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
        <h1>Page d'accueil</h1>
        <div id="connection">

            <?php
            if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {
                ?>

                <p>Bienvenue, <?php echo $_SESSION['nom'];
                    echo $_SESSION['prenom']; echo $_SESSION['pseudo'];?></p>
                <p>Id de session : <?php echo $_SESSION['id']; ?></p>
                <p>vous pouvez désormais accéder à votre espace personnel a partir du menu</p>
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


    <div class="containerActu">

        <h2>Actualités</h2>

        <div id=infos>
            <div class="logo">
                <i class="fas fa-arrow-circle-right"></i>
                <a href="https://www.lastampa.it/" target="_blank">
                    <img src="Ressources/logoStampa.jpg"/>
                </a>
            </div>
            <span class="description">Actualités en direct de la Stampa.</span>
        </div>

        <div id=infos2>
            <div class="logo">
                <i class="fas fa-arrow-circle-right"></i>
                <a href="http://www.reverso.net/text_translation.aspx?lang=FR" target="_blank">
                    <img src="Ressources/reverso.PNG"/>
                </a>
            </div>
            <span class="description">Site de reverso pour aider à la traduction.</span>
        </div>
    </div>

</div>

<script src="Js/java.js"></script>
</body>
</html>