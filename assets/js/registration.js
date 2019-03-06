/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

//jQuery time
$(document).ready(function () {
    $('input:radio').click(function () {
        $('input:radio').not(this).prop('checked', false);
    });

    $(window).keydown(function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            return false;
        }
    });
});

let current_fs, next_fs, previous_fs; //fieldsets
let left, opacity, scale; //fieldset properties which we will animate
let animating; //flag to prevent quick multi-click glitches

function animation_ease() {
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
}

$(".next1").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    if (validate_Input1() === true) {
        animation_ease();
    }
});

$(".next2").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    if (validate_Input2() === true) {
        animation_ease();
    }
});

$(".previous").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});


function validate_Input1() {
    const fieldset1 = document.getElementById("fieldset1");
    const input = fieldset1.getElementsByClassName("userInput");
    let check = true;
    if (validate_email(input[0]) === false) {
        check = false;
        showAlert("Wrong email format", "Has to be format like abc@d.efg");
    }
    if (validate_password(input[1]) === false) {
        check = false;
        showAlert("Wrong Password Format", "Has to be a combination of Number, UpperCase Letter, LowerCase Letter.")
    }
    if (input[1].value !== input[2].value) {
        check = false;
        showAlert("Passwords are Not Match!", "Please retry entering password.");
    }
    if ($('.userInput option:selected').val() === "") {
        check = false;
        showAlert("Please select Account Type!", "Only customer can place order, while service provider can add products.")
    }
    return check;
}

function validate_Input2() {
    const fieldset2 = document.getElementById("fieldset2");
    const input = fieldset2.getElementsByClassName("userInput");

    if (input[0].checked === false && input[1].checked === false) {
        showAlert("Please select your gender", "");
        return false
    }
    if (validate_phonenumber(input[2]) === false) {
        showAlert("Invalid phone number", "Has to follow the UK format.");
        return false;
    }
    return true;

}


function validate_Input3() {
    const fieldset3 = document.getElementById("fieldset3");
    const input = fieldset3.getElementsByClassName("userInput");

    if (validate_name(input[0]) === false || validate_name(input[1]) === false) {
        return false;
    }
}







