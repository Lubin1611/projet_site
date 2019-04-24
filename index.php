<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 16:08
 */
if (session_id() == "") session_start();



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

                case "get_words_scores":
                    $get= new controler_ajax();
                    $get->request_words_scores();
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
                    break;

                case "get_questions":
                    $request_questions = new controler_ajax();
                    $request_questions->get_content1();
                    break;

                case "get_quizz":
                    $request_quizz = new controler_ajax();
                    $request_quizz->get_content2();
                    break;

                case "add_score":
                    $add_score = new controler_ajax();
                    $add_score->send_quizz_score();
                    break;

                case "get_words_db":
                    $request_words = new controler_ajax();
                    $request_words->get_content_html();
                    break;

                case "get_csswords_db":
                    $request_csswords = new controler_ajax();
                    $request_csswords->get_content_css();
                    break;

                case "get_jswords_db":
                    $request_jswords = new controler_ajax();
                    $request_jswords->get_content_js();
                    break;

                case "get_phpwords_db":
                    $request_phpwords = new controler_ajax();
                    $request_phpwords->get_content_php();
                    break;

                case "scores_phrases":
                    $save_score = new controler_ajax();
                    $save_score->submit_scores();
                    break;

                case "add_data1":
                    $add_jeu1 = new controler_ajax();
                    $add_jeu1->add_data_jeu1();
                    break;

                case "read_data1":
                    $read_jeu1 = new controler_ajax();
                    $read_jeu1->read_game_data1();
                    break;

                case "read_list":
                    $read_html = new controler_ajax();
                    $read_html->get_words_content();
                    break;

                case "add_quizz_data":
                    $quizz_data = new controler_ajax();
                    $quizz_data->new_quizz_content();
                    break;

                case "data_words":
                    $add_data_words = new controler_ajax();
                    $add_data_words->send_game_words();
            }

    }


} else {

    //Page d'index

    require_once "Controler/controler_con.php";
    include "Model/connection_sql.php";

    $ctrl = new controler_con();
    $ctrl->page_accueil();

}