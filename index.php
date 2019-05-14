<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 16:08
 */



if (session_id() == "") session_start();

if (isset($_GET['controler']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['controler']) ) {   // isset GET['controler'] verifie si une valeur est indiquée en parametre dans l'url

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
                }

            } else {


                echo "Vous n'avez pas les droits d'accès";

            }

            break;


        case "jeux":

            if (isset($_GET['action']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['action'])) {


                require "Model/Commentaires_jeux.php";
                require "Controler/Jeux.php";

                switch ($_GET['action']) {

                    case "entrainement":
                        $training = new Jeux();
                        $training->jeu1();
                        break;

                    case "jeuMots":
                        $mots = new Jeux();
                        $mots->jeu2();
                        break;

                    case "quizz":
                        $quizz = new Jeux();
                        $quizz->jeu3();
                        break;

                    case "comsWords":
                        $coms_jeu1 = new Jeux();
                        $coms_jeu1->write_com2();
                        break;

                    case "comsRevisions":
                        $com_jeu2 = new Jeux();
                        $com_jeu2->write_coms1();
                        break;

                    case "comsQuizz":
                        $com_jeu3 = new Jeux();
                        $com_jeu3->write_com3();
                        break;

                    case "editCom2":
                        $edit_com_memo = new jeux();
                        $edit_com_memo->get_com2();
                        break;
                    case "setCom2":
                        $set_com_memo = new jeux();
                        $set_com_memo->set_com2();
                        break;
                    case "supprCom2":
                        $del_com_memo = new jeux();
                        $del_com_memo->to_delete_com2();
                        break;

                    case "confirmSuppr2":
                        $confirm_suppr = new jeux();
                        $confirm_suppr->delete_com2();

                }

            } else {


                echo "Qu'est ce qu'il faut dire dans vous n'avez pas les droits ?";

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

                    case "envoi_quizz":
                        $send_quizz = new scores_controler();
                        $send_quizz->resultat_quizz();
                        break;

                    case "envoi_reponses":
                        $send_reponses = new scores_controler();
                        $send_reponses->resultat_reponses();

                }


            } else {


                echo "eh non ca ne marchera pas";

            }
            break;

        case "ajax":


            if (isset($_GET['action']) and preg_match("#^[a-zA-Z0-9]+$#", $_GET['action'])) {

                require "Model/Ajax.php";
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

                    case "sendScore":
                        $high_score = new controler_ajax();
                        $high_score->send_highscore();
                        break;

                    case "getClassement":
                        $classement = new controler_ajax();
                        $classement->request_classement();
                        break;

                    case "getQuestions":
                        $request_questions = new controler_ajax();
                        $request_questions->get_content1();
                        break;

                    case "getQuizz":
                        $request_quizz = new controler_ajax();
                        $request_quizz->get_content2();
                        break;

                    case "addScore":
                        $add_score = new controler_ajax();
                        $add_score->send_quizz_score();
                        break;

                    case "scoresPhrases":
                        $save_score = new controler_ajax();
                        $save_score->submit_scores();
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

                echo "inutile de persister ! ";
            }

    }

} elseif (isset($_GET['controler']) == "") {

    //Page d'index

    require_once "Controler/controler_con.php";
    include "Model/connection_sql.php";

    $ctrl = new controler_con();
    $ctrl->page_accueil();

} else {

    echo "Vous n'avez pas l'autorisation a cette page";

}