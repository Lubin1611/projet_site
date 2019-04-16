var san_obj;


$('#page_graph').on('click', function () {
    document.getElementById('graphique').style.display = "block";
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

window.onload = function () {

    ajaxcallscores();

};