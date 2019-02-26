<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

$selector = mysqli_real_escape_string($connect, $_POST['selector']);
$time = time();


$sql = "SELECT * FROM passwordreset WHERE selector = '$selector' AND expires >= $time";
$result = db_select($sql);
if (empty($result)) {
    echo "There was an error processing your request. Error Code: 002";
} else {
    $auth_token = $result[0];
    $validator = $_POST['validator'];
    $calc = hash('sha256', hex2bin($validator));
    if (hash_equals($calc, $auth_token['token'])) {
        $email = mysqli_real_escape_string($connect, $auth_token['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET password = '$password' WHERE email_address = '$email'";
        db_query($sql);

        $sql = "DELETE FROM passwordreset WHERE email = '$email'";
        $update = db_query($sql);

        if ($update == true) {
            session_destroy();
            echo "Password Update Successfully! ";
        }
    } else {
        echo "Error Token";
    }
}
