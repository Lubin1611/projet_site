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
    <link rel="stylesheet" type="text/css" href="Css/style_compte_admin.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
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


<div class="btn-group btn-group-lg" id = "menu_buttons" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary" id="members_info">Informations membres</button>
    <button type="button" class="btn btn-secondary" id="add_data">Ajouter des donnees</button>
</div>


<div id = informations_membres>
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
</div>


<div id = "choix_parametres_jeu">

    <button type="button" class="btn btn-primary" id = 'jeu1'>Ajouter des données au jeu 1</button>
    <button type="button" class="btn btn-primary" id = 'jeu2'>Ajouter des données au jeu 2</button>
    <button type="button" class="btn btn-primary" id = 'jeu3'>Ajouter des données au jeu 3</button>


</div>


<div class="btn-group btn-group-lg" id = "menu_data" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary" id="home_admin">Revenir a l'accueil</button>
    <button type="button" class="btn btn-secondary" id="write_new_data">Ajouter des données</button>
    <button type="button" class="btn btn-secondary" id="data_list">Liste des données du jeu</button>
</div>


<div id = ajout_donnees_jeu1>

    <h1>Inserer des questions/reponses pour les revisions</h1>

    <form>
        <div class="form-group">
            <label for= "question_jeu_1">Votre question : </label>
            <input type="text" class="form-control" id="question_jeu_1">
        </div>
        <div class="form-group">
            <label for="reponse_jeu_1">Votre réponse : </label>
            <input type="text" class="form-control" id="reponse_jeu_1">
        </div><br/>
        <button type="button" class="btn btn-primary mb-2" id="add_data_jeu_1">Envoyez</button>
    </form>

</div>

<div id="liste_donnees_jeu1">

    <div id = 'liste_jeu1'>
        <div id ='id_game_1'></div>
        <div id ='quest_game_1'></div>
        <div id ='rep_game_1'></div>
    </div>



</div>

<div id = "choix_matieres_phrases">

    <button type="button" class="btn btn-primary" id = 'back'>Revenir au menu précédent</button>
    <button type="button" class="btn btn-primary" id = 'HTML'>Matière HTML</button>
    <button type="button" class="btn btn-primary" id = 'CSS'>Matière CSS</button>
    <button type="button" class="btn btn-primary" id = 'PHP'>Matière PHP</button>
    <button type="button" class="btn btn-primary" id = 'JS'>Matière JS</button>


</div>

<div id = ajout_donnees_jeuHTML>

    <h1>Inserer des questions/reponses pour la matière HTML</h1>

    <form>
        <div class="form-group">
            <label for= "question_jeu_HTML">Votre question : </label>
            <input type="text" class="form-control" id="question_jeu_HTML">
        </div>
        <div class="form-group">
            <label for="reponse_jeu_HTML">Votre réponse : </label>
            <input type="text" class="form-control" id="reponse_jeu_HTML">
        </div><br/>
        <button type="button" class="btn btn-primary mb-2" id="add_data_jeu_HTML">Envoyez</button>
    </form>

</div>

<div id="liste_donnees_jeuHML">

    <div id = 'liste_jeuHTML'>
        <div id ='id_game_html'></div>
        <div id ='quest_game_html'></div>
        <div id ='rep_game_html'></div>
    </div>



</div>

<div id = ajout_donnees_jeuCSS>

    <h1>Inserer des questions/reponses pour la matière CSS</h1>

    <form>
        <div class="form-group">
            <label for= "question_jeu_CSS">Votre question : </label>
            <input type="text" class="form-control" id="question_jeu_CSS">
        </div>
        <div class="form-group">
            <label for="reponse_jeu_CSS">Votre réponse : </label>
            <input type="text" class="form-control" id="reponse_jeu_CSS">
        </div><br/>
        <button type="button" class="btn btn-primary mb-2" id="add_data_jeu_CSS">Envoyez</button>
    </form>

</div>

