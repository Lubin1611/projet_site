var questions = ["Que veux dire bastano ?", "Que veux dire conferenze ?", "Que veux dire arginare ?", "Que veux dire scomparso ?",
    "Que veux dire sperare ?", "Que veux dire fare ?", "Que veux dire fanculo ?", "Que veux dire tanta?", "Que veux dire scherzo?", "Que veux dire ti auguro ?"
    , "Que veux dire andare ?", "Que veux dire dovere ?", "Que veux dire conoscere ?", "Que veux dire sapere ?", "Que veux dire sedersi ?", "Que veux dire casa ?",
    "Que veux dire giornale ?", "Que veux dire addormentare ?", "Que veux dire portare a spasso?", "Que veux dire una strada ?", "Que veux dire une città ?", "Que veux dire in campagna ?"
    , "Que veux dire un contadino ?", "Que veux dire una finestra ?", "Que veux dire un giardino ?", "Que veux dire una gallina ?", "Que veux dire quadro d'autore ?", "Que veux dire cucinare ?"];

var reponses = ["suffisant", "conference", "enrayer", "disparaitre", "esperer", "faire", "putain", "beaucoup", "canular", "je te souhaite", "aller"
    , "devoir", "connaitre", "savoir", "s'assoir", "maison", "journal", "s'endormir", "se promener", "une rue", "une ville", "a la campagne", "un paysan",
    "une fenetre", "un jardin", "une poule", "tableau de maitre", "faire la cuisine"];




var randQuestions = Math.floor(Math.random() * questions.length);
document.getElementById("questions").innerHTML = questions[randQuestions];
var highscore;

var pts = 0;
var pts_serie = document.getElementById('highScore').innerHTML;
var vie = 3;
var tentatives = 0;
var compteur_highscore = 0;

$('#start').on('click', function () {

    document.getElementById('accueil_jeu').style.display = "none";
    document.getElementById('container_questions').style.display = "block";
});


function boutonReponse() {

    var utilisateur = champUtilisateur.value;

    if (randQuestions == 0 && utilisateur == reponses[0]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

        pts_serie++;
        tentatives++;
        compteur_highscore++;

    } else if (randQuestions == 0 && utilisateur !== reponses[0]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";


        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[0];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";

            tentatives++;
        }
    } else if (randQuestions == 1 && utilisateur == reponses[1]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 1 && utilisateur !== reponses[1]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[1];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 2 && utilisateur == reponses[2]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

        tentatives++;
        pts_serie++;
        compteur_highscore++;

    } else if (randQuestions == 2 && utilisateur !== reponses[2]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[2];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 3 && utilisateur == reponses[3]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 3 && utilisateur !== reponses[3]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[3];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 4 && utilisateur == reponses[4]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 4 && utilisateur !== reponses[4]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[4];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 5 && utilisateur == reponses[5]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 5 && utilisateur !== reponses[5]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[5];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 6 && utilisateur == reponses[6]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 6 && utilisateur !== reponses[6]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[6];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 7 && utilisateur == reponses[7]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 7 && utilisateur !== reponses[7]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";


        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[7];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 8 && utilisateur == reponses[8]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 8 && utilisateur !== reponses[8]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[8];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 9 && utilisateur == reponses[9]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 9 && utilisateur !== reponses[9]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[9];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 10 && utilisateur == reponses[10]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 10 && utilisateur !== reponses[10]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[10];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 11 && utilisateur == reponses[11]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 11 && utilisateur !== reponses[11]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[11];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 12 && utilisateur == reponses[12]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 12 && utilisateur !== reponses[12]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[12];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 13 && utilisateur == reponses[13]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 13 && utilisateur !== reponses[13]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[13];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 14 && utilisateur == reponses[14]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 14 && utilisateur !== reponses[14]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[14];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 15 && utilisateur == reponses[15]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 15 && utilisateur !== reponses[15]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[15];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 16 && utilisateur == reponses[16]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 16 && utilisateur !== reponses[16]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[16];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 17 && utilisateur == reponses[17]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 17 && utilisateur !== reponses[17]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[17];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 18 && utilisateur == reponses[18]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 18 && utilisateur !== reponses[18]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[18];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 19 && utilisateur == reponses[19]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 19 && utilisateur !== reponses[19]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[19];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 20 && utilisateur == reponses[20]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 20 && utilisateur !== reponses[20]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[20];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 21 && utilisateur == reponses[21]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 21 && utilisateur !== reponses[21]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[21];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 22 && utilisateur == reponses[22]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 22 && utilisateur !== reponses[22]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[22];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 23 && utilisateur == reponses[23]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 23 && utilisateur !== reponses[23]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[23];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 24 && utilisateur == reponses[24]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 24 && utilisateur !== reponses[24]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[24];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 25 && utilisateur == reponses[25]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 25 && utilisateur !== reponses[25]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[25];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 26 && utilisateur == reponses[26]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 26 && utilisateur !== reponses[26]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[26];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 27 && utilisateur == reponses[27]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 27 && utilisateur !== reponses[27]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[27];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    } else if (randQuestions == 28 && utilisateur == reponses[28]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";
        tentatives++;
        pts_serie++;
        compteur_highscore++;
    } else if (randQuestions == 28 && utilisateur !== reponses[28]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[28];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
            tentatives++;
        }
    }

    function ajax_classement() {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {



                console.log(this.responseText);
            }

        };

        xhttp.open("GET", "index.php?controler=ajax&action=get_classement", true);

        xhttp.send();
    }

    function ajaxadd_highscore() {

        alert("envoi en cours");

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {



                console.log(this.responseText);
            }

        };

        xhttp.open("GET", "index.php?controler=ajax&action=send_score&score=" + highscore, true);

        xhttp.send();

    }

    if (tentatives == 10) {


        highscore = document.getElementById("highScore").innerHTML;
        console.log(highscore);
        ajaxadd_highscore();

        document.getElementById("container_questions").style.display = "none";
        document.getElementById("fin_serie").style.display = "block";

        ajax_classement();

        document.getElementById("resultat_quest").innerHTML = pts + " /10";
        document.getElementById("resultat_quest").value = pts_serie;
        document.getElementById("score_jeuquestions").value = pts_serie;

        ajax_classement();
    }

    if (compteur_highscore == 5) {

            pts_serie = pts_serie + 500;
            document.getElementById("highScore").innerHTML = pts_serie;
            compteur_highscore = 0;
            console.log(compteur_highscore);
        }


}


function nextBtn() {

    document.getElementById("bouton").disabled = false;
    randQuestions = Math.floor(Math.random() * questions.length);
    document.getElementById("questions").innerHTML = questions[randQuestions];
    document.getElementById("nextButton").innerHTML = " ";
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").innerHTML = " ";

}

function reset() {

    document.getElementById("bouton").disabled = false;
    randQuestions = Math.floor(Math.random() * questions.length);
    document.getElementById("questions").innerHTML = questions[randQuestions];
    document.getElementById("nextButton").innerHTML = " ";
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").innerHTML = " ";
    vie = 3;

}


function recommencer() {

    tentatives = 0;
    pts = 0;

    document.getElementById("fin_serie").style.display = "none";
    document.getElementById("accueil_jeu").style.display = "block";
    document.getElementById("bouton").disabled = false;

    randQuestions = Math.floor(Math.random() * questions.length);

    document.getElementById("questions").innerHTML = questions[randQuestions];
    document.getElementById("nextButton").innerHTML = " ";
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").innerHTML = " ";
}


