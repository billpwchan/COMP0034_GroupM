<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 8/2/2019
 * Time: 21:26
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}

class emailValidation
{
    protected $connect;

    function __construct()
    {
        $this->connect = db_connect();
    }

    /**
     * register new user
     *
     * @param $firstName
     * @param $lastName
     * @param $gender
     * @param $email
     * @param $password
     * @param $contactNumber
     * @param $avatar
     * @param $accountType
     * @return bool
     */
    public function Register($firstName, $lastName, $gender, $email, $password, $contactNumber, $avatar, $accountType)
    {
        $firstName = mysqli_real_escape_string($this->connect, $firstName);
        $lastName = mysqli_real_escape_string($this->connect, $lastName);
        $gender = mysqli_real_escape_string($this->connect, $gender);
        $email = mysqli_real_escape_string($this->connect, $email);
        $sql = "select * from user WHERE email_address = '{$email}'";
        $result = db_select($sql);
        if (sizeof($result) != 0) {
            header("Location:../../registration.php?registration=duplicateEmail");
        }
        $password = mysqli_real_escape_string($this->connect, $password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $contactNumber = mysqli_real_escape_string($this->connect, $contactNumber);
        $registrationDate = date('Y-m-d H:i:s');
        $email_activation_key = md5($email . $firstName . $lastName);
        $uploadDirectory = "../uploads/avatar/";
        $errors = []; // Store all foreseen and unforseen errors here
        $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
        $fileName = $avatar['name'];
        $fileSize = $avatar['size'];
        $fileTmpName = $avatar['tmp_name'];
        $fileExtension = strtolower(end(explode('.', $fileName)));

        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $uploadPath = $uploadDirectory . basename($newfilename);

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

        $sql = "INSERT INTO user (first_name, last_name, gender, email_address, password, contact_number, registration_date, avatar, status, email_activation_key) VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$contactNumber', '$registrationDate', '$fileName', 0, '$email_activation_key')";
        $result = db_query($sql);   //$result contains the ID generated
        $autoGenID = mysqli_insert_id($this->connect);
        if (strtolower($accountType) == "customer") {
            $sql = "INSERT INTO customer (user_ID, account_balance) VALUES ({$autoGenID}, 2000.00)";
            $result = db_query($sql);
        } else if (strtolower($accountType) == "service provider") {
            $companyName = 'UberKidz Company';
            $sql = "INSERT INTO servicesupplier (user_ID, company_name) VALUES ({$autoGenID}, '$companyName')";
            $result = db_query($sql);
        }

        // send email
        $this->sendEmail('Verify Your Email Address', $email, $firstName, $email_activation_key);

        return $result;
    }

    /**
     * send activation email with swiftmailer
     *
     * @param $subject
     * @param $to
     * @param $name
     * @param $email_activation_key
     */
    public function sendEmail($subject, $to, $name, $email_activation_key)
    {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
        $folder = $config['rootFolderName'];
        $smtp_server = $config['smtp_server'];
        $username = $config['email_name'];
        $password = $config['email_password'];
        $port = $config['port'];
        $encryption = $config['encryption'];

        // create account verification link. Need to fixed in the future
        $link = $_SERVER['HTTP_HOST'] . '/' . $folder . '/activation.php?key=' . $email_activation_key;

        // get the html email content
        $html_content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/lib/email/email_verification.html');
        $html_content = preg_replace('/{link}/', $link, $html_content);

        // get plain email content
        $plain_text = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/lib/email/email_verification.txt');
        $plain_text = preg_replace('/{link}/', $link, $plain_text);

        $message = (new Swift_Message($subject))
            ->setFrom([$username => 'UberKidz'])
            ->setTo([$to => $name])
            ->setBody($html_content, 'text/html')// add html content
            ->addPart($plain_text, 'text/plain'); // Add plain text

        $transport = (new Swift_SmtpTransport($smtp_server, $port, $encryption))
            ->setUsername($username)
            ->setPassword($password);

        $mailer = new Swift_Mailer($transport);

        $mailer->send($message);
    }


    /**
     * activate account
     *
     * @param $key
     * @return bool
     */
    public function activateAccount($key)
    {
        $key = mysqli_real_escape_string($this->connect, $key);
        $sql = "UPDATE `user` SET status = 1, email_activation_key = '' WHERE email_activation_key = '$key'";
        if (!db_query($sql)) {
            return false;
        }
        return true;
    }
}

?>