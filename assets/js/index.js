(function ($) {
    $(".main-btn").on('click', function (event) {
        $('html,body').animate({
                scrollTop: $("#about").offset().top
            },
            'slow');
    });
})(jQuery);