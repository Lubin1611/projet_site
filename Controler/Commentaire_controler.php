<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 15:59
 */


class Commentaire_controler
{

    private $model;
    /**
     * @set model from Model/Commentaires.php
     */

    public function __construct()
    {

        $this->model = new Commentaires();

    }

    public function jeu1() {

        if (isset($_SESSION['id'])) {

            $session_id = $_SESSION['id'];
            $jeu = 'revisions';

            $commentaires = $this->model->get_all_coms($jeu);

            $highscore = $this->model->get_highscore($session_id);

            include "View/revisions.php";

        } else {

            $jeu = 'revisions';
            $commentaires = $this->model->get_all_coms($jeu);

            include "View/revisions.php";
        }
    }

    public function jeu2() {
        $jeu = 'memo';
        $commentaires = $this->model->get_all_coms($jeu);

        include "View/game_of_words.php";

    }

    public function jeu3() {
        $jeu = 'quiz';
        $commentaires = $this->model->get_all_coms($jeu);

        include "View/vue_quizz.php";

    }

    public function write_coms() {
        $id = $_SESSION['id'];

        $pseudo = $_SESSION['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $jeu = $_GET['table'];
        filter_var($jeu, FILTER_SANITIZE_STRING);

        $avatar = $_SESSION['avatar'];
         filter_var($avatar, FILTER_SANITIZE_URL);

        $contenu = $_POST['contenu_com'];
        filter_var($contenu, FILTER_SANITIZE_STRING);

        $this->model->write_tbl_com($pseudo, $contenu, $avatar, $jeu, $id);

        $this->jeu1();

    }

    public function write_com2() {

        $avatar = $_SESSION['avatar'];
        filter_var($avatar, FILTER_SANITIZE_URL);

        $id = $_SESSION['id'];
        filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $pseudo = $_SESSION['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $jeu = $_GET['table'];
        filter_var($jeu, FILTER_SANITIZE_STRING);

        $contenu = $_POST['contenu_com'];
        filter_var($contenu, FILTER_SANITIZE_STRING);

        $this->model->write_tbl_com($pseudo, $contenu, $avatar, $jeu, $id);

        $this->jeu2();
    }

    public function write_com3() {

        $pseudo = $_SESSION['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $id = $_SESSION['id'];
        filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $avatar = $_SESSION['avatar'];
        filter_var($avatar, FILTER_SANITIZE_URL);

        $jeu = $_GET['table'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $contenu = $_POST['contenu_com'];
        filter_var($contenu, FILTER_SANITIZE_STRING);

        $this->model->write_tbl_com($pseudo, $contenu, $avatar, $jeu, $id);

        $this->jeu3();

    }

    public function get_com2() {

        $id_commentaire = $_GET['id'];
        filter_var($id_commentaire, FILTER_SANITIZE_NUMBER_INT);

        $commentaire = $this->model->get_com_memo_by_id($id_commentaire);

        include "View/editionCommentaire.php";

    }

    public function set_com2() {

        $id_com = $_GET['id'];
        filter_var($id_com, FILTER_SANITIZE_NUMBER_INT);

        $commentaire = $_POST['contenu_com'];
        htmlspecialchars($commentaire);

        $this->model->set_com_memo_by_id($id_com, $commentaire);

        $this->jeu2();
    }

    public function to_delete_com2() {

        $id_commentaire = $_GET['id'];
        filter_var($id_commentaire, FILTER_SANITIZE_NUMBER_INT);

        $commentaire = $this->model->get_com_memo_by_id($id_commentaire);

        include "View/deleteCommentaires.php";

    }

    public function delete_com2() {

        $id_com = $_GET['id'];
        filter_var($id_com, FILTER_SANITIZE_NUMBER_INT);

        $this->model->delete_com_memo_by_id($id_com);

        $this->jeu2();
    }


}