<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 23/03/2019
 * Time: 15:54
 */
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet"  type="text/css" href="Css/stylr.css">
    <link rel="stylesheet"  type="text/css" href="Css/style_compte_membre.css">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="lib/jquery.js"></script>
</head>
<body>

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
    <h1>Votre espace personnel</h1>
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

<div id = "sub_menu_buttons">
    <span>Informations de compte</span>
    <span>Succès</span>
    <span>Graphique de progression</span>
    <span>A voir </span>
</div>

<div id = "informations_compte">

    <p>Voici vos informations de compte, a garder préciseuement : </p>

    <p>Pseudonyme : <?php echo $_SESSION['pseudo'];?></p>
    <p>Nom : <?php echo $_SESSION['nom'];?></p>
    <p>Prénom : <?php echo$_SESSION['prenom'];?></p>
    <p>Adresse mail :<?php echo $_SESSION['mail'];?></p>
    <p>Mot de passe : <?php $_SESSION['mdp'];?></p>

</div>

<script src="Js/java.js"></script>
</body>
</html>
