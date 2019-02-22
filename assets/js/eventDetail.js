$(document).ready(function() {

    $('.service-choose button').on('click', function() {
        let serviceLevel = $(this).attr('class');
        console.log(serviceLevel.toString());
        $('.active').removeClass('active');
        $('.left-column img[data-image = ' + serviceLevel + ']').addClass('active');
        $(this).addClass('active');
    });
    (function($){

        BBDateTimePicker = {
            init: function()
            {
                BBDateTimePicker._bindEvents()
            },

            _bindEvents: function()
            {
                $('body').delegate('.datetime', 'mouseenter', BBDateTimePicker._datePicker);
            },

            _datePicker: function()
            {
                $('.datetime').datetimepicker();
            }

        };

        $(function(){
            BBDateTimePicker.init();
        });
        function validate(input) {
            if ($(input).attr('datetime') === 'datetime') {
            } else {
                if ($(input).val().trim() === '') {
                    return false;
                }
            }
        }
function doFirst() {
    var datetime = document.getElementById("datetime")
    button.addEventListener("click", save, false);
}
function save(){
            var datetime = ocument.getElementById("datetime").value;
            sessionStorage.setItem(datetime);
}
    })(jQuery);
    window.addEventListener("load", doFirst, False);
});