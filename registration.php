<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <!--    <link rel="stylesheet" href="assets/css/mdb.min.css" type="text/css">-->
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="assets/css/registration.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container-fluid rsform-container">
    <?php
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    $_SESSION['token_time'] = time();
    ?>
    <form id="rsform" method="post" action="./assets/controllers/registration.php" onsubmit="return validate_Input3()"
          enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?= $token ?>"/>
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
            <input class="userInput" type="password" name="pass" placeholder="Password"/>
            <input class="userInput" type="password" name="cpass" placeholder="Confirm Password"/>
            <select class="selectpicker userInput" title="User Type..." name="accounttype">
                <option>Customer</option>
                <option>Service Provider</option>
            </select>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input userInput" id="defaultChecked" required checked
                       name="terms">
                <label class="custom-control-label" for="defaultChecked" data-toggle="modal"
                       data-target="#exampleModalLong" style="font-size: 14px;">I accept the Terms and
                    Conditions</label>
            </div>
            <input type="button" name="next" class="next1 action-button" value="Next"/>
        </fieldset>
        <fieldset id="fieldset2">
            <h2 class="fs-title">Social Profiles</h2>
            <h3 class="fs-subtitle">Your presence in the Social Network</h3>

            <label class="fs-fieldtitle">Gender:</label>
            <div class="custom-control-inline">
                <label class="customradio"><span class="radiotextsty">Male</span>
                    <input type="radio" id="genderM" class="userInput" name="gender" value="Male">
                    <span class="checkmark"></span>
                </label>
                <label class="customradio"><span class="radiotextsty">Female</span>
                    <input type="radio" id="genderF" class="userInput" name="gender" value="Female">
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
            <div class="upload-avatar-container">
                <button class="avatar-btn">Upload Profile Picture</button>
                <input type="file" name="avatar" id="avatar">
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="submit" id="submitRegistration" class="action-button" value="Submit"/>
        </fieldset>
    </form>
</div>
</body>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <h1>Terms and Conditions </h1>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="wrap">
                    <div class="page-agreement">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <p>Last updated: February 13, 2019</p>
                                        <p>Please read these Terms and Conditions carefully before using the
                                            www.uberkidz.com website operated by Uberkidz.</p>
                                        <p>Your access to and use of the Service is conditioned on your acceptance of
                                            and compliance with these Terms. These Terms apply to all visitors, users
                                            and others who access or use the Service.</p>
                                        <p>By accessing or using the Service you agree to be bound by these Terms. If
                                            you disagree with any part of the terms then you may not access the Service.
                                            The Terms and Conditions agreement for Uberkidz has been created with the
                                            help of <a href="https://termsfeed.com/">TermsFeed</a>.</p>
                                        <h2>Accounts</h2>
                                        <p>When you create an account with us, you must provide us information that is
                                            accurate, complete, and current at all times. Failure to do so constitutes a
                                            breach of the Terms, which may result in immediate termination of your
                                            account on our Service.</p>
                                        <p>You are responsible for safeguarding the password that you use to access the
                                            Service and for any activities or actions under your password, whether your
                                            password is with our Service or a third-party service.</p>
                                        <p>You agree not to disclose your password to any third party. You must notify
                                            us immediately upon becoming aware of any breach of security or unauthorized
                                            use of your account.</p>
                                        <h2>Links To Other Web Sites</h2>
                                        <p>Our Service may contain links to third-party web sites or services that are
                                            not owned or controlled by Uberkidz.</p>
                                        <p>Uberkidz has no control over, and assumes no responsibility for, the content,
                                            privacy policies, or practices of any third party web sites or services. You
                                            further acknowledge and agree that Uberkidz shall not be responsible or
                                            liable, directly or indirectly, for any damage or loss caused or alleged to
                                            be caused by or in connection with use of or reliance on any such content,
                                            goods or services available on or through any such web sites or
                                            services.</p>
                                        <p>We strongly advise you to read the terms and conditions and privacy policies
                                            of any third-party web sites or services that you visit.</p>
                                        <h2>Termination</h2>
                                        <p>We may terminate or suspend access to our Service immediately, without prior
                                            notice or liability, for any reason whatsoever, including without limitation
                                            if you breach the Terms.</p>
                                        <p>All provisions of the Terms which by their nature should survive termination
                                            shall survive termination, including, without limitation, ownership
                                            provisions, warranty disclaimers, indemnity and limitations of
                                            liability.</p>
                                        <p>We may terminate or suspend your account immediately, without prior notice or
                                            liability, for any reason whatsoever, including without limitation if you
                                            breach the Terms.</p>
                                        <p>Upon termination, your right to use the Service will immediately cease. If
                                            you wish to terminate your account, you may simply discontinue using the
                                            Service.</p>
                                        <p>All provisions of the Terms which by their nature should survive termination
                                            shall survive termination, including, without limitation, ownership
                                            provisions, warranty disclaimers, indemnity and limitations of
                                            liability.</p>
                                        <h2>Governing Law</h2>
                                        <p>These Terms shall be governed and construed in accordance with the laws of
                                            United Kingdom, without regard to its conflict of law provisions.</p>
                                        <p>Our failure to enforce any right or provision of these Terms will not be
                                            considered a waiver of those rights. If any provision of these Terms is held
                                            to be invalid or unenforceable by a court, the remaining provisions of these
                                            Terms will remain in effect. These Terms constitute the entire agreement
                                            between us regarding our Service, and supersede and replace any prior
                                            agreements we might have between us regarding the Service.</p>
                                        <h2>Changes</h2>
                                        <p>We reserve the right, at our sole discretion, to modify or replace these
                                            Terms at any time. If a revision is material we will try to provide at least
                                            30 days notice prior to any new terms taking effect. What constitutes a
                                            material change will be determined at our sole discretion.</p>
                                        <p>By continuing to access or use our Service after those revisions become
                                            effective, you agree to be bound by the revised terms. If you do not agree
                                            to the new terms, please stop using the Service.</p>
                                        <h2>Contact Us</h2>
                                        <p>If you have any questions about these Terms, please contact us.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    Terms and Conditions of www.uberkidz.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>

<?php include("includes/scripts.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!--<script src="assets/js/mdb.min.js"></script>-->
<script src="assets/js/accountValidationUtil.js"></script>
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
<?php } else if (isset($_GET['registration']) and $_GET['registration'] === 'success') { ?>
    <script> Swal.fire({
            title: 'Registration Successful',
            animation: false,
            customClass: 'animated tada',
            text: "Please go to your E-Mail inbox for activating your account.",
            type: 'success'
        });
    </script>
<?php } ?>
</html>
