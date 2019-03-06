/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

$( document ).ready(function() {
    document.getElementById("order_tab").style.borderBottom = "2px solid #999";
});

document.getElementById("order_tab").addEventListener("click", function() {
    document.getElementById("order_tab").style.borderBottom = "2px solid #999";
    document.getElementById("personal_tab").style.borderBottom = "0px solid #999";
});

document.getElementById("personal_tab").addEventListener("click", function() {
    document.getElementById("personal_tab").style.borderBottom = "2px solid #999";
    document.getElementById("order_tab").style.borderBottom = "0px solid #999";
});

let original_firstname = document.querySelector("#staticfirst_name").value;
let original_lastname = document.querySelector("#staticlast_name").value;
let original_contact_number = document.querySelector("#staticcontact_number").value;


// *********   Field: First name
document.querySelector("#edit_button_first_name").addEventListener("click", function () {
    $("#staticfirst_name").prop('readonly', false);
    document.querySelector("#edit_button_first_name").style.visibility = "hidden";
    document.querySelector("#save_button_first_name").style.visibility = "visible";
    document.querySelector("#cancel_button_first_name").style.visibility = "visible";
});
document.querySelector("#save_button_first_name").addEventListener("click", function () {
    if (validate_name(document.querySelector("#staticfirst_name")) !== false) {
        $("#staticfirst_name").prop('readonly', true);
        document.querySelector("#edit_button_first_name").style.visibility = "visible";
        document.querySelector("#save_button_first_name").style.visibility = "hidden";
        document.querySelector("#cancel_button_first_name").style.visibility = "hidden";
        update_first_name();
        original_firstname = document.querySelector("#staticfirst_name").value;
    }
});
document.querySelector("#cancel_button_first_name").addEventListener("click", function () {
    $("#staticfirst_name").prop('readonly', true);
    $("#staticfirst_name").val(original_firstname);
    document.querySelector("#edit_button_first_name").style.visibility = "visible";
    document.querySelector("#save_button_first_name").style.visibility = "hidden";
    document.querySelector("#cancel_button_first_name").style.visibility = "hidden";
});

// *********   Field : Last name
document.querySelector("#edit_button_last_name").addEventListener("click", function () {
    $("#staticlast_name").prop('readonly', false);
    document.querySelector("#edit_button_last_name").style.visibility = "hidden";
    document.querySelector("#save_button_last_name").style.visibility = "visible";
    document.querySelector("#cancel_button_last_name").style.visibility = "visible";

});
document.querySelector("#save_button_last_name").addEventListener("click", function () {
    if (validate_name(document.querySelector("#staticlast_name")) !== false) {
        $("#staticlast_name").prop('readonly', true);
        document.querySelector("#edit_button_last_name").style.visibility = "visible";
        document.querySelector("#save_button_last_name").style.visibility = "hidden";
        document.querySelector("#cancel_button_last_name").style.visibility = "hidden";
        update_last_name();
        original_lastname = document.querySelector("#staticlast_name").value;
    }
});
document.querySelector("#cancel_button_last_name").addEventListener("click", function () {
    $("#staticlast_name").prop('readonly', true);
    $("#staticlast_name").val(original_lastname);
    document.querySelector("#edit_button_last_name").style.visibility = "visible";
    document.querySelector("#save_button_last_name").style.visibility = "hidden";
    document.querySelector("#cancel_button_last_name").style.visibility = "hidden";
});

// *********   Field: Contact number
document.querySelector("#edit_button_contact_number").addEventListener("click", function () {
    $("#staticcontact_number").prop('readonly', false);
    document.querySelector("#edit_button_contact_number").style.visibility = "hidden";
    document.querySelector("#save_button_contact_number").style.visibility = "visible";
    document.querySelector("#cancel_button_contact_number").style.visibility = "visible";
});

document.querySelector("#save_button_contact_number").addEventListener("click", function () {
    if (validate_phonenumber(document.querySelector("#staticcontact_number")) !== false) {
        $("#staticcontact_number").prop('readonly', true);
        document.querySelector("#edit_button_contact_number").style.visibility = "visible";
        document.querySelector("#save_button_contact_number").style.visibility = "hidden";
        document.querySelector("#cancel_button_contact_number").style.visibility = "hidden";
        update_contact_number();
        original_contact_number = document.querySelector("#staticcontact_number").value;
    }
});
document.querySelector("#cancel_button_contact_number").addEventListener("click", function () {
    $("#staticcontact_number").prop('readonly', true);
    $("#staticcontact_number").val(original_contact_number);
    document.querySelector("#edit_button_contact_number").style.visibility = "visible";
    document.querySelector("#save_button_contact_number").style.visibility = "hidden";
    document.querySelector("#cancel_button_contact_number").style.visibility = "hidden";
});


function update_first_name() {
    $.ajax({
        type: "POST",
        url: "assets/controllers/updateUserProfile.php",
        data: {'new_first_name': document.querySelector("#staticfirst_name").value, 'methodID': 1},
        success: function (data) {
        }
    });
}

function update_last_name() {
    $.ajax({
        type: "POST",
        url: "assets/controllers/updateUserProfile.php",
        data: {'new_last_name': document.querySelector("#staticlast_name").value, 'methodID': 2},
        success: function (data) {
        }
    });
}

function update_contact_number() {
    $.ajax({
        type: "POST",
        url: "assets/controllers/updateUserProfile.php",
        data: {'new_contact_number': document.querySelector("#staticcontact_number").value, 'methodID': 4},
        success: function (data) {
        }
    });
}

