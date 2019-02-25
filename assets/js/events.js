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
    $(".searchbar a").on('click', function () {
        let searchName = $('#search_input').val();
        window.location.href = "events.php?searchKey=" + searchName + "&criteria=1"
    });

    function update_search_name(searchName) {
        $.ajax({
            type: "GET",
            url: "assets/controllers/events.php",
            data: {'searchKey': searchName, 'criteria': 1},
            success: function (data) {
                location.reload();
            }
        });
    }
})(jQuery);