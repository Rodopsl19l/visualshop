new WOW().init();

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll <= 350) {
        $("#navbar").addClass("navbar-transparent");
        $("#navbar").removeClass("navbar-visible");
    } else {
        $("#navbar").addClass("navbar-visible");
        $("#navbar").removeClass("navbar-transparent");
    }
});
