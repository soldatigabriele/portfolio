<?php  
  session_start();
  include('../login/configuration.php');
  include('../include/conf.php');
  if($_SESSION['key']!=$key){ 
    $page = WS_LOGIN;
    $sec = "0";
    header("Refresh: $sec; url=$page");
  }
?>

<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
    	<title>Instagram</title>   

		<?php include('../include/head-script.php');?>
	    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" type="text/css" href="../bootstrap/lightbox-master/dist/ekko-lightbox.css">

	</head>
	<body class="skin-blue sidebar-mini">

		<?php include('../include/header.php');?>
	    <?php include('../include/function.php');?>
	    <?php include('../include/aside-instagram.php');?>
		
		<div class="content-wrapper col-md-12">
	        <section class="content-header">
	           
	            <div class="col-xs-8" style="background:;">
		            <div class="col-xs-2" style="background:;">
		              <img src="../img/insta.png" width="60px">
		            </div>
		           	<div class="col-xs-10" style="background:;">
		                <h1>
		                  Retrieve Instagram Images
		                </h1>
		            </div>
	            </div>
	        </section>

		<?php

		dbConnect();
		mysql_query("CREATE TABLE ig_keys (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, clientid VARCHAR(255),clientsecret VARCHAR(255), redirecturi VARCHAR(255))");



		//run for an infinite amount of time 
		set_time_limit(0);
		ini_set('default_socket_timout',300);
		session_start();

		$ris=mysql_query("SELECT * FROM ig_keys");
		while($row=mysql_fetch_array($ris)){

		/*--------------Instagram API Keys --------------*/
		define("clientID", $row[1]);
		define("clientSecret", $row[2]);
		define("redirectURI", $row[3]);

};

		/*--------------Instagram API Keys --------------
		define("clientID", '');
		define("clientSecret", '');
		define("redirectURI", 'http://www.gabrielesoldati.altervista.org/');
        //Gabriele Soldati EasyRetrieve 2015
*/

		// Connect with Instagram
		function connectToInstagram($url){
			$ch = curl_init();

			//options for the array
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSL_VERIFYHOST => 2

			));
			$result = curl_exec($ch);
			curl_close($ch);

			return $result;
		}

		include ('instagram/functions.php');


		?>
		        <form method="post" data-ajax=false>

		            <div class="col-md-8" style="border-top:3px solid #3c8dbc;background:white;padding:0px 0px 0px 0px row no-gutter">
		                <br>

			                <div class="col-md-7 form-group" style="background:;">   
			                    <label>Insert a Tag, a Username or Coordinates</label>

			                	<div class="col-md-12 form-group" style="background:;">   
			                    	<input type="text" class="form-control" placeholder="Insert a Tag, a Username or Latitude,Longitude" name="value"></input>
			                    </div>
			                	<div class="col-md-4 form-group" style="background:;">   
	              					<input class="btn btn-block btn-primary" name="hashtag" type="submit"  value="Tag">
				                </div>
			                	<div class="col-md-4 form-group" style="background:;">   
	              					<input class="btn btn-block btn-primary" name="user" type="submit" value="User">
				                </div>   
				                <div class="col-md-4 form-group" style="background:;">   
		              				<input class="btn btn-block btn-primary" name="coordinates" type="submit"  value="Coordinates">
			                	</div>   
			                </div>   
		                
		                <div class="col-md-5 form-group"  style="background:;">
			            	<div class="col-md-6 form-group">
			                    <label>Number of images</label>
			                    <select name="count" class="form-control">
			                      <option value="4" selected="selected">4</option>
			                      <option value="8">8</option>
			                      <option value="12">12</option>
			                      <option value="16">16</option>
			                      <option value="20">20</option>
			                      <option value="24">24</option>
			                      <option value="28">28</option>
			                      <option value="32">32</option>
			                    </select>
			                </div>
			             	<div class="col-md-6 form-group">
			                    <label>Image resolution</label>
			                    <select name="resolution" class="form-control">
			                      <option value="thumbnail">160x160px</option>
			                      <option value="low_resolution" selected="selected">320x320px</option>
			                      <option value="standard_resolution">640x640px</option>
			                    </select>
			                </div>
		                </div>

					</div>
				</form>
 		<div class="col-xs-12" style="background:;"><br></div>
		
		<?php include('instagram/login.php');?>
    
    </div>
    <div class="clearfix"></div>
    
    <?php include('../include/footer-script.php') ?>

	<script src="../bootstrap/lightbox-master/lightbox.min.js"></script>

      <script>
      $(document).delegate('*[data-toggle="lightbox"]','click', function(){

      event.preventDefault();
      $(this).ekkoLightbox();

      }); 
      </script>


	 



	</body>
</html>