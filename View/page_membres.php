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
    <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="lib/jquery.js"></script>
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
    <h1>Page d'accueil</h1>
    <div id="connection">

        <?php
        if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {
            ?>

            <p>Bienvenue, <?php echo $_SESSION['nom'];
                echo $_SESSION['prenom']; ?></p>
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

<div id="sub_menu_buttons">
    <span id = 'infos'>Informations de compte</span>
    <span id = 'page_succes'>Succès</span>
    <span id = 'page_graph'>Graphique de progression</span>
    <span>A voir </span>
</div>

<div id="informations_compte">

    <p>Voici vos informations de compte, a garder préciseuement : </p>

    <p>Votre nom : </p>&nbsp;<?= $utilisateur['nom']; ?>
    <p>Votre prenom :</p>&nbsp;<?= $utilisateur['prenom']; ?>
    <p>Votre pseudo :</p>&nbsp;<?= $utilisateur['pseudo']; ?>
    <p>Votre mail :</p>&nbsp;<?= $utilisateur['mail']; ?>
    <p>Avatar : </p><img src="<?= $utilisateur['avatar']; ?>">

</div>

<div id="succes">




</div>

<div id="graphique">


    <canvas id="myChart"></canvas>


</div>







<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="Js/js_page_membre.js"></script>
<script src="Js/java.js"></script>


</body>
</html>
