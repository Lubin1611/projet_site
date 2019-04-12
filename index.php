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

        case "redirections":

            require "Controler/redirections.php";

            switch ($_GET['action']) {

                case "entrainement":
                    $training = new redirections();
                    $training->jeu1();
                    break;

                case "jeu_mots":
                    $mots = new redirections();
                    $mots->jeu2();

                case "quizz":
                    $quizz = new redirections();
                    $quizz->jeu3();
            }
        break;

        case "scores":
            require "Model/Scores.php";
            require "Controler/scores_controler.php";

            switch ($_GET['action']) {

                case "envoi":
                    $send = new scores_controler();
                    $send->send_scores();

            }
    }

} else {

    //Page d'index

    require_once "Controler/controler_con.php";
    include "Model/connection_sql.php";

    $ctrl = new controler_con();
    $ctrl->page_accueil();

}