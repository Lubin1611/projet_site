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
    private $classement;

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



        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from score_quizz where id_users = $id_session");

        $this->sql = $this->sql->fetchAll();

        echo json_encode($this->sql);

    }

    public function generate_graph2() {



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

    public function content1() {

        $this->sql = $this->bdd->query("select * from db_questions")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content2() {

        $this->sql = $this->bdd->query("select * from db_quizz")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content_html() {

        $this->sql = $this->bdd->query("select * from db_html")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content_css() {

        $this->sql = $this->bdd->query("select * from db_css")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content_js() {

        $this->sql = $this->bdd->query("select * from db_js")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content_php() {

        $this->sql = $this->bdd->query("select * from db_php")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }


    public function set_quizz_score($score, $id) {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");

        $this->sql = $this->bdd->prepare("INSERT INTO `score_quizz` (`score`, `date_quizz`, `id_users`) VALUES (?,?,?)");
        $this->sql->bindParam(1, $score);
        $this->sql->bindParam(2, $date);
        $this->sql->bindParam(3, $id);
        $this->sql->execute();

        echo json_encode($score, $id);

    }

    public function set_scores($id_session, $score, $matiere) {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");

        $this->sql = $this->bdd->prepare("INSERT INTO `score_users` (`score`, `date`, `id_users`, `matiere`) VALUES (?,?,?,?)");
        $this->sql->bindParam(1, $score);
        $this->sql->bindParam(2, $date);
        $this->sql->bindParam(3, $id_session);
        $this->sql->bindParam(4, $matiere);
        $this->sql->execute();

        echo json_encode($matiere);
        echo json_encode($score);

    }

    public function set_data_jeu1($quest_jeu1, $rep_jeu1) {


        $this->sql = $this->bdd->prepare("INSERT INTO `db_questions` (`questions`, `reponses`) VALUES (?,?)");
        $this->sql->bindParam(1, $quest_jeu1);
        $this->sql->bindParam(2, $rep_jeu1);

        $this->sql->execute();

        echo json_encode($quest_jeu1);
        echo json_encode($rep_jeu1);
    }

    public function get_data_game($table) {

        $this->sql = $this->bdd->query("select * from $table")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function set_db_words($question, $reponse, $table) {

        $this->sql = $this->bdd->prepare("INSERT INTO $table (`question`, `phrase`, `bonnerep`) VALUES (?,?,?)");
        $this->sql->bindParam(1, $question);
        $this->sql->bindParam(2, $reponse);
        $this->sql->bindParam(3, $reponse);

        $this->sql->execute();

        echo json_encode($question);
        echo json_encode($reponse);
        echo json_encode($table);

    }
}