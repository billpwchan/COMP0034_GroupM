<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="assets/css/animate.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<div class="limiter">
    <div class="container-login">
        <div class="wrap-login">
            <div class="login-pic js-tilt" data-tilt>
                <img src="./assets/img/logo.jpg" alt="IMG">
            </div>
            <?php
            /**
             * Copyright (C) UberKidz - All Rights Reserved
             * Unauthorized copying of this file, via any medium is strictly prohibited
             * Proprietary and confidential
             * Written by UberKidz <uberkidz@gmail.com>, 2019
             *
             */
            $token = md5(uniqid(rand(), TRUE));
            $_SESSION['token'] = $token;
            $_SESSION['token_time'] = time();
            require "./assets/controllers/rememberMeCookieAuth.php";
            ?>
            <form class="login-form validate-form" method="post" action="./assets/controllers/login.php">
                <input type="hidden" name="token" value="<?= $token ?>"/>
                <span class="login-form-title">
						Member Login
					</span>
                <div class="wrap-input validate-input">
                    <input class="userInput" type="email" name="email" placeholder="Email" id="Email"
                           value="<?= $isLoggedIn ? $_SESSION['email'] : "" ?>">
                    <span class="focus-input"></span>
                    <span class="symbol-input">
							<i class="fas fa-envelope" aria-hidden="true"></i>
                    </span>
                    <span class="alert-validate" data-validate="Valid email is required: abc@de.fg">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="wrap-input validate-input">
                    <input class="userInput" type="password" name="pass" placeholder="Password" id="Password"
                           value="<?= $isLoggedIn ? "Password123456" : "" ?>">
                    <span class="focus-input"></span>
                    <span class="symbol-input">
							<i class="fas fa-lock" aria-hidden="true"></i>
                    </span>
                    <span class="alert-validate" data-validate="Password is required">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="container-login-form-btn">
                    <button type="submit" class="login-form-btn" id="login-button">
                        Login
                    </button>
                </div>

                <div class="chiller_cb text-center p-t-20">
                    <input type="checkbox" name="remember" id="remember"
                        <?php if (isset($_COOKIE["member_login"])) { ?> checked
                        <?php } ?> />
                    <label for="remember">Remember me</label>
                    <span></span>
                </div>

                <div class="text-center p-t-33">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="passwordReset.php">
                        Username / Password?
                    </a>
                </div>


                <div class="text-center p-t-11">
                    <a class="txt2" href="registration.php">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<?php include("includes/scripts.php"); ?>
<script src="./assets/js/login.js"></script>
<?php
if (isset($_GET['login']) and $_GET['login'] === 'failed') { ?>
    <script> Swal.fire({
            title: 'Login Failed',
            animation: false,
            customClass: 'animated tada',
            text: "Invalid Credential Provided",
            type: 'error'
        });
    </script>
<?php } elseif (isset($_GET['login']) and $_GET['login'] === 'requireActivation') { ?>
    <script> Swal.fire({
            title: 'One More Step...',
            animation: false,
            customClass: 'animated tada',
            text: "Please go to your E-Mail inbox for activating your account.",
            type: 'success'
        });
    </script>
<?php } ?>
</html>