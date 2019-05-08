<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 17/04/2019
 * Time: 16:28
 */
include "Model/Utilitaires.php";

class Commentaires_jeux
{

    private $sql;
    private $commentaires;
    private $highscore;
    private $classement;
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

    public function get_all_coms()
    {

        $this->commentaires = $this->bdd->query("select * from commentaires")->fetchAll(PDO::FETCH_OBJ);
        return $this->commentaires;
    }

    public function get_all_coms2()
    {

        $this->commentaires = $this->bdd->query("select * from commentaires_jeu1")->fetchAll(PDO::FETCH_OBJ);
        return $this->commentaires;
    }

    public function get_all_coms3()
    {

        $this->commentaires = $this->bdd->query("select * from commentaires_jeu2")->fetchAll(PDO::FETCH_OBJ);
        return $this->commentaires;
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


    public function write_com_tbl1($pseudo, $contenu, $avatar)
    {

        $time = $this->utils->get_date();

        $this->sql = $this->bdd->prepare("INSERT INTO `commentaires_jeu1` (date_com, contenu_com, pseudo_user, avatar)VALUES(?,?,?,?);");

        $this->sql->bindParam(1, $time);
        $this->sql->bindParam(2, $contenu);
        $this->sql->bindParam(3, $pseudo);
        $this->sql->bindParam(4, $avatar);

        $this->sql->execute();

    }

    public function write_com_tbl2($pseudo, $contenu, $avatar)
    {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");


        $this->sql = $this->bdd->prepare("INSERT INTO `commentaires` (date_com, contenu_com, pseudo_user, avatar) VALUES (?,?,?,?) ;");

        $this->sql->bindParam(1, $date);
        $this->sql->bindParam(2, $contenu);
        $this->sql->bindParam(3, $pseudo);
        $this->sql->bindParam(4, $avatar);

        $this->sql->execute();

    }

    public function write_com_tbl3($pseudo, $contenu, $avatar)
    {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");


        $this->sql = $this->bdd->prepare("INSERT INTO `commentaires_jeu2` (date_com, contenu_com, pseudo_user, avatar) VALUES (?,?,?,?) ;");

        $this->sql->bindParam(1, $date);
        $this->sql->bindParam(2, $contenu);
        $this->sql->bindParam(3, $pseudo);
        $this->sql->bindParam(4, $avatar);

        $this->sql->execute();

    }

    public function get_highscore($id)
    {

        $this->highscore = $this->bdd->query("select * from highscore where id_users = $id")->fetch(PDO::FETCH_ASSOC);
        return $this->highscore;

    }

    public function get_classement()
    {
        $this->classement = $this->bdd->query("select * from highscore order by score desc")->fetchall(PDO::FETCH_OBJ);
        return $this->classement;
    }

}