   document.querySelector("#apply_voucher").addEventListener("click", function () {
        if (document.querySelector("#voucher_code").value.trim() === "") {
            showAlert("Please enter the coupon code.");
        } else {
            check_coupon();
        }
    });

    document.querySelector("#checkout").addEventListener("click", function () {
        window.location.replace("assets/controllers/checkout.php");
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

    function apply_coupon(discount) {
        if (discount === 0) {
            alert("Invalid voucher");
        }
    else {
        item_prices1 = new Array();
        $.ajax({
            type: "POST",
            url: "assets/controllers/update_cart.php",
            data: {'discount': discount, 'methodID': 2},
            dataType:"json",
            success: function (data) {
                item_prices1 = data;
            }
        });
        location.reload();
       /* var elements = document.getElementsByClassName("original_price");
        var i;
        for (i = 0; i < elements.length; i++) {
            elements[i].style.textDecoration = "line-through";
        }*/
    }
}

function showAlert(message) {
    alert(message);
}

function delete_item(item_id) {
    $.ajax({
        type: "POST",
        url: "assets/controllers/update_cart.php",
        data: {'item_id': item_id, 'methodID': 1},
        success: function (data) {
        }
    });
    location.reload();
}
