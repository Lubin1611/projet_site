<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 10/03/2019
 * Time: 14:37
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <link rel="stylesheet" type="text/css" href="Css/style_inscription.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">    <script src="lib/jquery.js"></script>
</head>
<body>
<div id = "titre" class="d-flex flex-wrap">
        <h1>Accueil site</h1>
        <div id = "connection">

            <?php

            if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {

                ?>
                <p>Bienvenue, <?php echo $_SESSION['nom'];?>&nbsp;<?php $_SESSION['prenom'];?></p>
                <p>vous pouvez désormais accéder à votre espace membre a partir du menu</p>
                <a href="index.php?controler=users&action=log_out">Se déconnecter</a>

                <?php

            } else {
                ?>

                <h3>Connectez-vous</h3>

                <form action="index.php?controler=users&action=connection" method="post">
                    <label>Votre Pseudo : </label><input type = "text" name = "logPseudo">
                    <label>Votre mot de passe : </label><input type = "text" name = "logMdp">
                    <input type="submit" name="Connectez-vous"><br><br>
                </form>
                <a href="index.php?controler=users&action=vue_inscription">Inscrivez-vous ici</a>

                <?php
            }
            ?>

        </div>
    </div>

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


<div id="inscription">

    <?php echo $message; ?>

    <h2>Inscrivez - vous</h2>


    <form action="index.php?controler=users&action=inscription" method="post">
        <label>Votre Nom : </label><input type="text" name = "nom"><br>
        <label>Votre Prenom : </label><input type="text" name = "prenom"><br>
        <label>Votre Pseudo : </label><input type = "text" name = "pseudo"><br>
        <label>Votre mot de passe : </label><input type="password" name = "mdp"><br>
        <label>Choisissez votre avatar : </label>
        <div id = "avatar">
        <i class="fas fa-arrow-left" id = 'prev'></i><input type="image" id = "choix_user"><i class="fas fa-arrow-right" id ="next" name ="avatar"></i></div>
        <input type="hidden" name = "valeur_image" id = "src_image">
        <label>Votre e-mail : </label><input type="email" name = "mail"><br>
        <input type ="submit" value="Inscrivez-vous">
    </form>

</div>


<script src="Js/js_inscription.js"></script>
<script src="Js/java.js"></script>
</body>
</html>
