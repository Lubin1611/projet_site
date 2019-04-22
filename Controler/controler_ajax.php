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
     * @set model from Model/Ajax.php
     */
    public function __construct()
    {

        $this->model = new Ajax();


    }

    public function send_request()
    {

        $this->model->getscore();

    }

    public function request_graph()
    {

        $this->model->generate_graph();

    }

    public function request_questions()
    {

        $this->model->generate_graph2();

    }

    public function send_highscore()
    {

        $id_session = $_SESSION['id'];
        $score = $_GET['score'];

        $this->model->set_highscore($score, $id_session);
    }

    public function request_classement()
    {

        $this->model->classement();
    }

    public function get_content1()
    {

        $this->model->content1();

    }

    public function get_content2()
    {

        $this->model->content2();

    }

    public function get_content_html()
    {

        $this->model->content_html();

    }

    public function get_content_css()
    {

        $this->model->content_css();

    }

    public function get_content_js()
    {

        $this->model->content_js();

    }

    public function get_content_php()
    {

        $this->model->content_php();

    }

    public function add_data_jeu1() {

        $quest_jeu1 = $_GET['question'];
        $rep_jeu1 = $_GET['reponse'];

        $this->model->set_data_jeu1($quest_jeu1, $rep_jeu1);


    }

    public function send_quizz_score()
    {
        $id_session = $_SESSION['id'];
        $score = $_GET['score'];

        $this->model->set_quizz_score($score, $id_session);

    }

    public function submit_scores() {

        $id_session = $_SESSION['id'];
        $score = $_GET['score'];
        $matiere = $_GET['matiere'];

        $this->model->set_scores($id_session, $score ,$matiere);

    }

    public function read_game_data1() {

        $table = "db_questions";

        $this->model->get_data_game($table);

    }

    public function send_game_html() {

        $quest_html = $_GET['question'];
        $rep_html =  $_GET['reponse'];
        $table = 'db_html';

        $this->model->set_db_words($quest_html, $rep_html, $table);

    }

    public function send_game_css() {

        $quest_html = $_GET['question'];
        $rep_html =  $_GET['reponse'];
        $table = 'db_css';

        $this->model->set_db_words($quest_html, $rep_html, $table);

    }

    public function send_game_js() {

        $quest_html = $_GET['question'];
        $rep_html =  $_GET['reponse'];
        $table = 'db_js';

        $this->model->set_db_words($quest_html, $rep_html, $table);

    }

    public function send_game_php() {

        $quest_html = $_GET['question'];
        $rep_html =  $_GET['reponse'];
        $table = 'db_php';

        $this->model->set_db_words($quest_html, $rep_html, $table);

    }

}