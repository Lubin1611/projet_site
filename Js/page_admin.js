var jeu1 = false;
var jeu2 = false
var jeu3 = false;
var question_jeu1;
var reponse_jeu1;
var question_jeu2;
var reponse_jeu2;
var choix_matieres;
var question_quizz;
var reponse_quizz1;
var reponse_quizz2;
var reponse_quizz3;
var reponse_quizz4;
var bonne_reponse;
var solution;
var id;
var question;
var reponse;
var table;


function ajax_add_data_jeu1() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            console.log(this.responseText);
            alert('envoyé');

        }
    };

    xhttp.open("GET", "index.php?controler=ajax&action=Data1&question=" + question_jeu1 + "&reponse=" + reponse_jeu1, true);

    xhttp.send();

}

function ajax_add_data_words(matiere, question_jeu, reponse_jeu) {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            console.log(this.responseText);
            alert('envoyé');

        }
    };

    xhttp.open("GET", "index.php?controler=ajax&action=dataWords&matiere=" + matiere + "&question=" + question_jeu + "&reponse=" + reponse_jeu, true);

    xhttp.send();

}

function ajax_add_quiz_data() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            console.log(this.responseText);
            alert('envoyé');

        }
    };

    xhttp.open("GET", "index.php?controler=ajax&action=quizzData&question=" + question_quizz + "&reponseA="
        + reponse_quizz1 + "&reponseB=" + reponse_quizz2 + "&reponseC=" + reponse_quizz3 + "&reponseD=" + reponse_quizz4
         + "&bonnerep=" + bonne_reponse + "&solution=" + solution, true);

    xhttp.send();
}




function ajax_read_data_jeu1() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            var obj = JSON.parse(this.responseText);
            console.log(obj);

            for (var i = 0; i < obj.length; i++) {

                var obj1 = document.createElement('div');
                obj1.innerHTML = "Id : " + obj[i].id;
                document.getElementById('id_game_1').appendChild(obj1);

                var obj2 = document.createElement('div');
                obj2.innerHTML = "Question : " + obj[i].questions;
                document.getElementById('quest_game_1').appendChild(obj2);

                var obj3 = document.createElement('div');
                obj3.innerHTML = "Reponse : " + obj[i].reponses;
                document.getElementById('rep_game_1').appendChild(obj3);
            }
        }
    };
    xhttp.open("GET", "index.php?controler=ajax&action=readData1", true);

    xhttp.send();

}

function ajax_read_data_jeu2() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            var obj = JSON.parse(this.responseText);
            console.log(obj);

            for (var i = 0; i < obj.length; i++) {

                var obj1 = document.createElement('div');
                obj1.innerHTML = "Id : " + obj[i].id;
                document.getElementById('id_game').appendChild(obj1);

                var obj2 = document.createElement('div');
                obj2.innerHTML = "Question : " + obj[i].question;
                document.getElementById('quest_game').appendChild(obj2);

                var obj3 = document.createElement('div');
                obj3.innerHTML = "Reponse : " + obj[i].bonnerep;
                document.getElementById('rep_game').appendChild(obj3);
            }
        }
    };
    xhttp.open("GET", "index.php?controler=ajax&action=readList&choice="+ table, true);

    xhttp.send();

}

function ajax_read_data_quizz() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            var obj = JSON.parse(this.responseText);
            console.log(obj);

            for (var i = 0; i < obj.length; i++) {

                var obj1 = document.createElement('div');
                obj1.innerHTML = "Question : " + obj[i].question;
                document.getElementById("donnees_questions").appendChild(obj1);

                var obj2 = document.createElement('div');
                obj2.innerHTML = "Reponse 1 : " + obj[i].reponse1;
                document.getElementById("reponse_donnee_1").appendChild(obj2);

                var obj3 = document.createElement('div');
                obj3.innerHTML = "Reponse 2 : " + obj[i].reponse2;
                document.getElementById("reponse_donnee_2").appendChild(obj3);

                var obj4 = document.createElement('div');
                obj4.innerHTML = "Reponse 3 : " + obj[i].reponse3;
                document.getElementById("reponse_donnee_3").appendChild(obj4);

                var obj5 = document.createElement('div');
                obj5.innerHTML = "Reponse 4 : " + obj[i].reponse4;
                document.getElementById("reponse_donnee_4").appendChild(obj5);

                var obj6 = document.createElement('div');
                obj6.innerHTML = "Bonne réponse  : " + obj[i].bonnereponse;
                document.getElementById("bonnerep_donnees").appendChild(obj6);

                var obj7 = document.createElement('div');
                obj7.innerHTML = "Explications  : " + obj[i].contenusolution;
                document.getElementById("donnee_solution").appendChild(obj7);
            }
        }
    };
    xhttp.open("GET", "index.php?controler=ajax&action=getQuizz", true);

    xhttp.send();

}


$("#add_data_jeu_1").on('click', function () {

    question_jeu1 =$('#question_jeu_1').val();
    reponse_jeu1 = $('#reponse_jeu_1').val();

    ajax_add_data_jeu1();

});

