<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/04/2019
 * Time: 11:59
 */


class controler_ajax
{
    private $model;

    /**
     * @set model from Model/Requetes_Ajax.php
     */
    public function __construct()
    {

        $this->model = new Requetes_Ajax();


    }

    public function request_words_scores()
    {
        $id_session = $_SESSION['id'];
        filter_var($id_session, FILTER_SANITIZE_NUMBER_INT);

        $this->model->get_words_scores($id_session);

    }

    public function request_graph()
    {
        $id_session = $_SESSION['id'];
        filter_var($id_session, FILTER_SANITIZE_NUMBER_INT);

        $this->model->generate_graph($id_session);

    }

    public function request_questions()
    {
        $id_session = $_SESSION['id'];
        filter_var($id_session, FILTER_SANITIZE_NUMBER_INT);

        $this->model->generate_graph2($id_session);

    }



    public function get_content1()
    {

        $this->model->content1();

    }

    public function get_content2()
    {

        $this->model->content2();

    }

    public function get_words_content()
    {
        $table = $_GET['choice'];
        filter_var($table, FILTER_SANITIZE_STRING);

        $this->model->content_words($table);

    }

    public function add_data_jeu1() {

        $quest_jeu1 = $_GET['question'];
        filter_var($quest_jeu1, FILTER_SANITIZE_STRING);

        $rep_jeu1 = $_GET['reponse'];
        filter_var($rep_jeu1, FILTER_SANITIZE_STRING);

        $this->model->set_data_jeu1($quest_jeu1, $rep_jeu1);


    }


    public function read_game_data1() {

        $table = "db_questions";

        $this->model->get_data_game($table);

    }

    public function send_game_words() {

        $quest_html = $_GET['question'];
        filter_var($quest_html, FILTER_SANITIZE_STRING);

        $rep_html =  $_GET['reponse'];
        filter_var($rep_html, FILTER_SANITIZE_STRING);

        $table = $_GET['matiere'];
        filter_var($table, FILTER_SANITIZE_STRING);

        $this->model->set_db_words($quest_html, $rep_html, $table);
    }


    function new_quizz_content() {

        $quest_quizz = $_GET['question'];
        filter_var($quest_quizz, FILTER_SANITIZE_STRING);

        $first_choice = $_GET['reponseA'];
        filter_var($first_choice, FILTER_SANITIZE_STRING);

        $second_choice = $_GET['reponseB'];
        filter_var($second_choice, FILTER_SANITIZE_STRING);

        $third_choice = $_GET['reponseC'];
        filter_var($third_choice, FILTER_SANITIZE_STRING);

        $fourth_choice = $_GET['reponseD'];
        filter_var($fourth_choice, FILTER_SANITIZE_STRING);

        $bonne_reponse = $_GET['bonnerep'];
        filter_var($bonne_reponse, FILTER_SANITIZE_STRING);

        $solution = $_GET['solution'];
        filter_var($solution, FILTER_SANITIZE_STRING);

        $this->model->set_quizz_content($quest_quizz, $first_choice, $second_choice, $third_choice, $fourth_choice, $bonne_reponse, $solution);

    }

}