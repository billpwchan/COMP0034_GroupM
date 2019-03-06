/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

$(document).ready(function () {
    $('.service-choose button').on('click', function () {
        $('.service-choose button').removeClass('active');
        let serviceLevel = $(this).attr('class');
        $('.left-column img').removeClass('active');
        $('.left-column img[data-image = ' + serviceLevel + ']').addClass('active');
        $(this).addClass('active');
        let retailPrice = parseFloat(document.getElementById('productPrice').innerText);
        switch (serviceLevel) {
            case 'basic':
                break;
            case 'advanced':
                retailPrice *= 1.5;
                break;
            case 'premium':
                retailPrice *= 2.0;
                break;
        }
        document.getElementById('productPriceDisplay').setAttribute('value', retailPrice.toFixed(2).toString());
        document.getElementById('service').setAttribute('value', serviceLevel);
    });
    $("#datetimepicker").datetimepicker({
        step: 30
    });
});