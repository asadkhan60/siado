$(document).ready(function () {
    var width = $('.blog-image').width();
    var heigth = width - 150;
    $('.blog-image').height(heigth);

    $(window).resize(function() {
        var width = $('.blog-image').width();
        var heigth = width - 150;
        $('.blog-image').height(heigth);
    });


    var last_section = $(".section:last");
    var padding_bottom = parseInt($(last_section).css("padding-bottom"));
    padding_bottom += parseInt(padding_bottom);
    $(last_section).css("padding-bottom", padding_bottom + "px");


    $(".btn-devis").click(function (ev) {
        ev.preventDefault();
        $('html, body').animate({
            scrollTop: $("footer .formulaire-contact").offset().top
        }, 1000);
    });
});