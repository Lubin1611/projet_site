<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 09/04/2019
 * Time: 11:26
 */

class Users
{

    private $sql;
    private $result;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=id7331055_db_site;charset=utf8', 'id7331055_lulu', 'exobase',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    function sign_up($nom, $prenom, $pseudo, $motdepasse, $avatar, $mail, $rang)
    {
        $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

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

        $this->sql = $this->bdd->prepare("select * from users where pseudo = ?");

        $this->sql->bindValue(1, $pseudo, PDO::PARAM_STR);

        $this->sql->execute();

        $result = $this->sql->fetch();

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
                    <a href="https://paced-nerve.000webhostapp.com/Projet_TEST/index.php?controler=users&action=changepass&token='.$token.'"> 
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

        var_dump($token);
        var_dump($mdp);

        $sql = "UPDATE users set password = ? where jeton = ?";
        $this->bdd->prepare($sql)->execute([$mdp, $token]);


    }

    public function infos_membres() {


        $id_session = $_SESSION['id'];

        $this->sql = $this->bdd->query("select * from users where id_users = $id_session");

        $this->sql = $this->sql->fetch();

        return $this->sql;


    }

    public function get_all_members() {

        $this->sql = $this->bdd->query("select * from users ")->fetchAll(PDO::FETCH_OBJ);
        return $this->sql;

    }

    public function check($pseudo, $mail)
    {

        var_dump($pseudo, $mail);

        $this->sql = $this->bdd->prepare("select * from users where `pseudo` = ? or `mail` = ?");

        $this->sql->bindValue(1, $pseudo);
        $this->sql->bindValue(2, $mail);

        $this->sql->execute();

        $resultat = $this->sql->fetch();

        var_dump($resultat['pseudo'], $resultat['mail']);


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