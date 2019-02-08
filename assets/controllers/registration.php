<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
$connect = db_connect();
session_start();
if (isset($_SESSION["userInfo"])) {
    header("location:../../login.php");
}
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
    $sql = "select * from user WHERE email_address = '{$email}'";
    $result = db_select($sql);
    if (sizeof($result) != 0) {
        header("Location:../../registration.php?registration=duplicateEmail");
    }
    $password = mysqli_real_escape_string($connect, $_POST["pass"]);
    $password = md5($password);
    $contactNumber = mysqli_real_escape_string($connect, $_POST["phone"]);
    $registrationDate = date('Y-m-d H:i:s');

    $avatar = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));

    $uploadDirectory = "../uploads/avatar/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
    $fileName = $_FILES['avatar']['name'];
    $fileSize = $_FILES['avatar']['size'];
    $fileTmpName = $_FILES['avatar']['tmp_name'];
    $fileType = $_FILES['avatar']['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $uploadPath = $uploadDirectory . basename($fileName);

    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 20000000) {
        $errors[] = "This file is more than 20MB. Sorry, it has to be less than or equal to 20MB";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
        } else {
            echo "An error occurred somewhere.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }

    $sql = "INSERT INTO user (first_name, last_name, gender, email_address, password, contact_number, registration_date, avatar) VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$contactNumber', '$registrationDate', '$fileName')";
    $result = db_query($sql);   //$result contains the ID generated
    $accountType = $_POST["accounttype"];
    $autoGenID = mysqli_insert_id($connect);
    if (strtolower($accountType) == "customer") {
        $sql = "INSERT INTO customer (user_ID, account_balance) VALUES ({$autoGenID}, 2000.00)";
        $result = db_query($sql);
    } else if (strtolower($accountType) == "service provider") {
        $companyName = 'UberKidz Company';
        $sql = "INSERT INTO servicesupplier (user_ID, company_name) VALUES ({$autoGenID}, '$companyName')";
        $result = db_query($sql);
    }

    if ($result) {
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

