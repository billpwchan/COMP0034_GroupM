(function ($) {
    $(".main-btn").on('click', function (event) {
        $('html,body').animate({
                scrollTop: $("#about").offset().top
            },
            'slow');
    });
    $(".white-btn").on('click', function (event) {
        Swal.fire({
            title: 'Custom animation with Animate.css',
            animation: false,
            customClass: 'animated tada'
        });
    })
})(jQuery);