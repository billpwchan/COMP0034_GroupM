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
            $token = md5(uniqid(rand(), TRUE));
            $_SESSION['token'] = $token;
            $_SESSION['token_time'] = time();
            ?>
            <form class="login-form validate-form" method="post" action="./assets/controllers/login.php">
                <input type="hidden" name="token" value="<?= $token ?>"/>
                <span class="login-form-title">
						Member Login
					</span>

                <div class="wrap-input validate-input" data-validate="Valid email is required: abc@de.fg">
                    <input class="userInput" type="text" name="email" placeholder="Email">
                    <span class="focus-input"></span>
                    <span class="symbol-input">
							<i class="fas fa-envelope" aria-hidden="true"></i>
                    </span>
                    <span class="alert-validate">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="wrap-input validate-input" data-validate="Password is required">
                    <input class="userInput" type="password" name="pass" placeholder="Password">
                    <span class="focus-input"></span>
                    <span class="symbol-input">
							<i class="fas fa-lock" aria-hidden="true"></i>
                    </span>
                    <span class="alert-validate">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="container-login-form-btn">
                    <button type="submit" class="login-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-11">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-50">
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
            title: 'Login Failed',
            animation: false,
            customClass: 'animated tada',
            text: "Please go to your E-Mail inbox for activating your account.",
            type: 'error'
        });
    </script>
<?php }
unset($_SESSION['login_status']);
?>
</html>