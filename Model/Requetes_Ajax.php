<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/04/2019
 * Time: 11:59
 */
include "Model/Utilitaires.php";

class Requetes_Ajax
{

    private $bdd;
    private $utils;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=projet_site;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }

        $this->utils = new Utilitaires();

    }

    public function get_html($id) {

        $sql = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id and matiere = 'HTML'");

        $result = $sql->fetchAll();

        return $result;

    }

    public function get_css($id) {

        $sql = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id and matiere = 'CSS'");

        $result = $sql->fetchAll();

        return $result;

    }

    public function get_js($id) {

        $sql = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id and matiere = 'JS'");

        $result = $sql->fetchAll();

        return $result;

    }

    public function get_php($id) {

        $sql = $this->bdd->query("SELECT score FROM score_users WHERE id_users = $id and matiere = 'PHP'");

        $result = $sql->fetchAll();

        return $result;

    }



    public function get_words_scores($id)
    {

        $score_html = $this->get_html($id);

        $tabJeu[] = $score_html;

        $score_css = $this->get_css($id);

        $tabJeu[] = $score_css;

        $score_js = $this->get_js($id);

        $tabJeu[] = $score_js;

        $score_php = $this->get_php($id);

        $tabJeu[] = $score_php;

        echo json_encode($tabJeu);

    }

    public function generate_graph($id)
    {

        $sql = $this->bdd->prepare("select * from score_quizz where id_users = ?");

        $sql->bindValue(1, $id);

        $sql->execute();

        $result = $sql->fetchAll();

        echo json_encode($result);

    }

    public function generate_graph2($id)
    {

        $sql = $this->bdd->prepare("select * from score_questions where id_users = ?");

        $sql->bindValue(1, $id);

        $sql->execute();

        $result = $sql->fetchAll();

        echo json_encode($result);

    }



    public function content1()
    {

        $sql = $this->bdd->query("select * from db_questions")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($sql);

    }

    public function content2()
    {

        $sql = $this->bdd->query("select * from db_quizz")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($sql);

    }

    public function content_words($table)
    {

        $sql = $this->bdd->prepare("select * from db_memo WHERE matiere = '$table'");

        $sql->bindParam(1, $table);

        $sql->execute();

        $result = $sql->fetchAll();

        echo json_encode($result);

    }


    public function set_data_jeu1($quest_jeu1, $rep_jeu1)
    {

        $sql = $this->bdd->prepare("INSERT INTO `db_questions` (`questions`, `reponses`) VALUES (?,?)");

        $sql->bindParam(1, $quest_jeu1);
        $sql->bindParam(2, $rep_jeu1);

        $sql->execute();

    }

    public function get_data_game($table)
    {

        $sql = $this->bdd->query("select * from $table")->fetchall(PDO::FETCH_OBJ);
        echo json_encode($sql);

    }

    public function set_db_words($question, $reponse, $table)
    {

        $sql = $this->bdd->prepare("INSERT INTO db_memo (`question`, `mot`, `bonnerep`, `matiere`) VALUES (?,?,?,?)");
        $sql->bindParam(1, $question);
        $sql->bindParam(2, $reponse);
        $sql->bindParam(3, $reponse);
        $sql->bindParam(4, $table);
        $sql->execute();

    }

    public function set_quizz_content($question, $reponseA, $reponseB, $reponseC, $reponseD, $bonne_rep, $explications)
    {

        $sql = $this->bdd->prepare("INSERT INTO db_quizz (`question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `bonnereponse`, `contenusolution`) VALUES (?,?,?, ?, ?, ?, ?)");
        $sql->bindParam(1, $question);
        $sql->bindParam(2, $reponseA);
        $sql->bindParam(3, $reponseB);
        $sql->bindParam(4, $reponseC);
        $sql->bindParam(5, $reponseD);
        $sql->bindParam(6, $bonne_rep);
        $sql->bindParam(7, $explications);

        $sql->execute();
    }



}
