<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 16:08
 */

/*
 * Demarre une session pour toutes les pages appelées.
 */
session_start();

/*
 * Isset() vérifie qu'une valeur est définie, preg_match permet de filtrer des caractères
 * non désirés dans l'url.
 */
if (isset($_GET['controler']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['controler']) ) {

    switch ($_GET['controler']) {

        case "users":

            if (isset($_GET['action']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['action'])) {

                require "Model/Users.php";
                require "Controler/users_controler.php";


                switch ($_GET['action']) {

                    case "vueInscription":
                        $to_sign_up = new users_controler();
                        $to_sign_up->vue_sign_up();
                        break;

                    case "vueConnection":
                        $to_connect = new users_controler();
                        $to_connect->page_connect();
                        break;

                    case "inscription":
                        $sign_up = new users_controler();
                        $sign_up->check_credentials();
                        break;

                    case "espaceMembres":

                        $espace_membre = new users_controler();
                        $espace_membre->vue_membres();
                        break;


                    case "panelAdmin":

                        $admin = new users_controler();
                        $admin->vue_admin();
                        break;


                    case "connection":
                        $login = new users_controler();
                        $login->login();
                        break;

                    case "deconnection";
                        $to_log_out = new users_controler();
                        $to_log_out->submit_logout();
                        break;

                    case "reinit":
                        $reinit = new users_controler();
                        $reinit->vue_reinit();
                        break;

                    case "checkmail":
                        $check= new users_controler();
                        $check->check_mail();
                        break;

                    case "changepass":
                        $change = new users_controler();
                        $change->change_mdp();
                        break;

                    case "newmdp":
                        $modification = new users_controler();
                        $modification->get_new_pass();
                        break;

                    case "suppr":
                        $supression = new users_controler();
                        $supression->request_delete();
                }

            } else {


                echo "Vous n'avez pas les droits d'accès";

            }

            break;


        case "jeux":

            if (isset($_GET['action']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['action'])) {


                require "Model/Commentaires.php";
                require "Controler/Commentaire_controler.php";

                switch ($_GET['action']) {

                    case "entrainement":
                        $training = new Commentaire_controler();
                        $training->jeu1();
                        break;

                    case "jeuMots":
                        $mots = new Commentaire_controler();
                        $mots->jeu2();
                        break;

                    case "quizz":
                        $quizz = new Commentaire_controler();
                        $quizz->jeu3();
                        break;

                    case "comsWords":
                        $coms_jeu1 = new Commentaire_controler();
                        $coms_jeu1->write_com2();
                        break;

                    case "comsRevisions":
                        $com_jeu2 = new Commentaire_controler();
                        $com_jeu2->write_coms();
                        break;

                    case "comsQuizz":
                        $com_jeu3 = new Commentaire_controler();
                        $com_jeu3->write_com3();
                        break;

                    case "editCom2":
                        $edit_com_memo = new Commentaire_controler();
                        $edit_com_memo->get_com2();
                        break;
                    case "setCom2":
                        $set_com_memo = new Commentaire_controler();
                        $set_com_memo->set_com2();
                        break;
                    case "supprCom2":
                        $del_com_memo = new Commentaire_controler();
                        $del_com_memo->to_delete_com2();
                        break;

                    case "confirmSuppr2":
                        $confirm_suppr = new Commentaire_controler();
                        $confirm_suppr->delete_com2();

                }

            } else {


                echo "Vous n'avez pas les droits d'accès";

            }
            break;

        case "scores":

            if (isset($_GET['action']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['action'])) {


                require "Model/Scores.php";
                require "Controler/scores_controler.php";

                switch ($_GET['action']) {

                    case "envoi":
                        $send = new scores_controler();
                        $send->send_scores();
                        break;

                    case "envoiQuiz":
                        $send_quizz = new scores_controler();
                        $send_quizz->send_quiz_score();
                        break;

                    case "envoiReponses":
                        $send_reponses = new scores_controler();
                        $send_reponses->resultat_reponses();
                        break;

                    case "getClassement":
                        $classement = new scores_controler();
                        $classement->request_classement();
                        break;

                    case "sendScore":
                        $high_score = new scores_controler();
                        $high_score->send_highscore();
                        break;
                }


            } else {


                echo "Vous n'avez pas les droits d'accès";

            }
            break;

        case "ajax":


            if (isset($_GET['action']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['action'])) {

                require "Model/Requetes_Ajax.php";
                require "Controler/controler_ajax.php";

                switch ($_GET['action']) {

                    case "getWordsScores":
                        $get = new controler_ajax();
                        $get->request_words_scores();
                        break;

                    case "getGraph":
                        $get_graph = new controler_ajax();
                        $get_graph->request_graph();
                        break;

                    case "getGraph2":
                        $get_reponses = new controler_ajax();
                        $get_reponses->request_questions();
                        break;


                    case "getQuestions":
                        $request_questions = new controler_ajax();
                        $request_questions->get_content1();
                        break;

                    case "getQuizz":
                        $request_quizz = new controler_ajax();
                        $request_quizz->get_content2();
                        break;

                    case "Data1":
                        $add_jeu1 = new controler_ajax();
                        $add_jeu1->add_data_jeu1();
                        break;

                    case "readData1":
                        $read_jeu1 = new controler_ajax();
                        $read_jeu1->read_game_data1();
                        break;

                    case "readList":
                        $read_html = new controler_ajax();
                        $read_html->get_words_content();
                        break;

                    case "quizzData":
                        $quizz_data = new controler_ajax();
                        $quizz_data->new_quizz_content();
                        break;

                    case "dataWords":
                        $add_data_words = new controler_ajax();
                        $add_data_words->send_game_words();


                }

            } else {

                echo "Vous n'avez pas les droits d'accès";
            }

    }

} elseif (isset($_GET['controler']) == "") {

    //Page d'index
    require "Model/Users.php";
    require "Controler/users_controler.php";

    $ctrl = new users_controler();
    $ctrl->page_accueil();

} else {

    echo "Vous n'avez pas l'autorisation a cette page";

}