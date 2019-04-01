<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 12/03/2019
 * Time: 17:56
 */
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet"  type="text/css" href="Css/stylr.css">
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
            <a href = "index.php?page=redirect" id="bloc1"><div>Accueil</div></a>
            <a href ="index.php?page=training"  id="bloc2"><div>Entrainement au vocabulaire Italien</div></a>
            <a href ="index.php?page=jeu"  id="bloc3"><div>Jeu phrases</div></a>

            <?php

            if (isset($_SESSION['admin']) == 1) {

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
        <h1>Page d'accueil</h1>
        <div id = "connection">

            <?php

            if (isset($_SESSION['admin']) == 1) {

                ?>

                <p>Bienvenue, <?php echo $_SESSION['nom']; echo $_SESSION['prenom'];?></p>
                <p>vous pouvez désormais accéder à votre espace membre a partir du menu</p>
                <a href="index.php?page=logout">Se déconnecter</a>

                <?php

            } else {

                ?>

                <h3>Connectez-vous</h3>

                <form action="index.php?page=login" method="post">
                    <label>Votre Pseudo : </label><input type = "text" name = "logPseudo">
                    <label>Votre mot de passe : </label><input type = "text" name = "logMdp">
                    <input type="submit" name="Connectez-vous"><br><br>
                </form>
                <a href="index.php?page=inscription">Inscrivez-vous ici</a>

                <?php
            }
            ?>

        </div>
    </div>



    <div class="containerActu">

        <h2>Actualités</h2>

        <div id = infos>
            <div class="logo">
                <i class="fas fa-arrow-circle-right"></i>
                <a href ="https://www.lastampa.it/" target="_blank">
                    <img src="Ressources/logoStampa.jpg"/>
                </a>
            </div>
            <span class = "description">Actualités en direct de la Stampa.</span>
        </div>

        <div id = infos2>
            <div class="logo">
                <i class="fas fa-arrow-circle-right"></i>
                <a href ="http://www.reverso.net/text_translation.aspx?lang=FR" target="_blank">
                    <img src="Ressources/reverso.PNG"/>
                </a>
            </div>
            <span class = "description">Site de reverso pour aider à la traduction.</span>
        </div>
    </div>

</div>

<script src="Js/java.js"></script>
</body>
</html>
