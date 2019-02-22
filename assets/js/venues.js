(function ($) {
    $('.product-grid').on('submit', function () {
        let id = $(this).find('.product-id').text();
        window.location.href = "./assets/controllers/addToCart.php?id=" + id + "&from=events";
        return false;
    });
    $(".primary-btn").on('click', function () {
        $('html,body').animate({
                scrollTop: $("#product-display").offset().top
            },
            'slow');
    });
})(jQuery);