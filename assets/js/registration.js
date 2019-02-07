//jQuery time
let current_fs, next_fs, previous_fs; //fieldsets
let left, opacity, scale; //fieldset properties which we will animate
let animating; //flag to prevent quick multi-click glitches

$(".next1").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    if (validate_Input1() === true) {
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
});


$(".next2").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    if (validate_Input2() === true) {
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

document.querySelector("#submit").addEventListener("click", function () {
    let check = true;
    if (validate_Input3() === false) {
        check = false;
    }
    return check;
});

function validate_Input1() {
    var fieldset1 = document.getElementById("fieldset1");
    var input = fieldset1.getElementsByClassName("userInput");
    let check = true;

    if (validate_email(input[0]) === false) {
        //showValidate(input[0]);
        check = false;
        alert("Wrong email format");
    }
    if (validate_password(input[1]) === false) {
        //showValidate(input[1]);
        //showValidate(input[2]);
        check = false;
    }
    if (input[1].value !== input[2].value) {
        //showValidate(input[1]);
        //showValidate(input[2]);
        alert("Passwords do not match");
        return false;
    }
        return check;
};

function validate_email(email) {
    if ($(email).attr('name') === 'email') {
        if ($(email).val().trim().match(/^([a-zA-Z0-9_\-.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(]?)$/) == null) {
            return false;
        }
    }
}

function validate_password(password) {
    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/;
    var aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;

    if (password.value.trim() === "") {
        //showValidate(input[1]);
        alert("Blank password");
        return false;
    }
    if (password.value.length < 8 || password.value.length > 15) {
        alert("Invalid password length");
        return false;
    }
    if (password.value.search(anUpperCase) == -1 || password.value.search(aLowerCase) == -1 || password.value.search(aNumber) == -1 || password.value.search(aSpecial) == -1) {
        alert("Invalid composition");
        return false;
    }
}



function validate_Input2() {
    var fieldset2 = document.getElementById("fieldset2");
    var input = fieldset2.getElementsByClassName("userInput");

    if(input[0].checked===false && input[1].checked===false ){
        alert("Please select your gender");
        return false
    }
    if (validate_phonenumber(input[2]) === false) {
        alert("Invalid phone number");
        return false;
    }
    else{
        return true;
    }
}


function validate_phonenumber(phone_number) {
        var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  //does not check for random number like 1234567890
        if (phone_number.value.match(phoneno))
        {
            return true;
        }
        else
        {
            return false;
        }
}

function validate_Input3() {
    var fieldset3 = document.getElementById("fieldset3");
    var input = fieldset3.getElementsByClassName("userInput");

    if (validate_name(input[0]) === false || validate_name(input[1]) === false){
        return false;
    }
    else{
        return true;
    }
}

function validate_name(name) {
    var aNumber = /[0-9]/;
    var aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    if (name.value.trim() === "") {
        alert("Blank name");
        return false;
    }
    if (name.value.search(aNumber) !== -1 || name.value.search(aSpecial) !== -1) {
        alert("Invalid name");
        return false;
    }
}




