<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(rand(), TRUE));
}
