$(document).ready(function() {
    var compteur = 0;
    var time = 5000;
    var interval;

    // BOUTONS PRECEDENT ET SUIVANT
    $( ".slide-prev").hover(
        function() {
            $(this).css("background-color", "white");
            $(this).css("opacity", 0.5);
            $(this).find("i").css("color","black");
        },
        function() {
            $(this).css("background-color", "");
            $(this).css("opacity", 1);
            $(this).find("i").css("color","white");
        }
    );

    $( ".slide-next").hover(
        function() {
            $(this).css("background-color", "white");
            $(this).css("opacity", 0.5);
            $(this).find("i").css("color","black");
        },
        function() {
            $(this).css("background-color", "");
            $(this).css("opacity", 1);
            $(this).find("i").css("color","white");
        }
    );

    $(".slide-next").click(
        function () {
            var length = $(".slider-image").length - 1; //Longueur du slide
            if(compteur != length) {
                $(".slider-image:eq(" + compteur + ")").removeClass("slider-selected");
                compteur++;
                $(".slider-image:eq(" + compteur + ")").addClass("slider-selected");
            }else{
                $(".slider-image:eq("+length+")").removeClass("slider-selected");
                compteur = 0;
                $(".slider-image:eq(" + compteur + ")").addClass("slider-selected");
            }

            clearTimeout(interval);
            startSlider();
        }
    );

    $(".slide-prev").click(
        function () {
            if(compteur != 0) {
                $(".slider-image:eq(" + compteur + ")").removeClass("slider-selected");
                compteur--;
                $(".slider-image:eq(" + compteur + ")").addClass("slider-selected");
            }else{
                $(".slider-image:eq(0)").removeClass("slider-selected");
                compteur = $(".slider-image").length - 1;
                $(".slider-image:eq(" + compteur + ")").addClass("slider-selected");
            }

            clearTimeout(interval);
            startSlider();
        }
    );

    // SLIDER FONCTION
    function startSlider()
    {
        var length = $(".slider-image").length - 1; //Longueur du slide
        interval = setTimeout(function()
        {
            if(compteur != length)
            {
                $(".slider-image:eq(" + compteur + ")").removeClass("slider-selected");
                compteur++;
                $(".slider-image:eq(" + compteur + ")").addClass("slider-selected");
            }
            else
            {
                $(".slider-image:eq("+length+")").removeClass("slider-selected");
                compteur = 0;
                $(".slider-image:eq(" + compteur + ")").addClass("slider-selected");
            }

            startSlider();
        }, time);
    }

    if (!window.matchMedia("(max-width: 651px)").matches) {
        startSlider();
    }
    
    
    $(".slider-bouton .bouton").click(function (ev) {
        ev.preventDefault();
        $('html, body').animate({
            scrollTop: $("footer").offset().top
        }, 1000);
    });
    
});