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
    $(".searchbar input").keypress(function (event) {
        if (event.which === 13) {
            let searchName = $('#search_input').val();
            window.location.href = "events.php?searchKey=" + searchName + "&criteria=1"
        }
    });

    // var rangeSlider = document.getElementById("rs-range-line");
    // var rangeBullet = document.getElementById("rs-bullet");
    //
    // $("#rs-range-line").on('input', function() {
    //     $('#rs-bullet').text($('#rs-range-line').val());
    //     var bulletPosition = (rangeSlider.value / rangeSlider.max);
    //     rangeBullet.style.left = (bulletPosition * 578) + "px";
    // });
    // rangeSlider.addEventListener("input", showSliderValue, false);
    //
    // function showSliderValue() {
    //
    // }
})(jQuery);