/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

$(document).ready(function () {
    document.getElementById("order_tab").style.borderBottom = "2px solid #999";
    $(".menu-only, .entertainment-only, .venue-only").attr("style", "display:none");
});

document.getElementById("order_tab").addEventListener("click", function () {
    clearLowerBorder();
    document.getElementById("order_tab").style.borderBottom = "2px solid #999";
});

document.getElementById("personal_tab").addEventListener("click", function () {
    clearLowerBorder();
    document.getElementById("personal_tab").style.borderBottom = "2px solid #999";
});

document.getElementById("service_tab").addEventListener("click", function () {
    clearLowerBorder();
    document.getElementById("service_tab").style.borderBottom = "2px solid #999";
});

function clearLowerBorder() {
    document.getElementById("order_tab").style.borderBottom = "0px solid #999";
    document.getElementById("personal_tab").style.borderBottom = "0px solid #999";
    document.getElementById("service_tab").style.borderBottom = "0px solid #999";
}

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


$('#event_type').on('change', function () {
    switch (this.value.toLowerCase()) {
        case "venue":
            $(".venue-only").attr("style", "");
            $(".menu-only, .entertainment-only").attr("style", "display:none");
            break;
        case "menu":
            $(".menu-only").attr("style", "");
            $(".entertainment-only, .venue-only").attr("style", "display:none");
            getMenuItems();
            break;
        case "entertainment":
            $(".entertainment-only").attr("style", "");
            $(".menu-only, .venue-only").attr("style", "display:none");
            getEntertainers();
            break;
        default:
            $(".entertainment-only, .venue-only, .menu-only").attr("style", "display:none");
    }
});

function getMenuItems() {
    $.getJSON("assets/controllers/getProvidedServices.php?methodID=1", function (data) {
        $.each(data, function (i, val) {
            $("#menuItems").append($("<option></option>")
                .attr("value", val['menuitem_ID'])
                .text(val['name']));
        });
    });
}

function getEntertainers() {
    $.getJSON("assets/controllers/getProvidedServices.php?methodID=2", function (data) {
        $.each(data, function (i, val) {
            console.log(val);
            $("#entertainers").append($("<option></option>")
                .attr("value", val['entertainer_ID'])
                .text("Name: " + val['name'] + " Skill: " + val['skill']));
        });
    });
}


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

