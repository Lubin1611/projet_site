var randQuestions;
var content;
function ajax_loadDB() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

             content = JSON.parse(this.responseText);
            console.log(content);


            randQuestions =  Math.floor(Math.random() * content.length);
            console.log(randQuestions + content[randQuestions].questions );
            console.log(content[randQuestions].reponses);
            document.getElementById("questions").innerHTML = content[randQuestions].questions;

        }

    };

    xhttp.open("GET", "index.php?controler=ajax&action=get_questions", true);

    xhttp.send();

}

window.onload = function () {
    ajax_loadDB();
};

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

    if (utilisateur == content[randQuestions].reponses) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";

        var newButton = document.createElement('button');
        newButton.innerHTML = "Suivant";
         newButton.id = 'nextButton';
        newButton.onclick = nextBtn;
        document.getElementById('container_questions').appendChild(newButton);

        //  document.getElementById("nextButton").innerHTML = "<button onclick = nextBtn() class=\"tailleBouton\">Suivant</button>";
        pts++;
        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + pts + " bons points";
        document.getElementById("champUtilisateur").innerHTML = " ";

        pts_serie++;
        tentatives++;
        compteur_highscore++;

    } else if (utilisateur != content[randQuestions].reponses) {

        document.getElementById("reponse").innerHTML = "nope";
        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + content[randQuestions].reponses;
          //  document.getElementById("nextButton").innerHTML = "<button onclick = reset() class=\"tailleBouton\">Autre mot</button>";

            var newButton = document.createElement('button');
            newButton.innerHTML = "Suivant";
            newButton.id = 'nextButton';
            newButton.onclick = nextBtn;
            document.getElementById('container_questions').appendChild(newButton);


            tentatives++;
        }
    }

    function create_next_button() {

        var newButton = document.createElement('div');
        newButton.innerHTML = "Suivant";
       // newButton.className = 'tailleBouton';
       // newButton.id = nextButton;
        newButton.onclick = nextBtn;
        document.getElementById('container_questions').appendChild(newButton);

    }

    function ajax_classement() {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                var obj = JSON.parse(this.responseText);

                console.log(obj);

                for (var i = 0; i < obj.length; i++) {

                    var obj1 = document.createElement('div');
                    obj1.innerHTML =  "Nom : " + obj[i].id_highscore;
                    document.getElementById('nom').appendChild(obj1);

                    var obj2 = document.createElement('div');
                    obj2.innerHTML =  "Score : " + obj[i].score;
                    document.getElementById('score').appendChild(obj2);

                }
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
    randQuestions =  Math.floor(Math.random() * content.length)
    document.getElementById("questions").innerHTML = content[randQuestions].questions;
    $('#nextButton').remove()
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").value = " ";

}

function reset() {

    document.getElementById("bouton").disabled = false;
    randQuestions =  Math.floor(Math.random() * content.length)
    document.getElementById("questions").innerHTML = content[randQuestions].questions;
    $('#nextButton').remove()
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").value = " ";
    vie = 3;

}


function recommencer() {

    tentatives = 0;
    pts = 0;

    document.getElementById("fin_serie").style.display = "none";
    document.getElementById("accueil_jeu").style.display = "block";
    document.getElementById("bouton").disabled = false;

    randQuestions =  Math.floor(Math.random() * content.length)

    document.getElementById("questions").innerHTML = content[randQuestions].questions
    ;$('#nextButton').remove()
     document.getElementById("note_serie").innerHTML = " ";
    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").value = " ";
}


console.log("compteur : " + compteur_highscore);