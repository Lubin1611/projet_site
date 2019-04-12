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

    public function submit_sign_up() {

        $this->nom = $_POST['nom'];
        filter_var($this->nom, FILTER_SANITIZE_STRING);

        $this->prenom = $_POST['prenom'];
        filter_var($this->prenom, FILTER_SANITIZE_STRING);

        $this->pseudo = $_POST['pseudo'];
        filter_var($this->pseudo, FILTER_SANITIZE_STRING);

        $this->motdepasse = $_POST['mdp'];
        filter_var($this->motdepasse, FILTER_SANITIZE_STRING);

        $this->avatar = $_POST['avatar'];
        filter_var($this->avatar, FILTER_SANITIZE_STRING);

        $this->mail = $_POST['mail'];
        filter_var($this->mail, FILTER_SANITIZE_STRING);

        $this->rang = '0';

        $this->model->sign_up($this->nom, $this->prenom, $this->pseudo, $this->motdepasse, $this->avatar, $this->mail, $this->mail);
        include "View/Page_accueil.php";

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

       $utilisateur =  $this->model->infos_membres();

        include "View/page_membres.php";

    }

    public function vue_admin() {

        $admin = $this->model->get_all_members();

        include "View/vue_admin.php";
    }

}