<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 11:26
 */

class Users
{
    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=projet_site;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    function sign_up($nom, $prenom, $pseudo, $motdepasse, $avatar, $mail, $rang)
    {
        $motdepasse = sha1($motdepasse);

        $this->sql = $this->bdd->prepare("INSERT INTO `users` (`nom`, `prenom`, `pseudo`, `password`, `avatar`, `mail`, `rang`) VALUES (?,?,?,?,?,?,?)");

        $this->sql->bindParam(1, $nom);
        $this->sql->bindParam(2, $prenom);
        $this->sql->bindParam(3, $pseudo);
        $this->sql->bindParam(4, $motdepasse);
        $this->sql->bindParam(5, $avatar);
        $this->sql->bindParam(6, $mail);
        $this->sql->bindParam(7, $rang);

        var_dump($this->sql);

        $this->sql->execute();

    }

    function log($pseudo, $password)
    {
        $password = sha1($password);

        $this->sql = $this->bdd->query("select * from users where password = '$password' and pseudo = '$pseudo'");

        $this->sql = $this->sql->fetch();

        if ($password == $this->sql['password'] and $pseudo == $this->sql['pseudo']) {

            ?><div id = "access_granted">Vous êtes bien connecté</div> <?php

            session_start();

            $_SESSION['id'] = $this->sql['id_users'];
            $_SESSION['nom'] = $this->sql['nom'];
            $_SESSION['prenom'] = $this->sql['prenom'];
            $_SESSION['pseudo'] = $this->sql['pseudo'];
            $_SESSION['password'] = $this->sql['password'];
            $_SESSION['rang'] = $this->sql['rang'];


        } else {

            ?>
            <div id="access_denied">Identifiant ou mot de passe non valide</div><?php

        }

    }


    public function infos_membres() {

        session_start();

        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from users where id_users = $id_session");

        $this->sql = $this->sql->fetch();

        return $this->sql;


    }

    public function get_all_members() {

        $this->sql = $this->bdd->query("select * from users where rang = 0")->fetchAll(PDO::FETCH_OBJ);
        return $this->sql;

    }

    public function logout() {

        session_destroy();

    }
}