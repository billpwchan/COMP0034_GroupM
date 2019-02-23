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
    if (document.querySelector("#voucher_code").value.trim() === "") {
        showAlert("Please enter the coupon code.");
    } else {
        check_coupon();
    }
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
        item_prices1 = new Array();
        alert("The discount is " + discount + "% off");
        $.ajax({
            type: "POST",
            url: "assets/controllers/update_cart.php",
            data: {'discount': discount, 'methodID': 2},
            dataType:"json",
            success: function (data) {
                item_prices1 = data;
                apply_discount(item_prices1);
            }
        });
    }
}

function showAlert(message) {
    alert(message);
}

function delete_item(item_id) {
    alert("JS: delete_item " + item_id);
    $.ajax({
        type: "POST",
        url: "assets/controllers/update_cart.php",
        data: {'item_id': item_id, 'methodID': 3},
        success: function (data) {
            alert(data);
        }
    });
    //location.reload();
}

function apply_discount(item_prices){
    var i;
    var string ="";
    for (i=0; i < item_prices.length; i++){
        string += item_prices[i] + "  ";
    } alert(string);
}