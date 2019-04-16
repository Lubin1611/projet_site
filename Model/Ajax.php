<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/04/2019
 * Time: 11:59
 */

class Ajax
{

    private $sql;
    private $toto;
    private $dede;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=projet_site;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }

    }

    public function getscore()
    {
        session_start();

        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("SELECT * FROM score_quizz WHERE id_users = $id_session" );

        $this->sql = $this->sql->fetch();

        $tabJeu[] = $this->sql;

        $this->dede = $this->bdd->query("SELECT * FROM score_questions WHERE id_users = $id_session" );

        $this->dede = $this->dede->fetch();

        $tabJeu[] = $this->dede;

        $this->toto = $this->bdd->query("SELECT * FROM score_users WHERE id_users = $id_session" );

        $this->toto = $this->toto->fetch();

        $tabJeu[] = $this->toto;

       echo json_encode($tabJeu);

    }
}