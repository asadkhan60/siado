$(document).ready(function () {
    var width = $('.blog-image').width();
    var heigth = width - 150;
    $('.blog-image').height(heigth);

    $(window).resize(function() {
        var width = $('.blog-image').width();
        var heigth = width - 150;
        $('.blog-image').height(heigth);
    });
});