var avatar_user = ['http://www.bigfoto.com/themes/nature/animals/tiger_1.jpg', 'http://www.bigfoto.com/themes/nature/animals/rooster-h6yl.jpg', 'http://www.bigfoto.com/themes/nature/animals/chimpanzee.jpg'];
var index = 1;


document.getElementById('choix_user').src = avatar_user[1];
document.getElementById('src_image').value = avatar_user[1];

$('#prev').on('click', function () {

    if(index < 1) {
        index = avatar_user.length;
    }
    index--;
    document.getElementById('choix_user').src = avatar_user[index];
    document.getElementById('src_image').value = avatar_user[index];

});

$('#next').on('click', function () {

    if(index >= avatar_user.length - 1) {

        index = -1;
    }

    index++;

    //encodeURIComponent

    document.getElementById('choix_user').src = avatar_user[index];
    document.getElementById('src_image').value = avatar_user[index];
});