<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/lib/emailValidation.php';

if (!empty($_GET['key']) && isset($_GET['key'])) {
    $key = $_GET['key'];

    $activation = new emailValidation();
    if ($activation->activateAccount($key)) {
        echo 'Your account is activated, please <a href="login.php">click here</a> to to login';
    } else {
        echo "Invalid Activation Key!";
    }
    
} else {
    echo "Null activation key!";
}

?>