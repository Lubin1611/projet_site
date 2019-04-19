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

    public function generate_graph() {

        session_start();

        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from score_quizz where id_users = $id_session");

        $this->sql = $this->sql->fetchAll();

        echo json_encode($this->sql);

    }

    public function generate_graph2() {

        session_start();

        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from score_questions where id_users = $id_session");

        $this->sql = $this->sql->fetchAll();

        echo json_encode($this->sql);

    }

    public function set_highscore($score, $id) {

        $this->sql = "UPDATE `highscore` SET score=? WHERE id_users = ?";
        $this->bdd->prepare($this->sql)->execute([$score, $id]);

        echo json_encode($score, $id);
    }

    public function classement() {

        $this->classement = $this->bdd->query("select * from highscore order by score desc")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->classement);

    }

}