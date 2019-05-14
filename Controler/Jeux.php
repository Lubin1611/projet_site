<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 15:59
 */


class Jeux
{

    private $model;
    /**
     * @set model from Model/Commentaires_jeux.php
     */

    public function __construct()
    {

        $this->model = new Commentaires_jeux();

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
        $jeu = $_GET['table'];
        $pseudo = $_SESSION['pseudo'];
        $contenu = $_POST['contenu_com'];
        $avatar = $_SESSION['avatar'];

        $this->model->write_tbl_com($pseudo, $contenu, $avatar, $jeu);

        $this->jeu1();

    }

    public function write_com2() {
        $jeu = $_GET['table'];
        $pseudo = $_SESSION['pseudo'];
        $contenu = $_POST['contenu_com'];
        $avatar = $_SESSION['avatar'];

        $this->model->write_tbl_com($pseudo, $contenu, $avatar, $jeu);

        $this->jeu2();
    }

    public function write_com3() {

        $jeu = $_GET['table'];
        $pseudo = $_SESSION['pseudo'];
        $contenu = $_POST['contenu_com'];
        $avatar = $_SESSION['avatar'];

        $this->model->write_tbl_com($pseudo, $contenu, $avatar, $jeu);

        $this->jeu3();

    }

    public function get_com2() {

        $id_commentaire = $_GET['id'];

        $commentaire = $this->model->get_com_memo_by_id($id_commentaire);

        include "View/editionCommentaire.php";

    }

    public function set_com2() {

        $id_com = $_GET['id'];
        $commentaire = $_POST['contenu_com'];

        $this->model->set_com_memo_by_id($id_com, $commentaire);

        $this->jeu2();
    }

    public function to_delete_com2() {

        $id_commentaire = $_GET['id'];

        $commentaire = $this->model->get_com_memo_by_id($id_commentaire);

        include "View/deleteCommentaires.php";

    }

    public function delete_com2() {

        $id_com= $_GET['id'];

        $this->model->delete_com_memo_by_id($id_com);

        $this->jeu2();
    }
}