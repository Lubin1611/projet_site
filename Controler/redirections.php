<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 15:59
 */

class redirections
{

    public function __construct()
    {


    }

    public function jeu1() {

        include "View/revisionitalien.html";
    }

    public function jeu2() {

        session_start();
        include "View/game_of_words.php";

    }

    public function jeu3() {

        include "View/vue_quizz.php";

    }
}