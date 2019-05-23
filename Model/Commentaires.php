<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 17/04/2019
 * Time: 16:28
 */
include "Model/Utilitaires.php";

class Commentaires
{

    private $bdd;
    private $utils;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=tryenglixplub160.mysql.db;dbname=tryenglixplub160;charset=utf8', 'tryenglixplub160', 'Tob16cot11',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }

        $this->utils = new Utilitaires();
    }

    /*
     * Récupération de tous
     */
    public function get_all_coms($jeu)
    {

        $commentaires = $this->bdd->query("select * from commentaires WHERE jeu = '$jeu'")->fetchAll(PDO::FETCH_OBJ);
        return $commentaires;
    }


    public function get_com_memo_by_id($id)
    {
        $commentaire = $this->bdd->prepare("select * from commentaires WHERE id_com = ? ");

        $commentaire->bindValue(1, $id, PDO::PARAM_INT);

        $commentaire->execute();

        $result = $commentaire->fetch();

        return $result;

    }

    public function set_com_memo_by_id($id, $commentaire)
    {

        $editcom = "UPDATE `commentaires` SET contenu_com = ? WHERE id_com = ?";
        $this->bdd->prepare($editcom)->execute([$commentaire, $id]);

    }

    public function delete_com_memo_by_id($id)
    {
        $commentaire = $this->bdd->prepare("delete from commentaires WHERE id_com = ? ");

        $commentaire->bindValue(1, $id, PDO::PARAM_INT);

        $commentaire->execute();
    }


    public function write_tbl_com($pseudo, $contenu, $avatar, $jeu, $id)
    {
        $time = $this->utils->get_date();

        $sql = $this->bdd->prepare("INSERT INTO `commentaires` (date_com, contenu_com, id_users, avatar, jeu, pseudo)VALUES(?,?,?,?,?,?)");

        $sql->bindParam(1, $time);
        $sql->bindParam(2, $contenu);
        $sql->bindParam(3, $id);
        $sql->bindParam(4, $avatar);
        $sql->bindParam(5, $jeu);
        $sql->bindParam(6, $pseudo);

        $sql->execute();

    }

    public function get_highscore($id)
    {
        $highscore = $this->bdd->query("select * from highscore where id_users = $id")->fetch(PDO::FETCH_ASSOC);
        return $highscore;
    }
}