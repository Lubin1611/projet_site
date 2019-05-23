<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 11/04/2019
 * Time: 10:54
 */


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

        $result =  $_GET['score'];
        filter_var($result, FILTER_SANITIZE_NUMBER_INT);

        $matiere = $_GET['matiere'];
        filter_var($matiere, FILTER_SANITIZE_STRING);

        $id =  $_SESSION['id'];
        filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $this->model->score($id, $matiere, $result);

    }



    public function send_quiz_score()
    {
        $id_session = $_SESSION['id'];
        filter_var($id_session, FILTER_SANITIZE_NUMBER_INT);

        $score = $_GET['score'];
        filter_var($score, FILTER_SANITIZE_NUMBER_INT);

        $this->model->set_quiz_score($score, $id_session);
    }



    public function resultat_reponses() {

        $id = $_SESSION['id'];
        filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $resultat_questions =  $_GET['score'];
        filter_var($resultat_questions, FILTER_SANITIZE_NUMBER_INT);

        $this->model->score_questions($id, $resultat_questions);

    }


    public function request_classement()
    {

        $this->model->classement();
    }


    public function send_highscore()
    {

        $id_session = $_SESSION['id'];
        filter_var($id_session, FILTER_SANITIZE_NUMBER_INT);

        $pseudo = $_SESSION['pseudo'];
        filter_var($pseudo, FILTER_SANITIZE_STRING);

        $score = $_GET['score'];
        filter_var($score, FILTER_SANITIZE_NUMBER_INT);

        $this->model->check_highscore($id_session, $score, $pseudo);

    }
}