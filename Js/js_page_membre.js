$('#graphique_jeu_1').on('click', function () {

    ajaxcallscores();

    document.getElementById('informations_compte').style.display = "none";
    document.getElementById('affichage_words').style.display = "block";
    document.getElementById('graphique_revisions').style.display = "none";
    document.getElementById('graphique_quizz').style.display = "none";
});

$('#infos_compte').on('click', function () {


    document.getElementById('informations_compte').style.display = "block";
    document.getElementById('affichage_words').style.display = "none";
    document.getElementById('graphique_revisions').style.display = "none";
    document.getElementById('graphique_quizz').style.display = "none";

});

$('#graphique_jeu_2').on('click', function () {


    document.getElementById('informations_compte').style.display = "none";
    document.getElementById('affichage_words').style.display = "none";
    document.getElementById('graphique_revisions').style.display = "block";
    document.getElementById('graphique_quizz').style.display = "none";
    ajaxcallgraph();

});

$('#graphique_jeu_3').on('click', function () {


    document.getElementById('informations_compte').style.display = "none";
    document.getElementById('affichage_words').style.display = "none";
    document.getElementById('graphique_revisions').style.display = "none";
    document.getElementById('graphique_quizz').style.display = "block";

    ajaxcallgraph2();

});

function ajaxcallscores() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            obj = JSON.parse(this.responseText);

            console.log(obj);

            var score_Html = [];
            var score_Css = [];
            var score_Js = [];
            var score_Php = [];

            for (var i = 0; i < obj[0].length; i++) {

                score_Html.push(obj[0][i].score);

            }

            for (var i = 0; i < obj[1].length; i++) {

                score_Css.push(obj[1][i].score);

            }

            for (var i = 0; i < obj[2].length; i++) {

                score_Js.push(obj[2][i].score);

            }

            for (var i = 0; i < obj[3].length; i++) {

                score_Php.push(obj[3][i].score);

            }

             var moyenne_HTML = function () {

                var compteur_Html = 0;

                for(var j = 0; j < score_Html.length; j++) {

                    compteur_Html += parseFloat(score_Html[j]) / score_Html.length;
                }
                    return compteur_Html;
            }

            var moyenne_Css = function () {

                var compteur_Css = 0;

                for(var t = 0; t < score_Css.length; t++) {

                    compteur_Css += parseFloat(score_Css[t]) / score_Css.length;
                }
                return compteur_Css;
            }

            var moyenne_Js = function () {

                var compteur_js = 0;

                for(var q = 0; q < score_Js.length; q++) {

                    compteur_js += parseFloat(score_Js[q]) / score_Js.length;
                }
                return compteur_js;
            }

            var moyenne_Php = function () {

                var compteur_Php = 0;

                for(var b = 0; b < score_Css.length; b++) {

                    compteur_Php += parseFloat(score_Php[b]) / score_Php.length;
                }
                return compteur_Php;
            }
            $('#score_Html').html('Moyenne matière Html :' + moyenne_HTML() + '/10');
            $('#score_Css').html('Moyenne matière Css :' + moyenne_Css() + '/10');
            $('#score_Js').html('Moyenne matière Js :' + moyenne_Js() + '/10');
            $('#score_Php').html('Moyenne matière Php :' + moyenne_Php() + '/10');

            var ctx = document.getElementById('myChart').getContext('2d');

            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'radar',

                // The data for our dataset
                data: {
                    labels: ['PHP', 'HTML', 'CSS', 'JS'],
                    datasets: [{
                        data: [moyenne_Php(), moyenne_HTML(), moyenne_Css(), moyenne_Js()]
                    }]
                },

                // Configuration options go here
                options: {
                    scale: {

                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 10,
                            stepSize: 1,
                            lineHeight: 1
                        },
                        pointLabels: {
                            fontSize: 12
                        }
                    },
                    legend: {
                        display: false
                    },
                }
            });


        }

    };

    xhttp.open("GET", 'index.php?controler=ajax&action=get_words_scores', true);

    xhttp.send();

}

function ajaxcallgraph() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            new_obj = JSON.parse(this.responseText);

            console.log(new_obj);

            var date = [];
            var score = [];

            for (i = 0; i < new_obj.length; i++) {

                date.push(new_obj[i].date_reponses);
                score.push(new_obj[i].score);
            }

            console.log("Retour de la fonction get_graph" + new_obj.date_reponses);

            var ctx = document.getElementById('myChart2').getContext('2d');

            var myChart2 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'score_questions',
                        data: score,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                max: 10,
                            }
                        }]
                    }
                }
            });

        }

    };

    xhttp.open("GET", 'index.php?controler=ajax&action=get_graph2', true);

    xhttp.send();


}

function ajaxcallgraph2() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            new_obj2 = JSON.parse(this.responseText);

            console.log(new_obj2);

            var date = [];
            var score = [];

            for (i = 0; i < new_obj2.length; i++) {

                date.push(new_obj2[i].date_quizz);
                score.push(new_obj2[i].score);
            }

            console.log("Retour de la fonction get_graph" + new_obj2.date_quizz);

            var ctx = document.getElementById('myChart3').getContext('2d');

            var myChart3 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'score_quizz',
                        data: score,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                max: 10,
                            }
                        }]
                    }
                }
            });

        }

    };

    xhttp.open("GET", 'index.php?controler=ajax&action=get_graph', true);

    xhttp.send();

}
