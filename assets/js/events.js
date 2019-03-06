/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

(function ($) {
    let url = window.location.href;
    var pageKey = "";
    if (url.includes('events')) {
        pageKey = 'events';
    } else if (url.includes('menus')) {
        pageKey = 'menus';
    } else if (url.includes('venues')) {
        pageKey = 'venues'
    }
    $('.product-grid').on('submit', function () {
        let id = $(this).find('.product-id').text();
        window.location.href = "./assets/controllers/addToCart.php?id=" + id + "&from= " + pageKey;
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
        window.location.href = pageKey + ".php?searchKey=" + searchName + "&criteria=1"
    });
    $(".searchbar input").keypress(function (event) {
        if (event.which === 13) {
            let searchName = $('#search_input').val();
            window.location.href = pageKey + ".php?searchKey=" + searchName + "&criteria=1"
        }
    });
    $("#product-display .clear-button").on('click', function () {
        $('#search_input').val('');
        window.location.href = pageKey + ".php";
    });
})(jQuery);