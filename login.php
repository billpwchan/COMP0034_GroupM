<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<div class="limiter">
    <div class="container-login">
        <div class="wrap-login">
            <div class="login-pic js-tilt" data-tilt>
                <img src="./assets/img/logo.jpg" alt="IMG">
            </div>

            <form class="login-form validate-form" method="post" action="./assets/controllers/login.php">
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
                    <button class="login-form-btn">
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
</html>