<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 16:08
 */

if (isset($_GET['page'])) {

    switch($_GET['page']) {

        case "training":

            require_once"Controler/controler_con.php";
            $training = new controler_con();
            $training->training();

            break;

        case "jeu":

            require_once"Controler/controler_con.php";
            $training = new controler_con();
            $training->jeuPhrases();

            break;

        case "login":

            require_once "Controler/controler_con.php";

            $donnees = new controler_con();

            $donnees->login();

            break;

        case "inscription":

            require_once"Controler/controler_con.php";

            $inscr = new controler_con();
            $inscr->page_inscription();

            break;

        case "redirect":

            require_once"Controler/controler_con.php";
            $redir = new controler_con();
            $redir->page_accueil();

            break;

        case "logout":

            require_once "Controler/controler_con.php";

            $logout = new controler_con();

            $logout->send_logout();

            break;

        case "membres":

            require_once "Controler/controler_con.php";

            $membres = new controler_con();
            $membres->page_membres();


    }

}


else{

    //Page d'index

    require_once "Controler/controler_con.php";
    include "Model/connection_sql.php";

    $ctrl = new controler_con();
    $ctrl-> page_accueil();

}


switch(isset($_POST['action']))
{

    case "inscription":

        require_once "Controler/controler_con.php";

        $donnees = new controler_con();

        $donnees->envoi_donnees();

        break;




}