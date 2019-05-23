<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 12/04/2019
 * Time: 10:29
 */
if ($_SESSION['rang'] === NULL and $_SESSION['rang'] != 1) {

    header('Location:View/acces_interdit.html');

} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Votre site de révisions</title>
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="Css/stylr.css">
        <link rel="stylesheet" type="text/css" href="Css/style_compte_admin.css">
        <link href="https://fonts.googleapis.com/css?family=Courgette|Crete+Round|Noto+Sans+TC" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
              crossorigin="anonymous">
        <script src="lib/jquery.js"></script>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
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

        <div class="d-flex justify-content-center" id="div_boutons">
            <div class="btn-group btn-group" id="menu_buttons" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" id="members_info">Informations membres</button>
                <button type="button" class="btn btn-secondary" id="add_data">Ajouter des donnees</button>
            </div>
        </div>

        <div id=informations_membres>
            <?php foreach ($admin as $users) { ?>
                <div class="row">
                    <div class="col">
                        <span><b>Nom</b></span>
                        <div><?php echo $users->nom; ?></div>
                    </div>
                    <div class="col">
                        <b>Prenom</b>
                        <div><?php echo $users->prenom; ?></div>
                    </div>
                    <div class="col">
                        <b>Pseudo</b>
                        <div><?php echo $users->pseudo; ?></div>
                    </div>
                    <div class="col">
                        <b>Mail</b>
                        <div><?php echo $users->mail; ?></div>
                    </div>
                    <div class="col">
                        <b>Avatar</b>
                        <div><img src="<?php echo $users->avatar; ?> "></div>
                    </div>
                    <div class="col">
                        <b>Rang</b>
                        <div><?php echo $users->rang; ?></div>
                    </div>
                    <div class="col">
                        <b>Supprimer</b>
                        <div id = 'choix'><i class="fas fa-user-times"></i></div>

                        <div id = 'reponseschoix'>
                            Vous en êtes sur ?
                            <a href="index.php?controler=users&action=suppr&idusers=<?= $users->id_users ?>">Oui</a>
                             <span id = 'refusal'>Non</span>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>

        <div id="div_choix_jeu" class="d-flex justify-content-center">
            <div id="choix_parametres_jeu">
                <button type="button" class="btn btn-primary" id='jeu1'>Ajouter des données au jeu 1</button>
                <button type="button" class="btn btn-primary" id='jeu2'>Ajouter des données au jeu 2</button>
                <button type="button" class="btn btn-primary" id='jeu3'>Ajouter des données au jeu 3</button>
            </div>
        </div>

        <div id="div_options_jeu" class="d-flex justify-content-center">
            <div class="btn-group btn-group" id="menu_data" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" id="home_admin">Revenir a l'accueil</button>
                <button type="button" class="btn btn-secondary" id="write_new_data">Ajouter des données</button>
                <button type="button" class="btn btn-secondary" id="data_list">Liste des données du jeu</button>
            </div>
        </div>


        <div id=ajout_donnees_jeu1>

            <h1>Inserer des questions/reponses pour les revisions</h1>

            <form>
                <div class="form-group">
                    <label for="question_jeu_1">Votre question : </label>
                    <input type="text" class="form-control" id="question_jeu_1">
                </div>
                <div class="form-group">
                    <label for="reponse_jeu_1">Votre réponse : </label>
                    <input type="text" class="form-control" id="reponse_jeu_1">
                </div>
                <br/>
                <button type="button" class="btn btn-primary mb-2" id="add_data_jeu_1">Envoyez</button>
            </form>

        </div>

        <div id="liste_donnees_jeu1">

            <div id='liste_jeu1'>
            </div>
        </div>

        <div id='ajout_game_of_words'>

            <h1>Inserer des questions/reponses pour le game of words</h1>

            <form>
                <div class="form-group">
                    <label for="game_question">Votre question : </label>
                    <input type="text" class="form-control" id="game_question">
                </div>
                <div class="form-group">
                    <label for="game_answer">Votre réponse : </label>
                    <input type="text" class="form-control" id="game_answer">
                </div>

                <label for="select_matiere">Choisir la matière concernée : </label>
                <select class="custom-select" id="select_matiere">
                    <option selected>Cliquez sur ce menu</option>
                    <option value="db_html">Matière HTML</option>
                    <option value="db_css">Matière CSS</option>
                    <option value="db_js">Matière Javascript</option>
                    <option value="db_php">Matière PHP</option>
                </select>

                <button type="button" class="btn btn-primary mb-2" id="add_data_game_words">Envoyez</button>
            </form>

        </div>

        <div id="liste_game_of_words">

            <label for="liste_matiere">Choisir la matière concernée : </label>

            <select class="custom-select" id="liste_matiere">
                <option selected>Open this select menu</option>
                <option value="db_html">Matière HTML</option>
                <option value="db_css">Matière CSS</option>
                <option value="db_js">Matière Javascript</option>
                <option value="db_php">Matière PHP</option>
            </select>
        </div>

        <div id='liste_jeu'>
        </div>

        <div id=ajout_donnees_jeu3>

            <h1>Inserer des questions/reponses pour le quizz</h1>

            <form>
                <div class="form-group">
                    <label for="question_jeu_1">Votre question : </label>
                    <input type="text" class="form-control" id="question_jeu_quizz">
                </div>
                <div class="form-group">
                    <label for="reponse_quizz_1"> Réponse 1 : </label>
                    <input type="text" class="form-control" id="reponse_quizz_1">
                </div>
                <br/>
                <div class="form-group">
                    <label for="reponse_quizz_2"> Reponse 2 : </label>
                    <input type="text" class="form-control" id="reponse_quizz_2">
                </div>
                <br/>
                <div class="form-group">
                    <label for="reponse_quizz_3"> Reponse 3 : </label>
                    <input type="text" class="form-control" id="reponse_quizz_3">
                </div>
                <br/>
                <div class="form-group">
                    <label for="reponse_quizz_4"> Reponse 4 : </label>
                    <input type="text" class="form-control" id="reponse_quizz_4">
                </div>
                <br/>
                <div class="form-group">
                    <label for="bonne_reponse_quizz"> Bonne reponse : </label>
                    <input type="text" class="form-control" id="bonne_reponse_quizz">
                </div>
                <br/>
                <div class="form-group">
                    <label for="explications_quizz"> Explications solution :</label>
                    <input type="text" class="form-control" id="explications_quizz">
                </div>
                <br/>
                <button type="button" class="btn btn-primary mb-2" id="add_data_quizz">Envoyez</button>
            </form>

        </div>

        <div id="liste_donnees_quizz">
        </div>

    </div>
    <footer></footer>
    <script src="Js/page_admin.js"></script>
    <script src="Js/java.js"></script>
    </body>
    </html>

    <?php

}