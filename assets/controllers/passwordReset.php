<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/mail.php';
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}
$auth = new auth();
$mail = new mail();

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
$folder = $config['rootFolderName'];

$url = sprintf('%sreset.php?%s', $_SERVER['HTTP_HOST'] . '/', http_build_query([
    'selector' => $selector,
    'validator' => bin2hex($token)
]));

$token = hash('sha256', $token);

// Token expiration
$expires = new DateTime('NOW');
$expires->add(new DateInterval('PT01H')); // 1 hour
$expires = $expires->format('U');

$email = $_POST['email'];
$auth->clearResetLink($email);
$auth->insertResetLink($email, $selector, $token, $expires);
$name = $auth->selectNameByEmail($email)[0]['first_name'];

// Subject
$subject = 'Your UberKidz Password Reset Link';

// Message
$message = '<p>We recieved a password reset request. The link to reset your password is below. ';
$message .= 'If you did not make this request, you can ignore this email</p>';
$message .= '<p>Here is your password reset link:</br>';
$message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
$message .= '<p>Thanks!</p>';

$mail->passwordReset($subject, $email, $name, $message, $url);

header("location:../../passwordReset.php?status=requireVerification");
exit();