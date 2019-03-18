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
    $(".js-range-slider").ionRangeSlider({
        skin: "flat",
        prefix: "£",
        onStart: function (data) {
            // // Called right after range slider instance initialised
            // console.log(data.input);        // jQuery-link to input
            // console.log(data.slider);       // jQuery-link to range sliders container
            // console.log(data.min);          // MIN value
            // console.log(data.max);          // MAX values
            // console.log(data.from);         // FROM value
            // console.log(data.from_percent); // FROM value in percent
            // console.log(data.from_value);   // FROM index in values array (if used)
            // console.log(data.to);           // TO value
            // console.log(data.to_percent);   // TO value in percent
            // console.log(data.to_value);     // TO index in values array (if used)
            // console.log(data.min_pretty);   // MIN prettified (if used)
            // console.log(data.max_pretty);   // MAX prettified (if used)
            // console.log(data.from_pretty);  // FROM prettified (if used)
            // console.log(data.to_pretty);    // TO prettified (if used)
        },

        onChange: function (data) {
            // Called every time handle position is changed

            // console.log(data.from);
        },

        onFinish: function (data) {
            // Called then action is done and mouse is released
            window.location.href = pageKey + ".php?fromPrice=" + data.from + "&toPrice=" + data.to + "&criteria=2";
        },

        onUpdate: function (data) {
            // Called then slider is changed using Update public method

            console.log(data.from_percent);
        }
    });
})(jQuery);