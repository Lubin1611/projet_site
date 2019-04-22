var jeu1 = false;
var matiere;
var jeuHTML = false;
var jeuCSS = false;
var jeuJS = false;
var jeuPHP = false;
var question_jeu1;
var reponse_jeu1;
var question_jeu2;
var reponse_jeu2;
var question_jeu3;
var reponse_jeu3;

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

    xhttp.open("GET", "index.php?controler=ajax&action=add_data1&question=" + question_jeu1 + "&reponse=" + reponse_jeu1, true);

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

    xhttp.open("GET", "index.php?controler=ajax&action=" + matiere + "&question=" + question_jeu + "&reponse=" + reponse_jeu, true);

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
    xhttp.open("GET", "index.php?controler=ajax&action=read_data1", true);

    xhttp.send();

}

function ajax_read_data_jeu2(div_id, div_questions, div_reponses, table) {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            var obj = JSON.parse(this.responseText);
            console.log(obj);

            for (var i = 0; i < obj.length; i++) {

                var obj1 = document.createElement('div');
                obj1.innerHTML = "Id : " + obj[i].id;
                document.getElementById(div_id).appendChild(obj1);

                var obj2 = document.createElement('div');
                obj2.innerHTML = "Question : " + obj[i].question;
                document.getElementById(div_questions).appendChild(obj2);

                var obj3 = document.createElement('div');
                obj3.innerHTML = "Reponse : " + obj[i].bonnerep;
                document.getElementById(div_reponses).appendChild(obj3);
            }
        }
    };
    xhttp.open("GET", "index.php?controler=ajax&action="+ table, true);

    xhttp.send();

}

$("#add_data_jeu_1").on('click', function () {

    question_jeu1 =$('#question_jeu_1').val();
    reponse_jeu1 = $('#reponse_jeu_1').val();

    ajax_add_data_jeu1();

});

$("#add_data_jeu_HTML").on('click', function () {

    question_jeu2 = $('#question_jeu_HTML').val();
    reponse_jeu2 = $('#reponse_jeu_HTML').val();

    matiere = "html";

    ajax_add_data_words(matiere, question_jeu2, reponse_jeu2);

});

$("#add_data_jeu_CSS").on('click', function () {

    question_jeu2 = $('#question_jeu_CSS').val();
    reponse_jeu2 = $('#reponse_jeu_CSS').val();

    matiere = "css";

    ajax_add_data_words(matiere, question_jeu2, reponse_jeu2);

});

$("#add_data_jeu_JS").on('click', function () {

    question_jeu2 = $('#question_jeu_JS').val();
    reponse_jeu2 = $('#reponse_jeu_JS').val();

    matiere = "js";

    ajax_add_data_words(matiere, question_jeu2, reponse_jeu2);

});

$("#add_data_jeu_PHP").on('click', function () {

    question_jeu2 = $('#question_jeu_PHP').val();
    reponse_jeu2 = $('#reponse_jeu_PHP').val();

    matiere = "php";

    ajax_add_data_words(matiere, question_jeu2, reponse_jeu2);

});

