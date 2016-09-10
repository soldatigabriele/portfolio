<?php
require_once('inc/init.php');

if (!$user->isLoggedIn()) {
    $user = new User('Gabriele');
    $user->login();
//    Redirect::to('index.php');
}
if ($user->isLoggedIn()) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- <meta name="author" content="ScappinDebora&SoldatiGabriele">-->

    <title>ImageVault</title>

    <!-- Normalize CSS -->
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!--    <link href="css/technology4u-homepage.css" rel="stylesheet">-->
    <script src="js/bootstrap.js"></script>
    <!-- fileinput plugin-->
    <!--    <link src="css/bootstrap3.3.4.css" rel="stylesheet">-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="path/to/themes/fa/theme.js"></script>

    <link href="inc/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="inc/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>

    <!--    lightbox gallery-->
    <link rel="stylesheet" type="text/css" href="../../include/lightbox/dist/css/lightbox.min.css">

</head>
<br>


<div class="col-md-12">

    Ecommerce website with an advanced login system with secure password and user details storage, including credit
    cards and ID/Passport scans
    <ul style="">
        <li>Login and registering with eMail verification</li>
        <li>Remember me feature</li>
        <li>High secure password storage using salt and SHA256 algorithm</li>
        <li>2 steps login with Time Code</li>
        <li>Brute Force Attacks protection using Captcha after failed 3 login attempts</li>
        <li>Secure images storage with name and content encryption</li>
        <li>Change password functionality</li>
    </ul>
</div>


<div style="width:450px;margin:auto;">


<div class="col-md-12" style="border:1px solid #acacac;">
    <div class="clearfix"><br></div>
    <div class="">
        <img src="../../img/tech4u.jpg" alt="" style="width:100%">
    </div>
    <div class="clearfix"><br></div>
    <div class="col-md-12">
        <div class="col-md-12">
            <form action="index.php" method="POST">
                <input type="submit"
                       class="btn btn-block btn-outline-primary"
                       name="website" value="Go to the website">
            </form>
            <div class="clearfix"><br></div>
        </div>
    </div>
</div>

<div class="col-md-12 clearfix"><br></div>
<div class="col-md-8 offset-md-2">
    <form action="../../index.php" method="POST"><input type="submit"
                                                        class="showImage btn btn-block btn-outline-gray"
                                                        name="" value="Back to the Portfolio"></form>
</div>

</div>
<?php } ?>
</body>
</html>