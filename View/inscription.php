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


<div id="boutonListe">+</div>

<aside class="menuderoulant">
    <div id="menu">
        <a href = "index.php?page=redirect" id="bloc1"><div>Accueil</div></a>
        <a href ="index.php?page=training"  id="bloc2"><div>Entrainement au vocabulaire Italien</div></a>
        <a href = "index.php?page=jeu" id ="bloc3"><div id="bloc3">Jeu phrases Italien</div></a>
        <a href ="index.php?page=membres"  id="bloc4"><div>Espace membres</div></a>
    </div>
</aside>


<div id = "titre">

    <h1>Page d'accueil</h1>

</div>


<div id="inscription">

    <h2>Inscrivez - vous</h2>

    <form action="" method="post">
        <label>Votre Nom : </label><input type="text" name = "nom"><br>
        <label>Votre Prenom : </label><input type="text" name = "prenom"><br>
        <label>Votre Pseudo : </label><input type = "text" name = "pseudo"><br>
        <label>Votre e-mail : </label><input type="text" name = "mail"><br>
        <label>Votre mot de passe : </label><input type="password" name = "mdp"><br>
        <input type ="submit" value="Inscrivez-vous">
    </form>

</div>





<script src="Js/java.js"></script>
</body>
</html>
