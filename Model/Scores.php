<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 11/04/2019
 * Time: 10:54
 */

class Scores
{

    private $sql;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=projet_site;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }

    }

    public function score($id, $matiere, $result)
    {

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/y H:i:s");

        $this->sql = $this->bdd->prepare("INSERT INTO `score_users` (`score`, `date`, `id_users`, `matiere`) VALUES (?,?,?,?)");
        $this->sql->bindParam(1, $result);
        $this->sql->bindParam(2, $date);
        $this->sql->bindParam(3, $id);
        $this->sql->bindParam(4, $matiere);
        $this->sql->execute();

    }
}