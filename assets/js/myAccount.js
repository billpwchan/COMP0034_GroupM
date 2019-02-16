var original_firstname = document.querySelector("#staticfirst_name").value;
var original_lastname = document.querySelector("#staticlast_name").value;
var original_password = document.querySelector("#staticpassword").value;
var original_contact_number = document.querySelector("#staticcontact_number").value;

// *********   Field: First name
document.querySelector("#edit_button_first_name").addEventListener("click", function() {
    $("#staticfirst_name").prop('readonly', false);
    document.querySelector("#edit_button_first_name").style.visibility="hidden";
    document.querySelector("#save_button_first_name").style.visibility="visible";
    document.querySelector("#cancel_button_first_name").style.visibility="visible";
});
document.querySelector("#save_button_first_name").addEventListener("click", function() {
    if (validate_name(document.querySelector("#staticfirst_name")) !== false) {
        $("#staticfirst_name").prop('readonly', true);
        document.querySelector("#edit_button_first_name").style.visibility = "visible";
        document.querySelector("#save_button_first_name").style.visibility = "hidden";
        document.querySelector("#cancel_button_first_name").style.visibility="hidden";
        update_first_name();
    }
});
document.querySelector("#cancel_button_first_name").addEventListener("click", function() {
        $("#staticfirst_name").prop('readonly', true);
        $("#staticfirst_name").val(original_firstname);
        document.querySelector("#edit_button_first_name").style.visibility = "visible";
        document.querySelector("#save_button_first_name").style.visibility = "hidden";
        document.querySelector("#cancel_button_first_name").style.visibility="hidden";
});

// *********   Field : Last name
document.querySelector("#edit_button_last_name").addEventListener("click", function() {
    $("#staticlast_name").prop('readonly', false);
    document.querySelector("#edit_button_last_name").style.visibility="hidden";
    document.querySelector("#save_button_last_name").style.visibility="visible";
    document.querySelector("#cancel_button_last_name").style.visibility="visible";

});
document.querySelector("#save_button_last_name").addEventListener("click", function() {
    if (validate_name(document.querySelector("#staticlast_name")) !== false) {
        $("#staticlast_name").prop('readonly', true);
        document.querySelector("#edit_button_last_name").style.visibility = "visible";
        document.querySelector("#save_button_last_name").style.visibility = "hidden";
        document.querySelector("#cancel_button_last_name").style.visibility="hidden";
        update_last_name();
    }
});
document.querySelector("#cancel_button_last_name").addEventListener("click", function() {
    $("#staticlast_name").prop('readonly', true);
    $("#staticlast_name").val(original_lastname);
    document.querySelector("#edit_button_last_name").style.visibility = "visible";
    document.querySelector("#save_button_last_name").style.visibility = "hidden";
    document.querySelector("#cancel_button_last_name").style.visibility="hidden";
})

// *********   Field: Password
document.querySelector("#edit_button_password").addEventListener("click", function() {
    $("#staticpassword").prop('readonly', false);
    document.querySelector("#edit_button_password").style.visibility="hidden";
    document.querySelector("#save_button_password").style.visibility="visible";
    document.querySelector("#cancel_button_password").style.visibility="visible";
});
document.querySelector("#save_button_password").addEventListener("click", function() {
    if (validate_password(document.querySelector("#staticpassword")) !== false) {
        $("#staticpassword").prop('readonly', true);
        document.querySelector("#edit_button_password").style.visibility="visible";
        document.querySelector("#save_button_password").style.visibility="hidden";
        document.querySelector("#cancel_button_password").style.visibility="hidden";
        update_password();
    }
});
document.querySelector("#cancel_button_password").addEventListener("click", function() {
    $("#staticpassword").prop('readonly', true);
    $("#staticpassword").val(original_password);
    document.querySelector("#edit_button_password").style.visibility = "visible";
    document.querySelector("#save_button_password").style.visibility = "hidden";
    document.querySelector("#cancel_button_password").style.visibility="hidden";
});

// *********   Field: Contact number
document.querySelector("#edit_button_contact_number").addEventListener("click", function() {
    $("#staticcontact_number").prop('readonly', false);
    document.querySelector("#edit_button_contact_number").style.visibility="hidden";
    document.querySelector("#save_button_contact_number").style.visibility="visible";
    document.querySelector("#cancel_button_contact_number").style.visibility="visible";
});

document.querySelector("#save_button_contact_number").addEventListener("click", function() {
    if (validate_phonenumber(document.querySelector("#staticcontact_number")) !== false) {
        $("#staticcontact_number").prop('readonly', true);
        document.querySelector("#edit_button_contact_number").style.visibility = "visible";
        document.querySelector("#save_button_contact_number").style.visibility = "hidden";
        document.querySelector("#cancel_button_contact_number").style.visibility="hidden";
        update_contact_number();
    }
});
document.querySelector("#cancel_button_contact_number").addEventListener("click", function() {
    $("#staticcontact_number").prop('readonly', true);
    $("#staticcontact_number").val(original_contact_number);
    document.querySelector("#edit_button_contact_number").style.visibility = "visible";
    document.querySelector("#save_button_contact_number").style.visibility = "hidden";
    document.querySelector("#cancel_button_contact_number").style.visibility="hidden";
})


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

function update_password() {
    $.ajax({
        type: "POST",
        url: "assets/controllers/updateUserProfile.php",
        data: {'new_password': document.querySelector("#staticpassword").value, 'methodID': 3},
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

