<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>EasyRetrieve</title>
    <?php include('../include/head-script.php') ?>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body class="skin-blue sidebar-mini">

<?php include('../include/header.php');
include('../include/function.php');
include('../include/aside-home.php');
include('configuration.php');

$instaindex = WS_PHP . "instaindex.php";
$streetindex = WS_PHP . "streetindex.php";
session_start();
$key = '78adw1n761nadw8m29ec40nxe';
$_SESSION['key'] = $key;
$_SESSION['key2'] = 1;
?>
<div class="wrapper">
    <div class="content-wrapper col-md-12" style="background:;">
        <div class="col-md-10" style="background:;">

            <!-- Main content -->
            <?php if ($_SESSION['key'] != $key) {
                echo '
          <div class="col-md-4" style="background:;">
            <section class="content-header">
              <h1>
                Registration
              </h1>
            </section>
            <form method="post" action="register.php"  data-ajax=false>                
              <div class="col-md-12" style="border-top:3px solid #3c8dbc;background:white;padding:20px 0 20px 0;">
  	              <div class="col-md-12 form-group';
                if (isset($_GET['error_message']) OR ($_GET['error_message4'])) {
                    echo " has-error";
                };
                echo '" style="background:;">
                    <label>Username: </label>
                    <input type="text" class="form-control" name="username" placeholder="';
                if (isset($_GET['error_message4'])) {
                    echo 'Username is not available';
                } else {
                    echo 'Username';
                }
                echo ' " id="';
                if (isset($_GET['error_message'])) {
                    echo "inputError";
                } else {
                    echo " ";
                };
                echo '">
                  </div>
                  
                  <div class="col-md-12 form-group';
                if (isset($_GET['error_message2'])) {
                    echo " has-error";
                };
                echo '">   
                    <label>Password:</label>
                    <input type="password" maxlength="10" class="form-control" placeholder="Password" name="password" id="';
                if (isset($_GET['error_message2'])) {
                    echo "inputError";
                } else {
                    echo " ";
                };
                echo '">
                  </div>  
                  <div class="col-md-12 form-group';
                if (isset($_GET['error_message3'])) {
                    echo " has-error";
                };
                echo '">   
                    <label>eMail:</label>
                    <input type="text" class="form-control" placeholder="something@example.com" name="email" id="';
                if (isset($_GET['error_message3'])) {
                    echo "inputError";
                } else {
                    echo " ";
                };
                echo '">
                  </div>   
                <br>                
                <div class="col-md-5">
                <input class="btn btn-block btn-primary" name="register" type="submit" data-inline="true" value="Register">
                </div>
              </div>
  	        </form>
          </div>
          <div class="col-md-4"  style="background:;">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Login
            </h1>
          </section>
          <!-- Main content -->
          
            <form method="post" action="check.php"  data-ajax=false>                
              <div class="col-md-12" style="border-top:3px solid #3c8dbc;background:white;padding:20px 0 20px 0;">
                    <div class="col-md-12 form-group">
                      <label>Username: </label>
                      <input type="text" class="form-control" placeholder="Username" name="username" id="inputError">
                    </div>
                    
                    <div class="col-md-12 form-group">
                    <label>Password:</label>
                    <input type="password" maxlength="18" class="form-control" placeholder="Password" name="password">
                  </div>   
                <br>                
                <div class="col-md-4">
                <input class="btn btn-block btn-primary" name="login" type="submit" data-inline="true" value="Login">
                </div>
              </div>

          </form>
          </div>
        ';
            } else {
                echo '
            
          <div class="col-md-10">
            <p></p>
          </div>

              <div class="col-md-7" style="border-top:3px solid #3c8dbc;background:white;padding:20px 0 20px 0;">
              
                <div class="col-md-12">
                  Welcome, you are logged in! <br> First of all you have to choose if you want to download images from Google Streetview or search and download pictures from Instagram. <br> Please select one of the following options:  <!--<br> Key= "' . $_SESSION["key"] . '-->
                </div>
              
              </div>

          
          </div> 
            
          <div class="col-md-10">
            <br><br>
          </div>

            <div class="col-xs-6" style="background:;">

		        <div class="col-md-6" style="background:;">
                <a href="' . $streetindex . '" >
                  <div class="col-md-6">
  		              <img src="../img/gmaps.png" width="270px">
  		            </div>
                </a>

		            <div class="col-md-10">
		              <p></p>
		            </div>

		            <div class="col-md-6">
		              <a href="' . $streetindex . '" >
		              <div class="btn btn-block btn-primary" id="img_btn"  onclick="location.href="' . $streetindex . '"" value="Streetview">
		                <span>Streetview</span>
		              </div>
		              </a>
	            </div>
            
            </div>

            <div class="col-md-6" >
              <a href="' . $instaindex . '" >  	  
                <div class="col-md-6">
  	                <img src="../img/insta.png" width="270px">
  	            </div>
              </a>	              
	            <div class="col-md-10">
	                <p></p>
	            </div>
	             
	            <div class="col-md-6">
	                <a href="' . $instaindex . '" >
	                <div class="btn btn-block btn-primary" id="img_btn" onclick="location.href="' . $instaindex . '""  data-inline="true" value="Instagram">
	                  <span>Instagram</span>
	                </div>
	                </a>
	            </div>
         	</div>

          ';
            }; ?>

        </div>
    </div>

    <?php include('../include/footer-script.php') ?>

</body>
</html>