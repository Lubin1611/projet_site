<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 11/04/2019
 * Time: 10:54
 */
session_start();

class scores_controler
{

    private $model;
    /**
     * @set model from Model/Scores.php
     */
    public function __construct()
    {

        $this->model = new Scores();


    }

    public function send_scores() {

        $result =  $_POST['score_jeuphrase'];
        $matiere = $_POST['matiere'];
        $id =  $_SESSION['id'];

        $this->model->score($id, $matiere, $result);

        include "View/Page_accueil.php";
    }

    public function resultat_quizz() {
        $id =  $_SESSION['id'];
        $resultat_quizz =  $_POST['score_jeuquizz'];

        $this->model->score_quizz($id, $resultat_quizz);

        include "View/Page_accueil.php";
    }

    public function resultat_reponses() {

        $id =  $_SESSION['id'];
        $resultat_questions =  $_POST['score_jeuquestions'];

        $this->model->score_questions($id, $resultat_questions);

        include "View/Page_accueil.php";

    }
}