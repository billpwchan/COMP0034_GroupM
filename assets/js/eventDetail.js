$(document).ready(function() {

    $('.service-choose button').on('click', function() {
        let serviceLevel = $(this).attr('class');
        console.log(serviceLevel.toString());
        $('.active').removeClass('active');
        $('.left-column img[data-image = ' + serviceLevel + ']').addClass('active');
        $(this).addClass('active');
    });

});