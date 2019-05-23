<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 23/03/2019
 * Time: 15:54
 */

if ($_SESSION['rang'] === NULL and $_SESSION != 0) {

    header("Location:View/acces_interdit.html");

} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Votre site de révisions</title>
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="Css/stylr.css">
        <link rel="stylesheet" type="text/css" href="Css/style_compte_membre.css">
        <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
              crossorigin="anonymous">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <script src="lib/jquery.js"></script>
    </head>
    <body>

    <header>
        <div id='container_btn'>
            <div id="btn_menu">Menu</div>
        </div>
        <div id='box_titre'>
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

        <div id="sub_menu_buttons">
            <button type="button" class="btn btn-primary btn-sm" id='infos_compte'>Informations de compte</button>
            <button type="button" class="btn btn-primary btn-sm" id='graphique_jeu_1'>Graphique de progression - game of
                words
            </button>
            <button type="button" class="btn btn-primary btn-sm" id='graphique_jeu_2'>Graphique de progression -
                revisions
            </button>
            <button type="button" class="btn btn-primary btn-sm" id='graphique_jeu_3'>Graphique de progression - quizz
            </button>
        </div>

        <div id="informations_compte">
            <div id='details'>
                <p>Voici vos informations de compte : </p>

                <div><span>Votre nom : </span>&nbsp;<?= $utilisateur['nom']; ?></div>
                <div><span>Votre prenom :</span>&nbsp;<?= $utilisateur['prenom']; ?></div>
                <div><span>Votre pseudo :</span>&nbsp;<?= $utilisateur['pseudo']; ?></div>
                <div><span>Votre mail :</span>&nbsp;<?= $utilisateur['mail']; ?></div>
            </div>

            <div id='avatar'>
                <img class="img-fluid" src="<?= $utilisateur['avatar']; ?>">
            </div>
        </div>


        <div id='affichage_words'>
            <div id = 'graphique_game_words'>
                <canvas id="myChart" width="400px" height="400px"></canvas>
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

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="Js/js_page_membre.js"></script>
    <script src="Js/java.js"></script>
    </body>
    </html>

    <?php

}