<div id="liste_donnees_jeuCSS">

    <div id = 'liste_jeuCSS'>
        <div id ='id_game_css'></div>
        <div id ='quest_game_css'></div>
        <div id ='rep_game_css'></div>
    </div>

</div>

<div id = ajout_donnees_jeuJS>

    <h1>Inserer des questions/reponses pour la matière Javascript</h1>

    <form>
        <div class="form-group">
            <label for= "question_jeu_JS">Votre question : </label>
            <input type="text" class="form-control" id="question_jeu_JS">
        </div>
        <div class="form-group">
            <label for="reponse_jeu_JS">Votre réponse : </label>
            <input type="text" class="form-control" id="reponse_jeu_JS">
        </div><br/>
        <button type="button" class="btn btn-primary mb-2" id="add_data_jeu_JS">Envoyez</button>
    </form>

</div>

<div id="liste_donnees_jeuJS">

    <div id = 'liste_jeuJS'>
        <div id ='id_game_js'></div>
        <div id ='quest_game_js'></div>
        <div id ='rep_game_js'></div>
    </div>

</div>

<div id = ajout_donnees_jeuPHP>

    <h1>Inserer des questions/reponses pour la matiere PHP</h1>

    <form>
        <div class="form-group">
            <label for= "question_jeu_PHP">Votre question : </label>
            <input type="text" class="form-control" id="question_jeu_PHP">
        </div>
        <div class="form-group">
            <label for="reponse_jeu_PHP">Votre réponse : </label>
            <input type="text" class="form-control" id="reponse_jeu_PHP">
        </div><br/>
        <button type="button" class="btn btn-primary mb-2" id="add_data_jeu_PHP">Envoyez</button>
    </form>

</div>

<div id="liste_donnees_jeuPHP">

    <div id = 'liste_jeuPHP'>
        <div id ='id_game_PHP'></div>
        <div id ='quest_game_PHP'></div>
        <div id ='rep_game_PHP'></div>
    </div>

</div>

<div id = ajout_donnees_jeu3>

    <h1>Inserer des questions/reponses pour le quizz</h1>

    <form>
        <div class="form-group">
            <label for= "question_jeu_1">Votre question : </label>
            <input type="text" class="form-control" id="question_jeu_quizz">
        </div>
        <div class="form-group">
            <label for="reponse_quizz_1"> Réponse 1 : </label>
            <input type="text" class="form-control" id="reponse_quizz_1">
        </div><br/>
        <div class="form-group">
            <label for="reponse_quizz_2"> Reponse 2 : </label>
            <input type="text" class="form-control" id="reponse_quizz_2">
        </div><br/>
        <div class="form-group">
            <label for="reponse_quizz_3"> Reponse 3 :  </label>
            <input type="text" class="form-control" id="reponse_quizz_3">
        </div><br/>
        <div class="form-group">
            <label for="reponse_quizz_4"> Reponse 4 : </label>
            <input type="text" class="form-control" id="reponse_quizz_4">
        </div><br/>
        <div class="form-group">
            <label for="bonne_reponse_quizz"> Bonne reponse :  </label>
            <input type="text" class="form-control" id="bonne_reponse_quizz">
        </div><br/>
        <div class="form-group">
            <label for="explications_quizz"> Explications solution :</label>
            <input type="text" class="form-control" id="explications_quizz">
        </div><br/>
        <button type="button" class="btn btn-primary mb-2" id="add_data_quizz">Envoyez</button>
    </form>

</div>

<div id="liste_donnees_quizz">

    <div id = 'liste_quizz'>
        <div id ='donnees_questions'></div>
        <div id ='reponse_donnee_1'></div>
        <div id ='reponse_donnee_2'></div>
        <div id ='reponse_donnee_3'></div>
        <div id ='reponse_donnee_4'></div>
        <div id ='bonnerep_donnees'></div>
        <div id = "donnee_solution"></div>
    </div>



</div>

<script src="Js/page_admin.js"></script>
<script src="Js/java.js"></script>
</body>
</html>
