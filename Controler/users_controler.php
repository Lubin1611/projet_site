<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 11:30
 */

class users_controler
{

    private $model;
    private $nom;
    private $prenom;
    private $pseudo;
    private $motdepasse;
    private $avatar;
    private $mail;
    private $rang;
    private $log_pseudo;
    private $log_password;


    /**
     * @set model from Model/Users.php
     */
    public function __construct()
    {

        $this->model = new Users();


    }

    public function check_credentials() {

        $pseudo = $_POST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $mail = $_POST['mail'];
        filter_var($mail, FILTER_SANITIZE_STRING);

        $reponse =  $this->model->check($pseudo, $mail);

        if ($reponse == 1) {

            $message = "Pseudo ou mail déjà existants";

            include "View/inscription.php";

        }

        elseif ($reponse == 0) {

            include "View/Page_accueil.php";
        }

    }


    public function submit_sign_up() {

        $nom = $_POST['nom'];
        filter_var($nom, FILTER_SANITIZE_STRING);

        $prenom = $_POST['prenom'];
        filter_var($prenom, FILTER_SANITIZE_STRING);

        $pseudo = $_POST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $motdepasse = $_POST['mdp'];
        filter_var($motdepasse, FILTER_SANITIZE_STRING);

        $avatar = $_POST['valeur_image'];
        filter_var($avatar, FILTER_SANITIZE_STRING);

        $mail = $_POST['mail'];
        filter_var($mail, FILTER_SANITIZE_STRING);

        $rang = '0';


    }

   public function vue_sign_up() {

        include "View/inscription.php";
   }

    public function login() {

        $this->log_pseudo = $_POST['logPseudo'];
        $this->log_password = $_POST['logMdp'];

        $this->model->log($this->log_pseudo, $this->log_password);

        include "View/Page_accueil.php";

    }

    public function submit_logout() {

        $this->model->logout();

        include "View/Page_accueil.php";

    }

    public function vue_membres() {

        if ($_SESSION['rang'] === NULL and $_SESSION != 0 ) {

            header("Location:View/acces_interdit.html");

        } else {

            $utilisateur = $this->model->infos_membres();

            include "View/page_membres.php";
        }
    }

    public function vue_admin() {

        $admin = $this->model->get_all_members();

        include "View/vue_admin.php";
    }

}