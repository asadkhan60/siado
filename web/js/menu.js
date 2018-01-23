$(document).ready(function () {

    var menu_liste = $(".menu-principal .menu-principal-liste .menu-liste-li");

    $(menu_liste).hover(
        function() {
            $(this).find(".sous-menu").addClass("sous-menu-active");
        },
        function() {
            $(this).find(".sous-menu").removeClass("sous-menu-active");
        }
    );

    function initialisationSousMenu() {
        for(var i = 0; i < menu_liste.length; i++) {
            var color = menu_liste[i].style.borderBottomColor;

            var sous_menu = menu_liste[i].getElementsByClassName("sous-menu");
            sous_menu[0].style.borderBottom = "5px solid " + color;

            var sous_menu_right = sous_menu[0].getElementsByClassName("sous-menu-right");
            var sous_menu_right_titre = sous_menu_right[0].getElementsByClassName("sous-menu-right-titre");
            sous_menu_right_titre[0].style.color = color;

            var sous_menu_titre = sous_menu[0].getElementsByClassName("sous-menu-titre");
            sous_menu_titre[0].style.color = color;

            var description_fa_liste = sous_menu[0].getElementsByClassName("fa-properties");
            for(var y = 0; y < description_fa_liste.length; y++){
                description_fa_liste[y].style.backgroundColor = color;
            }
        }
    }

    initialisationSousMenu();


    $(this).scroll(function() {
        if (!window.matchMedia("(max-width: 901px)").matches) {
            $(".menu-top").css(
                {
                    display: $(this).scrollTop() < 100 ? "block":"none"
                }
            );
        }else{
            $(".menu-top").css(
                {
                    display: "block"
                }
            );
        }

        $(".menu-icone").css(
            {
                display: $(this).scrollTop() < 100 ? "block":"none"
            }
        );

        $(".menu-principal").css(
            {
                minHeight: $(this).scrollTop() < 100 ? "92px":"43px"
            }
        );
    });


    $( ".menu-hamburger img").click(function() {
        $(".menu-principal").toggle();
    });
});