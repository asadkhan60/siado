$(document).ready(function () {
    var width = $('.blog-image').width();
    var heigth = width - 150;
    $('.blog-image').height(heigth);

    $(window).resize(function() {
        var width = $('.blog-image').width();
        var heigth = width - 150;
        $('.blog-image').height(heigth);
    });


    $(".btn-devis").click(function (ev) {
        ev.preventDefault();
        $('html, body').animate({
            scrollTop: $("footer .formulaire-contact").offset().top
        }, 1000);
    });
});