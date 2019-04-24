$("#boutonListe").click(function () {

    $(this).hide(1000);
    $(this).addClass("effetmenu");
    $(".menuderoulant").show(1000);


});

$(".menuderoulant").on("mouseleave", function () {


    $(this).hide(1000);
    $("#boutonListe").addClass("effetmenu");
    $("#boutonListe").show(1000);

});

