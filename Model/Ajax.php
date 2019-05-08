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
    private $varuk;
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

    public function get_words_scores($id_session)
    {

        $this->sql = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id_session and matiere = 'HTML'");

        $this->sql = $this->sql->fetchAll();

        $tabJeu[] = $this->sql;

        $this->dede = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id_session and matiere = 'CSS'");

        $this->dede = $this->dede->fetchAll();

        $tabJeu[] = $this->dede;

        $this->toto = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id_session and matiere = 'JS'");

        $this->toto = $this->toto->fetchALL();

        $tabJeu[] = $this->toto;

        $this->varuk = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id_session and matiere = 'PHP'");

        $this->varuk = $this->varuk->fetchALL();

        $tabJeu[] = $this->varuk;

        echo json_encode($tabJeu);

    }

    public function generate_graph()
    {


        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from score_quizz where id_users = $id_session");

        $this->sql = $this->sql->fetchAll();

        echo json_encode($this->sql);

    }

    public function generate_graph2()
    {


        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from score_questions where id_users = $id_session");

        $this->sql = $this->sql->fetchAll();

        echo json_encode($this->sql);

    }

    public function set_highscore($score, $id)
    {

        $this->sql = "UPDATE `highscore` SET score=? WHERE id_users = ?";
        $this->bdd->prepare($this->sql)->execute([$score, $id]);

    }


    public function create_highscore($score, $id) {

        $highscore = $this->bdd->prepare("INSERT INTO `highscore` (`score`,`id_users`) VALUES (?,?)");

        $highscore->bindParam('1', $score);
        $highscore->bindParam('2', $id);
        $highscore->execute();

    }


    public function check_highscore($id, $score) {

        $highscore= $this->bdd->prepare("select * from highscore where `id_users` = ?");

        $highscore->bindValue(1, $id);

        $highscore->execute();

        $resultat = $highscore->fetch();

        if (!empty($resultat['score'])) {

            $this->set_highscore($score, $id);

        }

        else {

            $this->create_highscore($score, $id);
        }

    }


    public function classement()
    {

        $this->classement = $this->bdd->query("select * from highscore order by score desc")
            ->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->classement);

    }

    public function content1()
    {

        $this->sql = $this->bdd->query("select * from db_questions")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content2()
    {

        $this->sql = $this->bdd->query("select * from db_quizz")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function content_words($table)
    {

        $this->sql = $this->bdd->query("select * from $table")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }



    public function set_quizz_score($score, $id)
    {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");

        $this->sql = $this->bdd->prepare("INSERT INTO `score_quizz` (`score`, `date_quizz`, `id_users`) VALUES (?,?,?)");
        $this->sql->bindParam(1, $score);
        $this->sql->bindParam(2, $date);
        $this->sql->bindParam(3, $id);
        $this->sql->execute();

        echo json_encode($score, $id);

    }

    public function set_scores($id_session, $score, $matiere)
    {

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

    public function set_data_jeu1($quest_jeu1, $rep_jeu1)
    {


        $this->sql = $this->bdd->prepare("INSERT INTO `db_questions` (`questions`, `reponses`) VALUES (?,?)");
        $this->sql->bindParam(1, $quest_jeu1);
        $this->sql->bindParam(2, $rep_jeu1);

        $this->sql->execute();

        echo json_encode($quest_jeu1);
        echo json_encode($rep_jeu1);
    }

    public function get_data_game($table)
    {

        $this->sql = $this->bdd->query("select * from $table")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($this->sql);

    }

    public function set_db_words($question, $reponse, $table)
    {

        $this->sql = $this->bdd->prepare("INSERT INTO $table (`question`, `phrase`, `bonnerep`) VALUES (?,?,?)");
        $this->sql->bindParam(1, $question);
        $this->sql->bindParam(2, $reponse);
        $this->sql->bindParam(3, $reponse);

        $this->sql->execute();

        echo json_encode($question);
        echo json_encode($reponse);
        echo json_encode($table);

    }

    public function set_quizz_content($question, $reponseA, $reponseB, $reponseC, $reponseD, $bonne_rep, $explications)
    {

        $this->sql = $this->bdd->prepare("INSERT INTO db_quizz (`question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `bonnereponse`, `contenusolution`) VALUES (?,?,?, ?, ?, ?, ?)");
        $this->sql->bindParam(1, $question);
        $this->sql->bindParam(2, $reponseA);
        $this->sql->bindParam(3, $reponseB);
        $this->sql->bindParam(4, $reponseC);
        $this->sql->bindParam(5, $reponseD);
        $this->sql->bindParam(6, $bonne_rep);
        $this->sql->bindParam(7, $explications);

        $this->sql->execute();
    }
}