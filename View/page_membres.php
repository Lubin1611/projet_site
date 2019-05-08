<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 23/03/2019
 * Time: 15:54
 */

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" type="text/css" href="Css/stylr.css">
        <link rel="stylesheet" type="text/css" href="Css/style_compte_membre.css">
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
              crossorigin="anonymous">
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


    <div id="sub_menu_buttons">
        <button type="button" class="btn btn-primary" id='infos_compte'>Informations de compte</button>
        <button type="button" class="btn btn-primary" id='graphique_jeu_1'>Graphique de progression - game of words
        </button>
        <button type="button" class="btn btn-primary" id='graphique_jeu_2'>Graphique de progression - revisions</button>
        <button type="button" class="btn btn-primary" id='graphique_jeu_3'>Graphique de progression - quizz</button>
    </div>

    <div id="informations_compte">

        <p>Voici vos informations de compte, a garder préciseuement : </p>

        <p>Votre nom : </p>&nbsp;<?= $utilisateur['nom']; ?>
        <p>Votre prenom :</p>&nbsp;<?= $utilisateur['prenom']; ?>
        <p>Votre pseudo :</p>&nbsp;<?= $utilisateur['pseudo']; ?>
        <p>Votre mail :</p>&nbsp;<?= $utilisateur['mail']; ?>
        <p>Avatar : </p><img src="<?= $utilisateur['avatar']; ?>">

    </div>

    <div id='affichage_words'>

        <div id="graphique_game_words">


            <canvas id="myChart" width="400" height="400"></canvas>

        </div>


        <div id='score_words'>
            <div id='score_Html'></div>
            <div id='score_Css'></div>
            <div id='score_Js'></div>
            <div id='score_Php'></div>
        </div>

    </div>

    <div id='graphique_revisions'>

        <canvas id="myChart2"></canvas>

    </div>

    <div id='graphique_quizz'>

        <canvas id="myChart3"></canvas>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="Js/js_page_membre.js"></script>
    <script src="Js/java.js"></script>
    </body>
    </html>

    <?php


