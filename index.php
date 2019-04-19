<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 16:08
 */


if (isset($_GET['controler'])) { // isset GET['controler'] verifie si une valeur est indiquée en parametre dans l'url

    switch ($_GET['controler']) {

        case "users":

            require "Model/Users.php";
            require "Controler/users_controler.php";

            switch ($_GET['action']) {

                case "vue_inscription":
                    $to_sign_up = new users_controler();
                    $to_sign_up->vue_sign_up();
                    break;

                case "inscription":
                    $sign_up = new users_controler();
                    $sign_up->submit_sign_up();
                    break;

                case "vue_espace_membres":
                    $espace_membre = new users_controler();
                    $espace_membre->vue_membres();
                    break;

                case "panel_admin":
                    $admin = new users_controler();
                    $admin->vue_admin();
                    break;

                case "connection":
                    $login = new users_controler();
                    $login->login();
                    break;

                case "log_out";
                    $to_log_out = new users_controler();
                    $to_log_out->submit_logout();

            }
            break;

        case "jeux":
            require "Model/Commentaires_jeux.php";
            require "Controler/Jeux.php";

            switch ($_GET['action']) {

                case "entrainement":
                    $training = new Jeux();
                    $training->jeu1();
                    break;

                case "jeu_mots":
                    $mots = new Jeux();
                    $mots->jeu2();
                    break;

                case "quizz":
                    $quizz = new Jeux();
                    $quizz->jeu3();
                    break;

                case "coms_words":
                    $coms_jeu1 = new Jeux();
                    $coms_jeu1->write_coms1();
                    break;

                case "coms_revisions":
                    $com_jeu2 = new Jeux();
                    $com_jeu2->write_com2();
                    break;

                case "coms_quizz":
                    $com_jeu3 = new Jeux();
                    $com_jeu3->write_com3();

            }
            break;

        case "scores":
            require "Model/Scores.php";
            require "Controler/scores_controler.php";

            switch ($_GET['action']) {

                case "envoi":
                    $send = new scores_controler();
                    $send->send_scores();
                    break;

                case "envoi_quizz":
                    $send_quizz = new scores_controler();
                    $send_quizz->resultat_quizz();
                    break;

                case "envoi_reponses":
                    $send_reponses = new scores_controler();
                    $send_reponses->resultat_reponses();

            }
        break;

        case "ajax":
            require "Model/Ajax.php";
            require "Controler/controler_ajax.php";

            switch ($_GET['action']) {

                case "getscores":
                    $get= new controler_ajax();
                    $get->send_request();
                break;

                case "get_graph":
                    $get_graph = new controler_ajax();
                    $get_graph->request_graph();
                    break;

                case "get_graph2":
                    $get_reponses = new controler_ajax();
                    $get_reponses->request_questions();
                    break;

                case "send_score":
                    $high_score = new controler_ajax();
                    $high_score->send_highscore();
                    break;

                case "get_classement":
                    $classement = new controler_ajax();
                    $classement->request_classement();

            }

    }


} else {

    //Page d'index

    require_once "Controler/controler_con.php";
    include "Model/connection_sql.php";

    $ctrl = new controler_con();
    $ctrl->page_accueil();

}