var arrayHtml = [{
    question: "Pouvez vous ecrire en anglais la balise pour un titre de tableau ?",
    phrase: ["c", "a", "p", "t", "i", "o", "n"],
    bonneRep: ["c", "a", "p", "t", "i", "o", "n"],
},
    {
        question: "Pouvez vous écrire en anglais la balise pour créer un formulaire ?",
        phrase: ["f", "o", "r", "m"],
        bonneRep: ["f", "o", "r", "m"],
    },
    {
        question: "Pouvez vous écrire en anglais la balise pour un nouvel element de formulaire ?",
        phrase: ["i", "n", "p", "u", "t"],
        bonneRep: ["i", "n", "p", "u", "t"]
    },


];

var arrayCss = [{
    question: "Pouvez vous écrire en anglais le mot-clef qui désigne un nom de police ?",
    phrase: ["f", "o", "n", "t", "-", "f", "a", "m", "i", "l", "y"],
    bonneRep: ["f", "o", "n", "t", "-", "f", "a", "m", "i", "l", "y"],
},
    {
        question: "Pouvez vous écrire en anglais le mot-clef qui transforme les lettres  ?",
        phrase: ["t", "e", "x", "t", "-", "t", "r", "a", "n", "s", "f", "o", "r", "m"],
        bonneRep: ["t", "e", "x", "t", "-", "t", "r", "a", "n", "s", "f", "o", "r", "m"]
    }

];

var arrayJs = [{
    question: "Pouvez vous écrire en anglais le mot-clef qui désigne un nom de police a la con ?",
    phrase: ["f", "o", "n", "t", "-", "f", "a", "m", "i", "l", "y"],
    bonneRep: ["f", "o", "n", "t", "-", "f", "a", "m", "i", "l", "y"],
},
    {
        question: "Pouvez vous écrire en anglais le mot-clef qui transforme les lettres hguilkgh ?",
        phrase: ["t", "e", "x", "t", "-", "t", "r", "a", "n", "s", "f", "o", "r", "m"],
        bonneRep: ["t", "e", "x", "t", "-", "t", "r", "a", "n", "s", "f", "o", "r", "m"]
    }

];


var arrayPhp = [{

    question: "Pouvez vous écrire en anglais le mot-clef qui désigne un nom de police a la con ?",
    phrase: ["f", "o", "n", "t", "-", "f", "a", "m", "i", "l", "y"],
    bonneRep: ["f", "o", "n", "t", "-", "f", "a", "m", "i", "l", "y"],
},
    {
        question: "Pouvez vous écrire en anglais le mot-clef qui transforme les lettres hguilkgh ?",
        phrase: ["t", "e", "x", "t", "-", "t", "r", "a", "n", "s", "f", "o", "r", "m"],
        bonneRep: ["t", "e", "x", "t", "-", "t", "r", "a", "n", "s", "f", "o", "r", "m"]
    }

];

var aleaTab;
var compteurbonsMots;
var compteurmots;
var compteurQuestions = 0;
var bonneReponse = 0;

function reset() {


    $("#recupmots > div").remove();
    $("#aleaphrase > span").remove();
    $("#message").empty();

    document.getElementById("verifier").disabled = false;
    document.getElementById("Rec").style.display = "none";
    document.getElementById("Raz").style.display = "block";

}




function game_of_words(tableau) {


    document.getElementById("menuJeu").style.display = "none";
    document.getElementById("containerJeu").style.display = "block";

    var conteneurQ = document.getElementById("Question");
    var temp;
    var conteneurP = document.getElementById("aleaphrase");
    var conteneurRecup = document.getElementById("recupmots");
    var compteurmots = -1;


    conteneurQ.innerHTML = tableau[aleaTab].question;

    for (var i = tableau[aleaTab].phrase.length - 1; i >= 1; i--) {

        var random = Math.floor(Math.random() * (i + 1));

        temp = tableau[aleaTab].phrase[i];

        tableau[aleaTab].phrase[i] = tableau[aleaTab].phrase[random];

        tableau[aleaTab].phrase[random] = temp;

    }


    for (var j = 0; j < tableau[aleaTab].phrase.length; j++) { // attribue chaque span pour chaque lettre du mot gÃ©nÃ©rÃ©
        var tirets = document.createElement("span");
        tirets.innerHTML = tableau[aleaTab].phrase[j];
        tirets.id = j;
        tirets.onclick = jeu;
        conteneurP.appendChild(tirets);
    }

    for (var q = 0; q < tableau[aleaTab].phrase.length; q++) { // attribue chaque span pour chaque lettre du mot gÃ©nÃ©rÃ©
        var blocs = document.createElement("div");
        blocs.id = "mot" + q;
        blocs.style.display = "flex";
        blocs.style.justifyContent = "center";
        blocs.style.alignItems = "center";
        blocs.style.fontSize = "20px";
        blocs.style.border = "2px solid orange";
        blocs.style.width = "100px";
        blocs.style.borderRadius = "10px";
        conteneurRecup.appendChild(blocs);
    }

    function jeu() {


        compteurmots++;

        for (var p = 0; p < tableau[aleaTab].phrase.length; p++) {

            if (compteurmots == p) {

                document.getElementById("mot" + p).innerHTML = this.innerHTML;
                document.getElementById(this.id).style.display = "none";
            }


            console.log("compteur lettre déplacée :" + compteurmots);
        }

    }

}





