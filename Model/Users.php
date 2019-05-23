<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 11:26
 */

include "Model/Security.php";

class Users
{

    private $sql;
    private $password;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=tryenglixplub160.mysql.db;dbname=tryenglixplub160;charset=utf8', 'tryenglixplub160', 'Tob16cot11',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $this->password = new Security();
    }

    function sign_up($nom, $prenom, $pseudo, $motdepasse, $avatar, $mail, $rang)
    {
        $motdepasse = $this->password->crypt_password($motdepasse);

        $sql = $this->bdd->prepare("INSERT INTO `users` (`nom`, `prenom`, `pseudo`, `password`, `avatar`, `mail`, `rang`) VALUES (?,?,?,?,?,?,?)");

        $sql->bindParam(1, $nom);
        $sql->bindParam(2, $prenom);
        $sql->bindParam(3, $pseudo);
        $sql->bindParam(4, $motdepasse);
        $sql->bindParam(5, $avatar);
        $sql->bindParam(6, $mail);
        $sql->bindParam(7, $rang);

        $sql->execute();

    }

    public function deleteMember($id) {

        $user = $this->bdd->prepare("delete from users WHERE id_users = ? ");

        $user->bindValue(1, $id, PDO::PARAM_INT);

        $user->execute();
    }




    function log($pseudo, $password)
    {
        $sql = $this->bdd->prepare("select * from users where pseudo = ?");

        $sql->bindValue(1, $pseudo, PDO::PARAM_STR);

        $sql->execute();

        $result = $sql->fetch();

        $hash = $result['password'];

        if (password_verify($password, $hash) and $pseudo == $result['pseudo']) {

            session_start();

            $_SESSION['id'] = $result['id_users'];
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['pseudo'] = $result['pseudo'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['avatar'] = $result['avatar'];
            $_SESSION['rang'] = $result['rang'];

        }

    }


    public function verifmail($mail) {

        $sql = $this->bdd->prepare("select * from users where `mail` = '$mail'");
        $sql->bindValue(1, $mail);

        $sql->execute();

        $resultat = $sql->fetch();

        if (empty($resultat['mail'])) {

            return '0';

        } else {

            return '1';

        }
    }


    public function setToken($mail, $token) {

        $sql = "UPDATE users set jeton= ? where mail = ?";
        $this->bdd->prepare($sql)->execute([$token, $mail]);

    }

    public function sendmail($token, $mail, $sender)
    {

        $message=  '<p>Bonjour, Nous ne pouvons pas vous renvoyer votre mot de passe, pour des raisons de sécurité</p>
                    <a href="www.try-english.ovh/index.php?controler=users&action=changepass&token='.$token.'"> 
                    cliquez sur ce lien pour créer un nouveau mot de passe </a>';

        $titre= "modification de mot de passe";

        $recepteur = $mail;

        $headers = "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
        $headers.='Content-Transfer-Encoding: 8bit';
        $headers .= 'From:'.$sender . "\r\n";
        $headers.='Reply-To:'.$sender . "\r\n";
        $headers.= 'X-Mailer: PHP/' . phpversion();

        mail($recepteur,$titre, $message, $headers);

    }

    public function set_pass($token, $mdp) {

        $newhash = $this->password->crypt_password($mdp);

        $sql = "UPDATE users set password = ? where jeton = ?";

        $this->bdd->prepare($sql)->execute([$newhash, $token]);

    }

    public function infos_membres() {


        $id_session = $_SESSION['id'];

        $sql = $this->bdd->query("select * from users where id_users = $id_session");

        $sql = $sql->fetch();

        return $sql;


    }

    public function get_all_members() {

        $sql = $this->bdd->query("select * from users ")->fetchAll(PDO::FETCH_OBJ);
        return $sql;

    }

    public function check($pseudo, $mail)
    {

        $sql = $this->bdd->prepare("select * from users where `pseudo` = ? or `mail` = ?");

        $sql->bindValue(1, $pseudo);
        $sql->bindValue(2, $mail);

        $sql->execute();

        $resultat = $sql->fetch();

        if (empty($resultat['pseudo']) or empty($resultat['mail'])) {

            return "1";

        }

       else {

            return "2";
        }


    }

    public function logout() {

        $_SESSION['rang'] = "";
        session_destroy();

    }
}