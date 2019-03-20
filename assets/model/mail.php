<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 27/2/2019
 * Time: 2:42
 */
class mail
{
    private $folder;
    private $smtp_server;
    private $username;
    private $password;
    private $port;
    private $encryption;
    private $transport;

    /**
     * mail constructor.
     */
    function __construct()
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php')) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
        }
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
        $this->folder = $config['rootFolderName'];
        $this->smtp_server = $config['smtp_server'];
        $this->username = $config['email_name'];
        $this->password = $config['email_password'];
        $this->port = $config['port'];
        $this->encryption = $config['encryption'];
        $this->transport = (new Swift_SmtpTransport($this->smtp_server, $this->port, $this->encryption))
            ->setUsername($this->username)
            ->setPassword($this->password);
    }

    /**
     * @param $subject
     * @param $to
     * @param $name
     * @param $resetLink
     */
    function passwordReset($subject, $to, $name, $resetLink)
    {

        $message = (new Swift_Message($subject))
            ->setFrom([$this->username => 'UberKidz'])
            ->setTo([$to => $name])
            ->setBody($resetLink, 'text/html');
        $mailer = new Swift_Mailer($this->transport);

        $mailer->send($message);
    }

    /**
     * @param $subject
     * @param $to
     * @param $name
     * @param $email_activation_key
     */
    function emailActivation($subject, $to, $name, $email_activation_key)
    {

        // create account verification link. Need to fixed in the future
        $link = $_SERVER['HTTP_HOST'] . '/activation.php?key=' . $email_activation_key;

        // get the html email content
        $html_content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/lib/email/email_verification.html');
        $html_content = preg_replace('/{link}/', $link, $html_content);

        // get plain email content
        $plain_text = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/lib/email/email_verification.txt');
        $plain_text = preg_replace('/{link}/', $link, $plain_text);

        $message = (new Swift_Message($subject))
            ->setFrom([$this->username => 'UberKidz'])
            ->setTo([$to => $name])
            ->setBody($html_content, 'text/html')// add html content
            ->addPart($plain_text, 'text/plain'); // Add plain text

        $mailer = new Swift_Mailer($this->transport);

        $mailer->send($message);
    }

}