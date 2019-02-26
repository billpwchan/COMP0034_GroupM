<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}
$connect = db_connect();

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
$folder = $config['rootFolderName'];

$url = sprintf('%sreset.php?%s', $_SERVER['HTTP_HOST'] . '/' . $folder . '/', http_build_query([
    'selector' => $selector,
    'validator' => bin2hex($token)
]));

$token = hash('sha256', $token);

// Token expiration
$expires = new DateTime('NOW');
$expires->add(new DateInterval('PT01H')); // 1 hour
$expires = $expires->format('U');

$email = mysqli_real_escape_string($connect, $_POST['email']);
// Delete any existing tokens for this user
$sql = "DELETE FROM passwordreset WHERE email = '$email'";
$result = db_query($sql);

$sql = "INSERT INTO passwordreset (email, selector, token, expires) 
VALUES ('$email', '$selector', '$token', '$expires')";
$result = db_query($sql);

$sql = "SELECT first_name
FROM user, passwordreset
WHERE user.email_address = passwordreset.email
AND passwordreset.email = '$email'";
$name = db_select($sql)[0]['first_name'];

// Subject
$subject = 'Your UberKidz Password Reset Link';

// Message
$message = '<p>We recieved a password reset request. The link to reset your password is below. ';
$message .= 'If you did not make this request, you can ignore this email</p>';
$message .= '<p>Here is your password reset link:</br>';
$message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
$message .= '<p>Thanks!</p>';


$smtp_server = $config['smtp_server'];
$username = $config['email_name'];
$password = $config['email_password'];
$port = $config['port'];
$encryption = $config['encryption'];

// Send email
$message = (new Swift_Message($subject))
    ->setFrom([$username => 'UberKidz'])
    ->setTo([$email => $name])
    ->setBody($message, 'text/html');

$transport = (new Swift_SmtpTransport($smtp_server, $port, $encryption))
    ->setUsername($username)
    ->setPassword($password);

$mailer = new Swift_Mailer($transport);

$mailer->send($message);

header("location:../../passwordReset.php?status=requireVerification");
exit();