function verification(tableau) {

    for (var index = 0; index < tableau[aleaTab].phrase.length; index++) {

        if (document.getElementById("mot" + index).innerHTML == tableau[aleaTab].bonneRep[index]) {

            compteurbonsMots++;


            document.getElementById("mot" + index).style.backgroundColor = "green";
            document.getElementById("mot" + index).style.color = "white";
            document.getElementById("mot" + index).style.borderColor = "green";

        }

        else {

            document.getElementById("mot" + index).style.backgroundColor = "red";
            document.getElementById("mot" + index).style.color = "white";
            document.getElementById("mot" + index).style.borderColor = "red";
        }

        if (compteurbonsMots == tableau[aleaTab].phrase.length) {

            bonneReponse++;

            document.getElementById("message").innerHTML = "Bravo, vous avez su assembler les mots dans le bon ordre et trouver la phrase !";
            document.getElementById("verifier").disabled = true;
            document.getElementById("Rec").style.display = "none";

            console.log("compteur de bonnes réponses :" + bonneReponse);
        }

        if (compteurbonsMots < tableau[aleaTab].phrase.length) {

            document.getElementById("message").innerHTML = "Certains mots sont mal placés, ce sont ceux en rouge. Ceux en vert sont bien placés.";
            document.getElementById("verifier").disabled = true;
            document.getElementById("Raz").style.display = "none";
            document.getElementById("Rec").style.display = "block";

        }
    }
}



function retry(tableau) {

    compteurmots = -1;

    $("#recupmots > div").html("");

    for (var i = 0; i < tableau[aleaTab].phrase.length; i++) {

        if (document.getElementById(i).style.display == "none") {

            document.getElementById(i).style.display = "block";
        }

    }
}




function recommencer(tableau) {

    compteurmots = -1;

    $("#recupmots > div").html("");

    document.getElementById("message").style.display = "none";
    document.getElementById("verifier").disabled = false;
    document.getElementById("Rec").style.display = "none";
    document.getElementById("Raz").style.display = "block";

    for (var i = 0; i < tableau[aleaTab].phrase.length; i++) {

        if (document.getElementById(i).style.display = "none") {

            document.getElementById(i).style.display = "block";

            document.getElementById("mot" + i).style.backgroundColor = "white";
            document.getElementById("mot" + i).style.color = "black";
            document.getElementById("mot" + i).style.borderColor = "orange";

        }

    }

}

$("#jeuHtml, #jeuCss, #jeuJs, #jeuPhp").on("click", function () {

    if (this.id == 'jeuHtml') {

        aleaTab =  Math.floor(Math.random() * arrayHtml.length); // on définit une 1ere fois aleatab

        game_of_words(arrayHtml);


        $('#NouvMot').on('click', function () {

            compteurQuestions++;
            console.log("nbre de questions répondues : " + compteurQuestions);

            aleaTab =  Math.floor(Math.random() * arrayHtml.length); // pour re-piocher aleatoirement, on redéfinit aleatab, au moment du click.

            reset();

            game_of_words(arrayHtml);

            if (compteurQuestions == 10) {

                console.log(bonneReponse);
                document.getElementById("containerJeu").style.display = "none";
                document.getElementById("resultats").style.display = "block";
                document.getElementById("resultatjeu").innerHTML = bonneReponse + " /10";
                document.getElementById("score_jeuphrase").value = bonneReponse;
                document.getElementById("matiere").value = "html";

            }

        });

        $('#verifier').on('click', function () {

            compteurbonsMots = 0;

            verification(arrayHtml);

        });

        $('#Raz').on('click', function () {

            compteurmots = -1;
            console.log(compteurmots);
            retry(arrayHtml);

        });


        $('#Rec').on('click', function () {

            compteurmots = -1;

            recommencer(arrayHtml);

        });

    }


    if (this.id == 'jeuCss') {


        game_of_words(arrayCss);

    }


    if (this.id == 'jeuJs') {


        game_of_words(arrayJs);

    }

    if (this.id == 'jeuPhp') {

        game_of_words(arrayPhp);
    }
});