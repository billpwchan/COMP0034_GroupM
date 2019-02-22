(function ($) {
    $(".main-btn").on('click', function (event) {
        $('html,body').animate({
                scrollTop: $("#about").offset().top
            },
            'slow');
    });
    window.addEventListener("load", function () {
        document.getElementById('index-loader').animate({top: -200}, 1500);
        document.getElementById('index-loader').style.display = 'none';
    });
})(jQuery);
