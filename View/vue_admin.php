<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 12/04/2019
 * Time: 10:29
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
    <h1>Espace admin</h1>
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
<table>
    <tr>
        <th> Nom utilisateur </th>
        <th> Prenom utilisateur </th>
        <th> Pseudo utilisateur </th>
        <th> Mail utilisateur </th>
        <th> Avatar de l'utilisateur </th>
        <th> Rang de l'utilisateur </th>
        <th> Supprimer </th>
    </tr>

    <?php foreach ($admin as $users) { ?>

    <tr>
        <td><?php echo $users->nom ;?></td>
        <td><?php echo $users->prenom ;?></td>
        <td><?php echo $users->pseudo ;?></td>
        <td><?php echo $users->mail ;?></td>
        <td><img src ="<?php echo $users->avatar ;?>"></td>
        <td><?php echo $users->rang ;?></td>
        <td> <i class="fas fa-user-times"></i> </td>
    </tr>

<?php }
?>

</table>

<script src="Js/java.js"></script>
</body>
</html>
