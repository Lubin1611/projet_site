

$('#page_graph').on('click', function () {
    document.getElementById('graphiques').style.display = "block";
    document.getElementById('succes').style.display = "none";
    document.getElementById('informations_compte').style.display = "none";

});


function ajaxcallscores() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            obj = JSON.parse(this.responseText);

            //console.log(obj[0].score + "score_phrases" + "score qui manquait " + obj[1].score + " dernier score + " + obj[2].score);

             console.log(obj);

            var ctx = document.getElementById('myChart').getContext('2d');

            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'radar',

                // The data for our dataset
                data: {
                    labels: ['Quizz', 'Vocabulaire', 'Jeu'],
                    datasets: [{
                        data: [obj[0].score, obj[1].score, obj[2].score]
                    }]
                },

                // Configuration options go here
                options : {
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

    xhttp.open("GET", 'index.php?controler=ajax&action=getscores', true);

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

            var ctx = document.getElementById('myCanvas').getContext('2d');

            var myCanvas = new Chart(ctx, {
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

            var ctx = document.getElementById('myGraph2').getContext('2d');

            var myGraph2 = new Chart(ctx, {
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

    xhttp.open("GET", 'index.php?controler=ajax&action=get_graph', true);

    xhttp.send();


}


window.onload = function () {

    ajaxcallscores();
    ajaxcallgraph();
    ajaxcallgraph2();

};