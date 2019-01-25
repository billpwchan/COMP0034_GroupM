(function ($) {
    $(".shopping-cart").hide();
    $("#cart").on("click", function () {
        $(".shopping-cart").fadeToggle("slow", "linear");
    });
})(jQuery);