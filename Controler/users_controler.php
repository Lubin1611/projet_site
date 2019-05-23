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


    /**
     * @set model from Model/Users.php
     */
    public function __construct()
    {

        $this->model = new Users();


    }


    public function request_delete() {

          $id = $_GET['idusers'];
         filter_var($id, FILTER_SANITIZE_NUMBER_INT);

         $this->model->deleteMember($id);

         include "View/vue_admin.php";
    }


      public function page_connect() {

        include "View/vue_connection.php";

       }
    public function check_credentials() {

        $nom = $_POST['nom'];
        filter_var($nom, FILTER_SANITIZE_STRING);

        $avatar = $_POST['valeur_image'];
        filter_var($avatar, FILTER_SANITIZE_URL);

        $mail = $_POST['mail'];
        filter_var($mail, FILTER_SANITIZE_EMAIL);

        $prenom = $_POST['prenom'];
        filter_var($prenom, FILTER_SANITIZE_STRING);

        $pseudo = $_POST['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $motdepasse = $_POST['mdp'];
        filter_var($motdepasse, FILTER_SANITIZE_STRING);

        $avatar = $_POST['valeur_image'];
        filter_var($avatar, FILTER_SANITIZE_URL);

        $mail = $_POST['mail'];
        filter_var($mail, FILTER_SANITIZE_EMAIL);

        $rang = '0';

        $reponse =  $this->model->check($pseudo, $mail);

        if ($reponse == "1") {

            $this->model->sign_up($nom, $prenom, $pseudo, $motdepasse, $avatar, $mail, $rang);

            include "View/confirmation_inscription.html";

        }

       else {

            $message = "Pseudo ou Mail déjà existants";
            include "View/inscription.php";
        }
    }


    public function vue_reinit() {

        include "View/vue_reinit.php";

    }

    public function check_mail() {

        $header = 'Team try-english';

        $mail = $_POST['mail'];
        filter_var($mail,FILTER_SANITIZE_EMAIL);

        $reponse =  $this->model->verifmail($mail);

        if ($reponse == 0) {

            $message = "Le mail renseigné n'existe pas";

            include "View/vue_reinit.php";


        } else {
            $token = $this->token();
            $this->model->setToken($mail,$token);
            $this->model->sendmail($token, $mail, $header);

           $message = "Un lien pour redéfinir votre mot de passe a été envoyé a votre boite mail";

            include "View/vue_reinit.php";
        }
    }

    public function token() {

        $token = md5(time()."abcde012345".mt_rand(1,99999));
        return $token;

    }


    public function change_mdp() {

        include "View/vue_modification_mdp.php";


    }

    public function verification ($passOne, $passTwo) {

        if ($passOne == $passTwo) {

            return true;
        }

        else {

            return false;
        }
    }




    public function get_new_pass(){

        $token = $_GET['jeton'];
        filter_var($token, FILTER_SANITIZE_STRING);

        $mdp = $_POST['confirmpass'];
        filter_var($mdp, FILTER_SANITIZE_STRING);

        $verif = $_POST['newpass'];
        filter_var($mdp, FILTER_SANITIZE_STRING);

        $result = $this->verification($mdp, $verif);

        if ($result == true) {

            $this->model->set_pass($token, $mdp);

            $message = "La modification du mot de passe a bien été prise en compte. Vous pouvez vous 
        connecter avec ce nouveau mot de passe";

            include "View/vue_modification_mdp.php";

        } else {

            $message = 'les mots de passe ne correspondent pas';
            include "View/vue_modification_mdp.php";

        }
    }

   public function vue_sign_up() {

        include "View/inscription.php";
   }

    public function login() {

        $log_pseudo = $_POST['logPseudo'];
        htmlspecialchars($log_pseudo);

        $log_password = $_POST['logMdp'];
        htmlspecialchars($log_password);

        $this->model->log($log_pseudo, $log_password);


            include "View/Page_accueil.php";


    }

    public function submit_logout() {

        $this->model->logout();

        include "View/vue_deconnection.html";

    }

    public function page_accueil() {

        include "View/Page_accueil.php";

    }

    public function vue_membres() {

            $utilisateur = $this->model->infos_membres();

            include "View/page_membres.php";

    }

    public function vue_admin() {

        $admin = $this->model->get_all_members();

        include "View/vue_admin.php";
    }

}