$("#add_data_game_words").on('click', function () {

    question_jeu2 = $('#game_question').val();
    reponse_jeu2 = $('#game_answer').val();
    choix_matieres = $('#select_matiere').val();


    ajax_add_data_words(choix_matieres, question_jeu2, reponse_jeu2);

});


$("#add_data_quizz").on('click', function () {

    question_quizz = $('#question_jeu_quizz').val();
    reponse_quizz1 = $('#reponse_quizz_1').val();
    reponse_quizz2 = $('#reponse_quizz_2').val();
    reponse_quizz3 = $('#reponse_quizz_3').val();
    reponse_quizz4 = $('#reponse_quizz_4').val();
    bonne_reponse = $('#bonne_reponse_quizz').val();
    solution = $('#explications_quizz').val();

    ajax_add_quiz_data();
});

$("#home_admin").on('click', function () {

    jeu1 = false;
    jeu2 = false;
    jeu3 = false;

    $("#liste_jeu1 > div").html("");
    $("#liste_jeuHTML > div").html("");
    $("#liste_jeuCSS > div").html("");
    $("#liste_jeuJS > div").html("");
    $("#liste_jeuPHP > div").html("");
    $("#liste_quizz > div").html("");

    document.getElementById('menu_data').style.display = "none";
    document.getElementById('ajout_donnees_jeu1').style.display = "none";
    document.getElementById('ajout_game_of_words').style.display = "none";
    document.getElementById('ajout_donnees_jeu3').style.display = "none";
    document.getElementById('informations_membres').style.display = "block";
    document.getElementById('menu_buttons').style.display = "block";
    document.getElementById('liste_donnees_jeu1').style.display = "none";
    document.getElementById('liste_game_of_words').style.display = "none";
    document.getElementById('liste_donnees_quizz').style.display = "none";
});


$("#liste_matiere").change(function () {

    $('#liste_jeu > div').html("");

    table = $('#liste_matiere').val();

    ajax_read_data_jeu2();

});

$("#data_list").on('click', function () {

    if (jeu1 == true) {

        document.getElementById('ajout_donnees_jeu1').style.display = "none";
        document.getElementById('liste_donnees_jeu1').style.display = "block";

        ajax_read_data_jeu1();

    } else {

        document.getElementById('ajout_donnees_jeu1').style.display = "none";
        document.getElementById('liste_donnees_jeu1').style.display = "none";

    }

    if (jeu2 == true) {

        document.getElementById('ajout_game_of_words').style.display = "none";
        document.getElementById('liste_game_of_words').style.display = "block";



    } else {

        document.getElementById('ajout_game_of_words').style.display = "none";
        document.getElementById('liste_game_of_words').style.display = "none";

    }


    if (jeu3 == true) {

        document.getElementById('ajout_donnees_jeu3').style.display = "none";
        document.getElementById('liste_donnees_quizz').style.display = "block";

        ajax_read_data_quizz();

    } else {

        document.getElementById('ajout_donnees_jeu3').style.display = "none";
        document.getElementById('liste_donnees_quizz').style.display = "none";

    }

});

$("#write_new_data").on('click', function () {

    if (jeu1 == true) {

        document.getElementById('liste_donnees_jeu1').style.display = "none";
        document.getElementById('ajout_donnees_jeu1').style.display = "block";

        $("#liste_jeu1 > div").html("");

    } else {

        document.getElementById('liste_donnees_jeu1').style.display = "none";
        document.getElementById('ajout_donnees_jeu1').style.display = "none";
    }

    if (jeu2 == true) {

        document.getElementById('liste_game_of_words').style.display = "none";
        document.getElementById('ajout_game_of_words').style.display = "block";

        $("#liste_game_of_words > div").html("");

    } else {

        document.getElementById('liste_game_of_words').style.display = "none";
        document.getElementById('ajout_game_of_words').style.display = "none";
    }
    if (jeu3 == true) {

        document.getElementById('ajout_donnees_jeu3').style.display = "block";
        document.getElementById('liste_donnees_quizz').style.display = "none";

        $("#liste_quizz > div").html("");

    } else {

        document.getElementById('ajout_donnees_jeu3').style.display = "none";
        document.getElementById('liste_donnees_quizz').style.display = "none";

    }

});


$("#members_info").on('click', function () {

   document.getElementById('informations_membres').style.display = "block";
    document.getElementById('choix_parametres_jeu').style.display = "none";

});

$("#add_data").on('click', function () {

    document.getElementById('informations_membres').style.display = "none";
    document.getElementById('choix_parametres_jeu').style.display = "block";

});


$("#jeu1").on('click', function () {

    jeu1 = true;

    document.getElementById('choix_parametres_jeu').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('menu_data').style.display = "block";
    document.getElementById('ajout_donnees_jeu1').style.display = "block";
});


$("#jeu2").on('click', function () {

 jeu2 = true;

    document.getElementById('choix_parametres_jeu').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('ajout_game_of_words').style.display = "block";
    document.getElementById('menu_data').style.display = "block";

});

$("#jeu3").on('click', function () {

    jeu3 = true;
    console.log(jeu3);

    document.getElementById('choix_parametres_jeu').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('menu_data').style.display = "block";
    document.getElementById('ajout_donnees_jeu3').style.display = "block";

});


