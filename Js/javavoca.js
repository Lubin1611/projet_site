// Ces variables sont déclarées globalement, elles seront utilisées pour plusieures fonctions js

var randQuestions; // cette variable contiendra l'algorythme qui va permettre de trier au hasard les questions.
var content; // cette variable contiendra les données du jeu (questions, et réponses par exemple).

// Avec ajax_loadDB, nous créons un appel AJAX qui va récupérer le contenu du jeu en base de données.
function ajax_loadDB() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            content = JSON.parse(this.responseText);
            console.log(content);

            // a la reception des informations, nous affichons le contenu à l'écran

            randQuestions =  Math.floor(Math.random() * content.length);

            // Nous choisissons au hasard une question parmi le contenu disponible.
            document.getElementById("questions").innerHTML = content[randQuestions].questions;

        }

    };

    xhttp.open("GET", "index.php?controler=ajax&action=getQuestions", true);

    xhttp.send();

}


var serie = 0; // cette variable s'incrémente a chaque bonne réponse.
var cumul_score = document.getElementById('highScore').innerHTML;

var vie = 3;
var tentatives = 0;
// La variable compteur_highscore sert de référence pour notre système de highscore.
var compteur_pts_highscore = 0;
var bool = 0;

// Quand l'utilisateur clique sur commencer, les données du jeu sont chargées et le jeu est affiché.

$('#start').on('click', function () {

   cumul_score.value = '0';

    ajax_loadDB();

    document.getElementById('accueil_jeu').style.display = "none";
    document.getElementById('container_questions').style.display = "block";
    document.getElementById('dim').style.display = "block";
});


function boutonReponse() {

    var utilisateur = champUtilisateur.value;

    // Dans une condition, nous vérifions si l'utilisateur a fourni une réponse identique à celle stockée en base de
    // données
    if (utilisateur == content[randQuestions].reponses) {

        document.getElementById("bouton").disabled = true;
        document.getElementById("reponse").innerHTML = "Bravo ! tu as la bonne réponse.";

        // Nous créons un nouveau bouton pour que l'utilisateur puisse passer a la question suivante.

        var newButton = document.createElement('button');
        newButton.innerHTML = "Suivant";
        newButton.id = 'nextButton';
        newButton.onclick = nextBtn;
        document.getElementById('reponse').appendChild(newButton);

        serie++; // L'utilisateur gagne 1 point pour chaque bonne réponse.

        document.getElementById("bonsPts").innerHTML = "Bravo, vous avez : " + serie + " bons points";
        tentatives++;
        compteur_pts_highscore++;
        cumul_score++;

    } else if (utilisateur != content[randQuestions].reponses) {

        vie--;
        document.getElementById("reponse").innerHTML = "Il vous reste " + vie + " vies";

        if (vie < 0) {

            document.getElementById("bouton").disabled = true;
            document.getElementById("reponse").innerHTML = "Vous êtes a court de vies. La réponse était " + content[randQuestions].reponses;

            var nextButton = document.createElement('button');
            nextButton.innerHTML = "Suivant";
            nextButton.id = 'nextButton';
            nextButton.onclick = nextBtn;
            document.getElementById('reponse').appendChild(nextButton);

            tentatives++;
            vie = 3; // Nous réinitialisons le nombre de vies pour la prochine question.
        }
    }

    if (tentatives == 10) {

        // highscore = document.getElementById("highScore").innerHTML;
        document.getElementById("dim").style.display = "none";

        ajaxadd_highscore();
        send_score();

        document.getElementById("fin_serie").style.display = "block";
        document.getElementById("resultat_quest").innerHTML = serie + " /10";

    }


    if (compteur_pts_highscore == 5) {


        cumul_score = cumul_score + 500;
        document.getElementById("highScore").innerHTML = cumul_score;
        compteur_pts_highscore = 0;
        }


}



$('#table_membres').on('click', function () {

    ajax_classement();
    document.getElementById('affichage_classement').style.display = 'block';

});

    function ajax_classement() {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                var obj = JSON.parse(this.responseText);

                for (var i = 0; i < obj.length; i++) {

                    var obj1 = document.createElement('div');
                    obj1.innerHTML =  "Nom : " + obj[i].pseudo;
                    document.getElementById('nom').appendChild(obj1);

                    var obj2 = document.createElement('div');
                    obj2.innerHTML =  "Score : " + obj[i].score;
                    document.getElementById('score').appendChild(obj2);

                }
            }
        };
        xhttp.open("GET", "index.php?controler=scores&action=getClassement", true);

        xhttp.send();
    }


function send_score () {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $('#info').html("Votre highscore a été enregistré en base de données");
                console.log(this.responseText);
        }

        else {

            $('#info').html("un prohlème est survenu et votre highscore n'a pas pu être sauvegardé" +
                "en base de données, vous pouvez signaler le probleme sur la page commentaires du jeu");

        }

    };

    xhttp.open("GET", "index.php?controler=scores&action=envoiReponses&score=" + serie, true);

    xhttp.send();



}

    function ajaxadd_highscore() {


        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                $('#info').html("Votre highscore a été enregistré en base de données");

            }

            else {

                $('#info').html("un prohlème est survenu et votre highscore n'a pas pu être sauvegardé" +
                    "en base de données, vous pouvez signaler le probleme sur la page commentaires du jeu");

            }

        };

        xhttp.open("GET", "index.php?controler=scores&action=sendScore&score=" + cumul_score, true);

        xhttp.send();

    }

function nextBtn() {

    document.getElementById("bouton").disabled = false;
    randQuestions =  Math.floor(Math.random() * content.length)
    document.getElementById("questions").innerHTML = content[randQuestions].questions;
    document.getElementById("reponse").innerHTML = " ";
    $('#champUtilisateur').val("");
    $('#nextButton').remove();
}

function reset() {

    randQuestions =  Math.floor(Math.random() * content.length);
    document.getElementById("questions").innerHTML = content[randQuestions].questions;
    document.getElementById("bouton").disabled = false;
    $('#nextButton').remove();
    document.getElementById("reponse").innerHTML = " ";
    $('#champUtilisateur').val("");
    vie = 3;

}


function recommencer() {

    tentatives = 0;
    serie = 0;
    vie = 3;
    bool = 2;
    $("#questions").html("");
    $("#nom").html("");
    $("#score").html("");
    $("#bonsPts").html("");
    $("#reponse").html("");

    document.getElementById('affichage_classement').style.display = 'none';
    document.getElementById("fin_serie").style.display = "none";
    document.getElementById("accueil_jeu").style.display = "block";
    document.getElementById("bouton").disabled = false;

    $('#nextButton').remove();

    document.getElementById("reponse").innerHTML = " ";
    document.getElementById("champUtilisateur").value = " ";
}


