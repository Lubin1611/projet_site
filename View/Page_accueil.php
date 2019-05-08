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

    <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="lib/jquery.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
</head>
<body>

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
                        <a href="index.php?controler=users&action=deconnection">Se déconnecter</a>

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
                        <a href="index.php?controler=users&action=vueInscription">Inscrivez-vous ici</a>
                    </div>
                </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
    </header>


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