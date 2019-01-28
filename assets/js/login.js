(function ($) {
    "use strict";
    let input = $('.validate-input .userInput');

    $('.validate-form').on('submit', function () {
        let check = true;
        for (let i = 0; i < input.length; i++) {
            if (validate(input[i]) === false) {
                showValidate(input[i]);
                check = false;
            }
        }
        return check;
    });


    $('.validate-form .userInput').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('name') === 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() === '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        $(input).siblings(".alert-validate").css("visibility", "visible")
    }

    function hideValidate(input) {
        $(input).siblings(".alert-validate").css("visibility", "hidden")
    }
})(jQuery);