var arrQuestions = [];
var obj_quizz;
var index;


// Je fais un appel AJAX pour récuperer mes données.

function ajax_loadDB() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            obj_quizz = JSON.parse(this.responseText);


            index = Math.floor(Math.random() * obj_quizz.length);


            $("#questions").html(obj_quizz[index].intitule + " " + obj_quizz[index].question);

            $("#reponse1").html(obj_quizz[index].reponse1);
            $("#reponse2").html(obj_quizz[index].reponse2);
            $("#reponse3").html(obj_quizz[index].reponse3);
            $("#reponse4").html(obj_quizz[index].reponse4);

        } else {

          //  $("#message_erreur").html("Les données du jeu n'ont pas pu être chargées, le jeu est temporairement " +
              //  "inaccessible. Vous pouvez signaler ce problème dans la partie commentaires du jeu")

        }

    };

    xhttp.open("GET", "index.php?controler=ajax&action=getQuizz", true);

    xhttp.send();

}

// En cliquant sur le bouton, je passe a l'affichage du jeu et la partie peut commencer.

$('#commencer').on('click', function () {

    ajax_loadDB();

    document.getElementById('accueil_quizz').style.display = "none";
    document.getElementById('container_quiz').style.display = "block";


});




var tableQuestion = [];
var tableSolution = [];
var reponseUser = [];

var compteurBon = 0;
var compteurpasbon = 0;
var compteurReponse = 0;



function add_score() {

    alert("envoi en cours");

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

        }

    };

    xhttp.open("GET", "index.php?controler=ajax&action=addScore&score=" + compteurBon, true);

    xhttp.send();

}



$("#reponse1, #reponse2, #reponse3, #reponse4").on("click", function () {

    compteurReponse++;

    //verification de la réponse

    if (this.id == obj_quizz[index].bonnereponse) {

        compteurBon++;

        tableQuestion.push(obj_quizz[index].question);
        tableSolution.push(obj_quizz[index].contenusolution);
        reponseUser.push(this.innerHTML);

    }

    if (this.id != obj_quizz[index].bonnereponse) {

        tableQuestion.push(obj_quizz[index].question);
        tableSolution.push(obj_quizz[index].contenusolution);
        reponseUser.push(this.innerHTML);
    }


    if (compteurReponse == 10 ) {

        add_score();

        document.getElementById("container_quiz").style.display = "none";
        document.getElementById("container_scores").style.display = "block";
        document.getElementById("score").innerHTML = "Vous avez un score de : " + compteurBon + " / 10";
        document.getElementById("score_jeuquizz").value = compteurBon;

        for (var j = 0; j < reponseUser.length; j++) {

            document.getElementById("explications_score").innerHTML += "A la question " + tableQuestion[j] + " , vous avez répondu " +
                reponseUser[j] + " , et la réponse était : " + tableSolution[j] + "<br><br>";

        }

    }




    // Passage a la question suivante

    index = Math.floor(Math.random() * obj_quizz.length);

    $("#questions").html(obj_quizz[index].intitule + " " + obj_quizz[index].question);

    $("#reponse1").html(obj_quizz[index].reponse1);
    $("#reponse2").html(obj_quizz[index].reponse2);
    $("#reponse3").html(obj_quizz[index].reponse3);
    $("#reponse4").html(obj_quizz[index].reponse4);


    console.log(index);


});

function recommencer() {

    window.location.reload();

}