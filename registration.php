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
    <form id="rsform" method="post" action="./assets/controllers/registration.php" enctype="multipart/form-data">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Social Profiles</li>
            <li>Personal Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Create your account</h2>
            <h3 class="fs-subtitle">First step to use UberKidz!</h3>
            <input type="text" name="email" placeholder="Email"/>
            <input type="password" name="pass" placeholder="Password"/>
            <input type="password" name="cpass" placeholder="Confirm Password"/>
            <select class="selectpicker" title="User Type..." name="accounttype">
                <option>Customer</option>
                <option>Service Provider</option>
            </select>

            <input type="button" name="next" class="next action-button" value="Next"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Social Profiles</h2>
            <h3 class="fs-subtitle">Your presence in the Social Network</h3>
            <input type="text" name="phone" placeholder="Phone No."/>
            <select class="selectpicker" title="Gender..." name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Prefer not to say</option>
            </select>
            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="button" name="next" class="next action-button" value="Next"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Personal Details</h2>
            <h3 class="fs-subtitle">Last step already...till your account! </h3>
            <input type="text" name="fname" placeholder="First Name"/>
            <input type="text" name="lname" placeholder="Last Name"/>
            <div class="upload-avatar-container">
                <button class="avatar-btn">Upload Profile Picture</button>
                <input type="file" name="avatar" id="avatar">
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="submit" class="next action-button" id="submit" value="Submit"/>
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
<?php } else if (isset($_GET['registration']) and $_GET['registration'] === 'duplicateEmail') { ?>
    <script> Swal.fire({
            title: 'Registration Failed',
            animation: false,
            customClass: 'animated tada',
            text: "User with the same email already exist! ",
            type: 'error'
        });
    </script>
<?php } ?>
</html>