<link rel="stylesheet" href="../css/animate.css" type="text/css">
<script src="../js/sweatalert2.all.min.js"></script>
<?php
include("./dbConnect.php");
$connect = db_connect();
session_start();
/*if(isset($_SESSION["username"]))
{
    header("location:entry.php");
}*/
if (empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["cpass"])
    || empty($_POST["gender"]) || empty($_POST["phone"]) || empty($_POST["fname"])
    || empty($_POST["lname"])) {
    header("Location:../../registration.php?registration=allFieldsRequired");
} elseif ($_POST["pass"] != $_POST["cpass"]) {
    header("Location:../../registration.php?registration=passwordMismatch");
} else {
    $firstName = mysqli_real_escape_string($connect, $_POST["fname"]);
    $lastName = mysqli_real_escape_string($connect, $_POST["lname"]);
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["pass"]);
    $password = md5($password);
    $contactNumber = mysqli_real_escape_string($connect, $_POST["phone"]);
    $registrationDate = date('Y-m-d H:i:s');
    $sql = "INSERT INTO user (first_name, last_name, gender, email, password, contact_number, registration_date) VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$contactNumber', '$registrationDate')";
    $result = db_query($sql);
    if ($result) {
        $_SESSION['Registration_Status'] = $result;
        header("Location:../../login.php?registration=success");
    } else {
        header("Location:../../index.php?registration=failed");
    }
}
?>
<!doctype html>
<html>
<head></head>
<body></body>
</html>

