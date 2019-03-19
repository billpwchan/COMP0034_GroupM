/*
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */
let counter = 0;
$(document).ready(function () {
    document.getElementById("order_tab").style.borderBottom = "2px solid #999";
    $(".menu-only, .entertainment-only, .venue-only").attr("style", "display:none");

});

$("table.order-list").on("click", "#add_menuItem", function () {
    counter++;
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td><select id="menuItems' + counter + '" class="form-control menu_item_list" name="menuItems[]"/></td>';
    cols += '<td><label for="" class="col-form-label">Quantity:</label></td>';
    cols += '<td><input type="number" id="quantity' + counter + '" class="form-control" min="1" name="quantities[]"/></td>';

    cols += '<td><input type="button" class="delete_button btn btn-md btn-danger" value="Delete"></td>';
    newRow.append(cols);
    $("table.order-list").append(newRow);

    $("#menuItems" + counter).append($("<option></option>").text("---- Select menu item(s) ----"));
    $.getJSON("assets/controllers/getProvidedServices.php?methodID=1", function (data) {
        $.each(data, function (i, val) {
            $("#menuItems" + counter).append($("<option></option>")
                .attr("value", val['menuitem_ID'])
                .text(val['name']));
        });
    });
});



$("table.order-list").on("click", ".delete_button", function () {
        var table_row = $(this).closest("tr");
        var deleted_id = $(table_row).find(".menu_item_list")[0].id;
        var deleted_counter = deleted_id.match(/\d+/)[0];

        $(this).closest("tr").remove();
        for (var a = deleted_counter; a<=counter; a++) {
            $("#menuItems" + (a)).attr({
                id: "menuItems" + (a-1),
            });
            $("#quantity" + (a)).attr({
                id: "quantity" + (a-1),
            });
        }
        counter -= 1;
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
    $('#menuItems').empty()
                   .append($("<option></option>").text("---- Select menu item(s) ----"));
    $.getJSON("assets/controllers/getProvidedServices.php?methodID=1", function (data) {
        $.each(data, function (i, val) {
            $("#menuItems").append($("<option></option>")
                .attr("value", val['menuitem_ID'])
                .text(val['name']));
        });
    });
}

function getEntertainers() {
    $('#entertainers').empty()
                      .append($("<option></option>").text("---- Select entertainer(s) ----"));
    $.getJSON("assets/controllers/getProvidedServices.php?methodID=2", function (data) {
        $.each(data, function (i, val) {
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

function submit_form() {
    var submit = true;
    var drop_down_list = document.getElementById("event_type");
    var selected_service = drop_down_list.options[drop_down_list.selectedIndex].text;

    // -------- General Information --------
    if ($("#event_type option:selected").index() === 0){
        showAlert("Event type not specified", "Please select the type of your new service");
        submit = false;
    }
    if (validate_service_name(document.getElementById("service_name")) === false){
         submit = false;
     }
    if (validate_price(document.getElementById("service_price")) === false){
        submit = false;
    }
    if (validate_description(document.getElementById("service_description")) === false){
        submit = false;
    }
    if(document.getElementById("eventImage1").files.length == 0 || document.getElementById("eventImage2").files.length == 0 || document.getElementById("eventImage3").files.length == 0) {
        showAlert("Image not uploaded", "Please upload images for your new service.");
        submit = false;
    }

    // -------- Venue --------
     if (selected_service === "Venue"){
         if (validate_address(document.getElementById("venue_address")) === false){
             submit = false;
         }
         if (validate_postcode(document.getElementById("venue_postcode")) === false){
             submit = false;
         }
         if (validate_capacity(document.getElementById("venue_capacity")) === false){
             submit = false;
         }
         if (validate_region(document.getElementById("venue_region")) === false){
             submit = false;
         }
    }

    // -------- Entertainment --------
    if (selected_service === "Entertainment"){
        if (validate_duration(document.getElementById("entertainment_duration")) === false){
            submit = false;
        }
        if ($("#entertainers")[0].selectedIndex <= 0) {
            showAlert("No selected items", "Please select the entertainers that is included in your new package");
            submit = false;
        }
    }

    // -------- Menu --------
    if (selected_service === "Menu"){
        if (validate_duration(document.getElementById("menu_duration")) === false){
            submit = false;
        }
        if (validate_quantity(document.getElementById("quantity")) === false){
            submit = false;
        }
        if ($("#menuItems")[0].selectedIndex <= 0) {
            showAlert("No selected items", "Please select the food that is included in your new menu");
            submit = false;
        }
        if (counter >0){
            var i;
            for (i = 1; i<=counter; i++){
                if ($("#menuItems" + i)[0].selectedIndex <= 0) {
                    showAlert("No selected items", "Please select the food that is included in your new menu");
                    submit = false;
                }
                if (validate_quantity(document.getElementById("quantity" + i)) === false){
                    submit = false;
                }
            }
        }
    }
    return submit;
};

function validate_service_name(name) {
    const aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    if (name.value.trim() === "") {
        showAlert("Blank service name", "Please enter the name of your new service.");
        return false;
    }
    if (name.value.search(aSpecial) !== -1) {
        showAlert("Invalid name format", "Please do not include special characters in the name");
        return false;
    }
}

function validate_price(price) {
    if (price.value.trim() === "") {
        showAlert("Please enter the price", "");
        return false;
    }
    if (price.value <= 0 || name.value >= 5000) {
        showAlert("Price not within normal range.", "Please re-enter your price.");
        return false;
    }
}

function validate_description(description) {
    if (description.value.trim() === "") {
        showAlert("Blank description", "Please enter the description of your new service.");
        return false;
    }
}

function validate_address(address) {
    const aSpecial = /[!|@|#|$|%|^|&|*|(|)|_]/;
    if (address.value.trim() === "") {
        showAlert("Blank address", "Please enter the first line of address of your new venue.");
        return false;
    }
    if (address.value.search(aSpecial) !== -1) {
        showAlert("Invalid address", "Please do not include special characters in the address");
        return false;
    }
}

function validate_postcode(postcode) {
    var postcodeReg = /^[A-Z]{1,2}[0-9]{1,2}[A-Z]{0,1} ?[0-9][A-Z]{2}$/i;
    if (postcode.value.trim() === "") {
        showAlert("Blank post code", "Please enter the post code of your new venue.");
        return false;
    }
    if (postcodeReg.test(postcode.value) === false){
        showAlert("Invalid post code", "Please re-enter the post code of your new venue.");
        return false;
    }
}

function validate_capacity(capacity) {
    if (capacity.value.trim() === "") {
        showAlert("Blank capacity", "Please enter the capacity of your new venue.");
        return false;
    }
    if (capacity.value <=0 || capacity.value >=1000) {
        showAlert("Capacity not within normal range", "PPlease re-enter the capacity of your new venue.");
        return false;
    }
}

function validate_region(region) {
    const aSpecial = /[!|@|#|$|%|^|&|*|(|)|_]/;
    if (region.value.trim() === "") {
        showAlert("Blank region", "Please enter which region your new venue is located at.");
        return false;
    }
    if (region.value.search(aSpecial) !== -1) {
        showAlert("Invalid region", "Please do not include special characters.");
        return false;
    }
}

function validate_duration(duration) {
    if (duration.value.trim() === "") {
        showAlert("Blank duration", "Please enter the duration of your new service");
        return false;
    }
    if (duration.value <=0 || duration.value >=24) {
        showAlert("Duration not within normal range", "PPlease re-enter the duration of your new service.");
        return false;
    }
}

function validate_quantity(quantity) {
    if (quantity.value.trim() === "") {
        showAlert("Blank quantity", "Please enter the quantity of your menu item.");
        return false;
    }
}

$("input[id='eventImage1']").change(function(){
    var filename = $(this).val().split('\\').pop();
    document.getElementById('eventImage1_label').innerText = filename;
});

$("input[id='eventImage2']").change(function(){
    var filename = $(this).val().split('\\').pop();
    document.getElementById('eventImage2_label').innerText = filename;
});

$("input[id='eventImage3']").change(function(){
    var filename = $(this).val().split('\\').pop();
    document.getElementById('eventImage3_label').innerText = filename;
});