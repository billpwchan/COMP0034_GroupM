<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="assets/css/registration.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container-fluid rsform-container">
    <form id="rsform" method="post" action="./assets/controllers/registration.php" onsubmit="return validate_Input3()">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Social Profiles</li>
            <li>Personal Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset id="fieldset1">
            <h2 class="fs-title">Create your account</h2>
            <h3 class="fs-subtitle">First step to use UberKidz!</h3>
            <input class="userInput" type="text" name="email" id="email" placeholder="Email"/>
            <input class="userInput" type="password" name="pass" id="password" placeholder="Password"/>
            <input class="userInput" type="cpassword" name="cpass" id="cpassword" placeholder="Confirm Password"/>
            <input type="button" name="next" class="next1 action-button" value="Next"/>
        </fieldset>
        <fieldset id="fieldset2">
            <h2 class="fs-title">Social Profiles</h2>
            <h3 class="fs-subtitle">Your presence in the Social Network</h3>
            <label class="fs-fieldtitle">Gender:</label>
            <div class="custom-control-inline">
               <label class="customradio"><span class="radiotextsty">Male</span>
                   <input type="radio" id="genderM" class="userInput">
                   <span class="checkmark"></span>
                </label>
                <label class="customradio"><span class="radiotextsty">Female</span>
                    <input type="radio" id="genderF" class="userInput">
                    <span class="checkmark"></span>
                </label>
            </div>
            <input class="userInput" type="text" name="phone" placeholder="Phone No."/>
            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="button" name="next" class="next2 action-button" value="Next"/>
        </fieldset>
        <fieldset id="fieldset3">
            <h2 class="fs-title">Personal Details</h2>
            <h3 class="fs-subtitle">Last step already...till your account! </h3>
            <input class="userInput" type="text" name="fname" placeholder="First Name"/>
            <input class="userInput" type="text" name="lname" placeholder="Last Name"/>
            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="submit" id="submit" class="action-button" value="Submit"/>
        </fieldset>
    </form>
</div>
</body>
<?php include("includes/scripts.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="assets/js/registration.js"></script>
<?php
if (isset($_GET['registration']) and $_GET['registration'] === 'allFieldsRequired') { ?>
    <script> Swal.fire({
            title: 'Registration Failed',
            animation: false,
            customClass: 'animated tada',
            text: "All Fields Required",
            type: 'error'
        });
    </script>
<?php } else if (isset($_GET['registration']) and $_GET['registration'] === 'passwordMismatch') { ?>
    <script> Swal.fire({
            title: 'Registration Failed',
            animation: false,
            customClass: 'animated tada',
            text: "Password Mismatch",
            type: 'error'
        });
    </script>
<?php } ?>
</html>