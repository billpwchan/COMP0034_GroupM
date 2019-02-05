(function ($) {
    $(".shopping-cart").hide();
    $("#cart").on("click", function () {
        $(".shopping-cart").fadeToggle("slow", "linear");
    });
    $("#logout").on('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            animation: false,
            customClass: 'animated tada',
            text: "You are going to logout UberKidz",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Logging out...',
                    type: 'success'
                });
                window.location.href = "index.php?logout=true";
            } else {
                return false;
            }
        });
    });
})(jQuery);