$("#home_admin").on('click', function () {

    jeu1 = false;
    jeuHTML = false;
    jeuJS = false;
    jeuPHP = false;
    jeuCSS= false;

    $("#liste_jeu1 > div").html("");
    $("#liste_jeuHTML > div").html("");
    $("#liste_jeuCSS > div").html("");
    $("#liste_jeuJS > div").html("");
    $("#liste_jeuPHP > div").html("");

    document.getElementById('menu_data').style.display = "none";
    document.getElementById('ajout_donnees_jeu1').style.display = "none";
    document.getElementById('ajout_donnees_jeuHTML').style.display = "none";
    document.getElementById('ajout_donnees_jeuCSS').style.display = "none";
    document.getElementById('ajout_donnees_jeuJS').style.display = "none";
    document.getElementById('ajout_donnees_jeuPHP').style.display = "none";
    document.getElementById('informations_membres').style.display = "block";
    document.getElementById('menu_buttons').style.display = "block";
    document.getElementById('liste_donnees_jeu1').style.display = "none";
    document.getElementById('liste_donnees_jeuHML').style.display = "none";
    document.getElementById('liste_donnees_jeuCSS').style.display = "none";
    document.getElementById('liste_donnees_jeuJS').style.display = "none";
    document.getElementById('liste_donnees_jeuPHP').style.display = "none";
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

    if (jeuHTML == true) {

        document.getElementById('ajout_donnees_jeuHTML').style.display = "none";
        document.getElementById('liste_donnees_jeuHML').style.display = "block";

        id = 'id_game_html';
        question = 'quest_game_html';
        reponse = 'rep_game_html';
        table = 'read_html';
       ajax_read_data_jeu2(id, question, reponse, table);

    } else {

        document.getElementById('ajout_donnees_jeuHTML').style.display = "none";
        document.getElementById('liste_donnees_jeuHML').style.display = "none";

    }

    if (jeuCSS == true) {

        document.getElementById('ajout_donnees_jeuCSS').style.display = "none";
        document.getElementById('liste_donnees_jeuCSS').style.display = "block";

        id = 'id_game_css';
        question = 'quest_game_css';
        reponse = 'rep_game_css';
        table = 'read_css';
        ajax_read_data_jeu2(id, question, reponse, table);

    } else {

        document.getElementById('ajout_donnees_jeuCSS').style.display = "none";
        document.getElementById('liste_donnees_jeuCSS').style.display = "none";

    }

    if (jeuJS == true) {

        document.getElementById('ajout_donnees_jeuJS').style.display = "none";
        document.getElementById('liste_donnees_jeuJS').style.display = "block";

        id = 'id_game_js';
        question = 'quest_game_js';
        reponse = 'rep_game_js';
        table = 'read_js';
        ajax_read_data_jeu2(id, question, reponse, table);

    } else {

        document.getElementById('ajout_donnees_jeuJS').style.display = "none";
        document.getElementById('liste_donnees_jeuJS').style.display = "none";

    }
    if (jeuPHP == true) {

        document.getElementById('ajout_donnees_jeuPHP').style.display = "none";
        document.getElementById('liste_donnees_jeuPHP').style.display = "block";

        id = 'id_game_PHP';
        question = 'quest_game_PHP';
        reponse = 'rep_game_PHP';
        table = 'read_php';
        ajax_read_data_jeu2(id, question, reponse, table);

    } else {

        document.getElementById('ajout_donnees_jeuPHP').style.display = "none";
        document.getElementById('liste_donnees_jeuPHP').style.display = "none";

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

     if (jeuHTML == true) {

        document.getElementById('liste_donnees_jeuHML').style.display = "none";
        document.getElementById('ajout_donnees_jeuHTML').style.display = "block";

         $("#liste_jeuHTML > div").html("");

    } else {

        document.getElementById('liste_donnees_jeuHML').style.display = "none";
        document.getElementById('ajout_donnees_jeuHTML').style.display = "none";
    }

    if (jeuCSS == true) {

        document.getElementById('ajout_donnees_jeuCSS').style.display = "block";
        document.getElementById('liste_donnees_jeuCSS').style.display = "none";

        $("#liste_jeuCSS > div").html("");

    } else {

        document.getElementById('ajout_donnees_jeuCSS').style.display = "none";
        document.getElementById('liste_donnees_jeuCSS').style.display = "none";

    }

    if (jeuPHP == true) {

        document.getElementById('ajout_donnees_jeuPHP').style.display = "block";
        document.getElementById('liste_donnees_jeuPHP').style.display = "none";

        $("#liste_jeuPHP > div").html("");

    } else {

        document.getElementById('ajout_donnees_jeuPHP').style.display = "none";
        document.getElementById('liste_donnees_jeuPHP').style.display = "none";

    }

    if (jeuJS == true) {

        document.getElementById('ajout_donnees_jeuJS').style.display = "block";
        document.getElementById('liste_donnees_jeuJS').style.display = "none";

        $("#liste_jeuPHP > div").html("");

    } else {

        document.getElementById('ajout_donnees_jeuJS').style.display = "none";
        document.getElementById('liste_donnees_jeuJS').style.display = "none";

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


    document.getElementById('choix_parametres_jeu').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('choix_matieres_phrases').style.display = "block";

});

$("#HTML").on('click', function () {

    jeuHTML = true;

    document.getElementById('choix_matieres_phrases').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('menu_data').style.display = "block";
    document.getElementById('ajout_donnees_jeuHTML').style.display = "block";
});

$("#CSS").on('click', function () {

    jeuCSS = true;

    document.getElementById('choix_matieres_phrases').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('menu_data').style.display = "block";
    document.getElementById('ajout_donnees_jeuCSS').style.display = "block";
});


$("#JS").on('click', function () {

    jeuJS = true;

    document.getElementById('choix_matieres_phrases').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('menu_data').style.display = "block";
    document.getElementById('ajout_donnees_jeuJS').style.display = "block";
});

$("#PHP").on('click', function () {

    jeuPHP = true;

    document.getElementById('choix_matieres_phrases').style.display = "none";
    document.getElementById('menu_buttons').style.display = "none";
    document.getElementById('menu_data').style.display = "block";
    document.getElementById('ajout_donnees_jeuPHP').style.display = "block";
});


$("#back").on('click', function () {


    document.getElementById('choix_parametres_jeu').style.display = "block";
    document.getElementById('menu_buttons').style.display = "block";
    document.getElementById('choix_matieres_phrases').style.display = "none";

});