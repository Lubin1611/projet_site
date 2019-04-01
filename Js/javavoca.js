//alert("Bienvenue sur mon site de révisions en Italien ! Dans vos réponses, n'utilisez pas de majuscules, ni d'accents, mon appli web ne le prend pas encore en compte. Revenez régulièrement, " +
 //   " le contenu sera mis a jour prochainement.")

var questions = ["Que veux dire bastano ?", "Que veux dire conferenze ?", "Que veux dire arginare ?", "Que veux dire scomparso ?",
    "Que veux dire sperare ?", "Que veux dire fare ?", "Que veux dire fanculo ?", "Que veux dire tanta?", "Que veux dire scherzo?", "Que veux dire ti auguro ?"
    , "Que veux dire andare ?", "Que veux dire dovere ?", "Que veux dire conoscere ?", "Que veux dire sapere ?", "Que veux dire sedersi ?", "Que veux dire casa ?",
    "Que veux dire giornale ?", "Que veux dire addormentare ?", "Que veux dire portare a spasso?", "Que veux dire una strada ?", "Que veux dire une città ?", "Que veux dire in campagna ?"
    , "Que veux dire un contadino ?", "Que veux dire una finestra ?", "Que veux dire un giardino ?", "Que veux dire una gallina ?", "Que veux dire quadro d'autore ?", "Que veux dire cucinare ?"];

var reponses = ["suffisant", "conference", "enrayer", "disparaitre", "esperer", "faire", "putain", "beaucoup", "canular", "je te souhaite", "aller"
    , "devoir", "connaitre", "savoir", "s'assoir", "maison", "journal", "s'endormir", "se promener", "une rue", "une ville", "a la campagne", "un paysan",
     "une fenetre", "un jardin", "une poule", "tableau de maitre", "faire la cuisine"];

var randQuestions = Math.floor(Math.random() * questions.length);
var pts = 0;
var vie = 3;



function boutonReponse () {

    var utilisateur = champUtilisateur.value;

    if (randQuestions == 0 && utilisateur == reponses[0]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 0 && utilisateur !== reponses[0]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";


        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[0];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }


    else if (randQuestions == 1 && utilisateur == reponses[1]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 1 && utilisateur !== reponses[1]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[1];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 2 && utilisateur == reponses[2]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";



    } else if (randQuestions == 2 && utilisateur !== reponses[2]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[2];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }


    else if (randQuestions == 3 && utilisateur == reponses[3]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 3 && utilisateur !== reponses[3]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[3];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 4 && utilisateur == reponses[4]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";



    } else if (randQuestions == 4 && utilisateur !== reponses[4]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[4];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";

        }
    }

    else if (randQuestions == 5 && utilisateur == reponses[5]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";



    }  else if (randQuestions == 5 && utilisateur !== reponses[5]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[5];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 6 && utilisateur == reponses[6]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 6 && utilisateur !== reponses[6]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[6];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 7 && utilisateur == reponses[7]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 7 && utilisateur !== reponses[7]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";


        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[7];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 8 && utilisateur == reponses[8]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 8 && utilisateur !== reponses[8]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[8];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 9 && utilisateur == reponses[9]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 9 && utilisateur !== reponses[9]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[9];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 10 && utilisateur == reponses[10]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 10 && utilisateur !== reponses[10]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[10];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 11 && utilisateur == reponses[11]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 11 && utilisateur !== reponses[11]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[11];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 12 && utilisateur == reponses[12]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 12 && utilisateur !== reponses[12]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[12];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 13 && utilisateur == reponses[13]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 13 && utilisateur !== reponses[13]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[13];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 14 && utilisateur == reponses[14]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";


    } else if (randQuestions == 14 && utilisateur !== reponses[14]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[14];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 15 && utilisateur == reponses[15]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 15 && utilisateur !== reponses[15]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[15];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 16 && utilisateur == reponses[16]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 16 && utilisateur !== reponses[16]) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[16];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }


    else if (randQuestions == 17 && utilisateur == reponses[17]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    } else if (randQuestions == 17 && utilisateur !== reponses[17]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[17];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 18 && utilisateur == reponses[18]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 18 && utilisateur !== reponses[18]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[18];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 19 && utilisateur == reponses[19]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 19 && utilisateur !== reponses[19]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[19];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 20 && utilisateur == reponses[20]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 20 && utilisateur !== reponses[20]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[20];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 21 && utilisateur == reponses[21]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 21 && utilisateur !== reponses[21]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[21];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 22 && utilisateur == reponses[22]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 22 && utilisateur !== reponses[22]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[22];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 23 && utilisateur == reponses[23]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 23 && utilisateur !== reponses[23]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[23];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 24 && utilisateur == reponses[24]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 24 && utilisateur !== reponses[24]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[24];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 25 && utilisateur == reponses[25]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 25 && utilisateur !== reponses[25]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[25];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 26 && utilisateur == reponses[26]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 26 && utilisateur !== reponses[26]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[26];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 27 && utilisateur == reponses[27]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 27 && utilisateur !== reponses[27]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[27];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    else if (randQuestions == 28 && utilisateur == reponses[28]) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";
        document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

    }   else if (randQuestions == 28 && utilisateur !== reponses[28]) {


        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + reponses[28];
            document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";
        }
    }

    if (pts > 10) {

        document.getElementById("highScore").innerHTML = " Quel talent ! vous obtenez 500 points !"

    }

    if (pts > 20) {

        document.getElementById("highScore").innerHTML = " Quel talent ! vous obtenez 1500 points !"

    }

    if (pts > 25) {

        document.getElementById("highScore").innerHTML = " Quel talent ! vous obtenez 3000 points !"

    }

    if (pts > 30) {

        document.getElementById("highScore").innerHTML = " Quel talent ! vous obtenez 4000 points !"

    }

    if (pts > 40) {

        document.getElementById("highScore").innerHTML = " Quel talent ! vous obtenez 5000 points !" + " Vous êtes un génie."

    }
}

document.getElementById("questions").innerHTML = questions[randQuestions];

function nextBtn () {

    document.getElementById("bouton").disabled = false;
    randQuestions = Math.floor(Math.random() * questions.length);
    document.getElementById("questions").innerHTML = questions[randQuestions];
    document.getElementById("nextButton").innerHTML = " ";
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").innerHTML = " ";

}

function reset () {

    document.getElementById("bouton").disabled = false;
    randQuestions = Math.floor(Math.random() * questions.length);
    document.getElementById("questions").innerHTML = questions[randQuestions];
    document.getElementById("nextButton").innerHTML = " ";
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").innerHTML = " ";
    vie = 3;

}
