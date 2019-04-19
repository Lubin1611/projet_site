<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/04/2019
 * Time: 11:59
 */
session_start();

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
}