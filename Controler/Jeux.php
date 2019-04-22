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


        $session_id = $_SESSION['id'];

        $commentaires = $this->model->get_all_coms2();

        $highscore = $this->model->get_highscore($session_id);


        include "View/revisions.php";
    }

    public function jeu2() {



        $commentaires = $this->model->get_all_coms();
        include "View/game_of_words.php";

    }

    public function jeu3() {


        $commentaires = $this->model->get_all_coms3();
        include "View/vue_quizz.php";

    }

    public function write_coms1() {

        $pseudo = $_SESSION['pseudo'];
        $contenu = $_POST['contenu_com'];

        $this->model->write_com_tbl1($pseudo, $contenu);

        $this->jeu2();

    }

    public function write_com2() {

        $pseudo = $_SESSION['pseudo'];
        $contenu = $_POST['contenu_com'];

        $this->model->write_com_tbl2($pseudo, $contenu);

        $this->jeu1();
    }

    public function write_com3() {

        $pseudo = $_SESSION['pseudo'];
        $contenu = $_POST['contenu_com'];

        $this->model->write_com_tbl3($pseudo, $contenu);

        $this->jeu3();

    }
}