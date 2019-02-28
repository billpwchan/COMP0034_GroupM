<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/contact.php';


if ($_POST['token'] !== $_SESSION['token']) {
    header("Location:../../index.php?status=invalidToken");
}
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $contact = new contact();
        $contact->storeMessage($_POST['name'], $_POST['email'], $_POST['message']);
        header("Location:../../contactUs.php?status=success");
        exit();
    } else {
        header("Location:../../contactUs.php?status=invalidEmail");
        exit();
    }

}