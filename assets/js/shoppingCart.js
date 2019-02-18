$('.minus-btn').on('click', function (e) {
    e.preventDefault();
    let $this = $(this);
    let $input = $this.closest('div').find('input');
    let value = parseInt($input.val());

    if (value > 1) {
        value = value - 1;
    } else {
        value = 0;
    }

    $input.val(value);

});

$('.plus-btn').on('click', function (e) {
    e.preventDefault();
    let $this = $(this);
    let $input = $this.closest('div').find('input');
    let value = parseInt($input.val());

    if (value < 100) {
        value = value + 1;
    } else {
        value = 100;
    }

    $input.val(value);
});

$('.like-btn').on('click', function () {
    $(this).toggleClass('is-active');
});

document.querySelector("#apply_voucher").addEventListener("click", function() {
    check_coupon();
});

function check_coupon() {
    $.ajax({
        type: "POST",
        url: "assets/controllers/coupon.php",
        data: {'voucher_code': document.querySelector("#voucher_code").value, 'methodID': 1},
        success: function (data) {
            apply_coupon(data);
        }
    });
}

function apply_coupon(discount){
    if (discount == 0){
        alert("Invalid voucher");
    }
    else {
        alert("The discount is " + discount + "% off");
    }

}
