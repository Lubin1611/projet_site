<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 16:10
 */

class controler_con
{

    private $connection;

    public function __construct()
    {

    }


    public function login() {

        require_once "Model/connection_sql.php";

        $this->connection = new connection_sql();
        $this->connection->log();
    }

    public function page_accueil() {

        include "View/Page_accueil.php";

    }

    public function jeuPhrases() {

        include "View/Jeu_phrase.html";

    }

    public function training() {

        include "View/revisions.php";

    }

    public function page_inscription() {

    include "View/inscription.php";

   }


    public function page_membres() {

        include "View/page_membres.php";

    }

    public function envoi_donnees() {

      if ($_POST['nom'] != "" and $_POST['prenom'] != "" and $_POST['pseudo'] != "" and $_POST['mail'] != "" and $_POST['mdp'] != "" ) {

          header("Location:View/confirmation.html");
          $this->connection = new connection_sql();
          $this->connection->inscription();

      }

      else {

          echo "Vous n'avez pas rempli un des champs";

      }

    }

    public function send_logout() {

        require_once "Model/connection_sql.php";

        $this->connection = new connection_sql();
        $this->connection->logout();
    }
}