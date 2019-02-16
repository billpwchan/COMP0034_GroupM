function validate_phonenumber(phone_number) {
    const phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  //does not check for random number like 1234567890
    return phone_number.value.match(phoneno);
}

function validate_name(name) {
    const aNumber = /[0-9]/;
    const aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    if (name.value.trim() === "") {
        showAlert("Blank name");
        return false;
    }
    if (name.value.search(aNumber) !== -1 || name.value.search(aSpecial) !== -1) {
        showAlert("Invalid name");
        return false;
    }
}

function showAlert(message) {
    Swal.fire({
        title: 'Error',
        animation: false,
        customClass: 'animated tada',
        text: message,
        type: 'error'
    });
}

function validate_password(password) {
    const anUpperCase = /[A-Z]/;
    const aLowerCase = /[a-z]/;
    const aNumber = /[0-9]/;
    const aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;

    if (password.value.trim() === "") {
        //showValidate(input[1]);
        showAlert("Blank password");
        return false;
    }
    if (password.value.length < 8 || password.value.length > 15) {
        showAlert("Invalid password length");
        return false;
    }
    if (password.value.search(anUpperCase) === -1 || password.value.search(aLowerCase) === -1 || password.value.search(aNumber) === -1 || password.value.search(aSpecial) == -1) {
        showAlert("Invalid composition");
        return false;
    }
}

function validate_email(email) {
    if ($(email).attr('name') === 'email') {
        if ($(email).val().trim().match(/^([a-zA-Z0-9_\-.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(]?)$/) == null) {
            return false;
        }
    }
}