<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 09/03/2019
 * Time: 15:57
 */


class connection_sql
{

    private $sql;
    private $nom;
    private $prenom;
    private $pseudo;
    private $motdepasse;
    private $mail;
    private $admin;
    private $logPseudo;
    private $logMdp;
    private $statut;
    private $nvstat;

    public function __construct()
    {

        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=projet_site;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }


    public function inscription()
    {
        var_dump($_POST);

        $this->sql = $this->bdd->prepare("INSERT INTO `inscriptions_login` (`nom`, `prenom`, `pseudo`, `password`, `mail`, `admin`) VALUES (?,?,?,?,?,?)");

        $this->nom = $_POST['nom'];
        filter_var($this->nom, FILTER_SANITIZE_STRING);

        $this->prenom = $_POST['prenom'];
        filter_var($this->prenom, FILTER_SANITIZE_STRING);

        $this->pseudo = $_POST['pseudo'];
        filter_var($this->pseudo, FILTER_SANITIZE_STRING);

        $this->mail = $_POST['mail'];
        filter_var($this->mail, FILTER_SANITIZE_STRING);

        $this->motdepasse = $_POST['mdp'];
        filter_var($this->motdepasse, FILTER_SANITIZE_STRING);

        $this->admin = '0';


        $this->sql->bindParam(1, $this->nom);
        $this->sql->bindParam(2, $this->prenom);
        $this->sql->bindParam(3, $this->pseudo);
        $this->sql->bindParam(4, $this->motdepasse);
        $this->sql->bindParam(5, $this->mail);
        $this->sql->bindParam(6, $this->admin);

        var_dump($this->sql);

        $this->sql->execute();


    }



    public function log()
    {

        $this->logMdp = $_POST['logMdp'];
        filter_var($this->logMdp, FILTER_SANITIZE_STRING);

        $this->logPseudo = $_POST['logPseudo'];
        filter_var($this->logPseudo, FILTER_SANITIZE_STRING);

        $this->statut = "1";


            $this->sql = $this->bdd->query("SELECT * FROM `inscriptions_login` WHERE pseudo ='$this->logPseudo'  and  password = '$this->logMdp'");

            $this->sql = $this->sql->fetch();



        if ($this->logPseudo == $this->sql['pseudo'] and $this->logMdp == $this->sql['password']) {

            $this-> nvstat = new connection_sql();


            session_start();

            $_SESSION['pseudo'] = $this->sql['pseudo'];
            $_SESSION['nom'] = $this->sql['nom'];
            $_SESSION['prenom'] = $this->sql['prenom'];
            $_SESSION['admin'] = $this->sql['admin'];
            $_SESSION['mail'] = $this->sql['mail'];
            $_SESSION['id'] = $this->sql['id'];
            $_SESSION['mdp'] = $this->sql['password'];

            header("Location:View\confirmation.html");

        }   else {

            echo "non connecté";
        }
    }

    public function logout() {

        session_start();
        session_destroy();

        header ('location:View\confirmation.html');

    }
}