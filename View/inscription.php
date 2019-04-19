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
    <script src="lib/jquery.js"></script>
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
        <a href = "index.php?" id="bloc1"><div>Accueil</div></a>
        <a href ="index.php?controler=jeux&action=entrainement"  id="bloc2"><div>Entrainement au vocabulaire Italien</div></a>
        <a href ="index.php?controler=jeux&action=jeu_mots"  id="bloc3"><div>Jeu phrases</div></a>

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


<div id="inscription">

    <h2>Inscrivez - vous</h2>

    <form action="index.php?controler=users&action=inscription" method="post">
        <label>Votre Nom : </label><input type="text" name = "nom"><br>
        <label>Votre Prenom : </label><input type="text" name = "prenom"><br>
        <label>Votre Pseudo : </label><input type = "text" name = "pseudo"><br>
        <label>Votre mot de passe : </label><input type="password" name = "mdp"><br>
        <label>Indiquez l'url d'une image pour un avatar : </label><input type="text" name = "avatar"><br>
        <label>Votre e-mail : </label><input type="email" name = "mail"><br>
        <input type ="submit" value="Inscrivez-vous">
    </form>

</div>



<script src="Js/java.js"></script>
</body>
</html>
