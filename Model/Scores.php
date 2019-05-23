<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 11/04/2019
 * Time: 10:54
 */
include "Model/Utilitaires.php";

class Scores
{
    private $bdd;
    private $utils;
    /*
     * Intercepte une exception et affiche des informations complémentaires le cas échéant.
     */
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
    /*
     * Enregistrement des scores
     */
    public function score($id, $matiere, $result)
    {

        var_dump($id, $matiere, $result);

        $date = $this->utils->get_date();

        $sql=$this->bdd->prepare("INSERT INTO `score_users` (`score`, `date`, `id_users`, `matiere`) VALUES (?,?,?,?)");
        $sql->bindParam(1, $result);
        $sql->bindParam(2, $date);
        $sql->bindParam(3, $id);
        $sql->bindParam(4, $matiere);

        $sql->execute();
    }

    public function set_quiz_score($score, $id)
    {

        $date = $this->utils->get_date();

        $sql = $this->bdd->prepare("INSERT INTO `score_quizz` (`score`, `date_quizz`, `id_users`) VALUES (?,?,?)");
        $sql->bindParam(1, $score);
        $sql->bindParam(2, $date);
        $sql->bindParam(3, $id);
        $sql->execute();

        echo json_encode($score, $id);

    }
    public function score_questions($id, $result)
    {

        $date = $this->utils->get_date();

        $sql = $this->bdd->prepare("INSERT INTO `score_questions` (`date_reponses`, `score`, `id_users`) VALUES (?,?,?)");
        $sql->bindParam(1, $date);
        $sql->bindParam(2, $result);
        $sql->bindParam(3, $id);

        $sql->execute();

    }


    public function classement()
    {

        $classement = $this->bdd->query("select * from highscore order by score desc")->fetchall(PDO::FETCH_OBJ);

        echo json_encode($classement);

    }

    public function check_highscore($id, $score, $pseudo) {

        $highscore= $this->bdd->prepare("select * from highscore where `id_users` = ?");

        $highscore->bindValue(1, $id);

        $highscore->execute();

        $resultat = $highscore->fetch();

        if (!empty($resultat['id_highscore'])) {

            $this->set_highscore($score, $id);

        }

        else {

            $this->create_highscore($score, $id, $pseudo);
        }

    }

    public function set_highscore($score, $id)
    {

        $sql = "UPDATE `highscore` SET score=? WHERE id_users = ?";
        $this->bdd->prepare($sql)->execute([$score, $id]);

    }


    public function create_highscore($score, $id, $pseudo) {


        $highscore = $this->bdd->prepare("INSERT INTO `highscore` (`score`,`id_users`, `pseudo`) VALUES (?,?,?)");

        $highscore->bindParam('1', $score);
        $highscore->bindParam('2', $id);
        $highscore->bindParam('3', $pseudo);
        $highscore->execute();

        echo json_encode($score);
        echo json_encode($id);
        echo json_encode($pseudo);

    }

}
