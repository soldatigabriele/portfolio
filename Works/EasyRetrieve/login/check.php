    <?php  
	session_start();
	include('configuration.php');
    include('../include/conf.php');
	include('../include/function.php');
		dbConnect();
			
			if(isset($_POST["login"])){
			      $username=$_POST["username"];
			      $password=$_POST["password"];
			      $query="SELECT * FROM users WHERE username='$username'";
			      $ris=mysql_query($query);
			      ($riga=mysql_fetch_array($ris));
		      		if($riga["password"]==$password AND $riga["status"]!=0){
		        			$_SESSION['key'] = $key;
		        			if($riga["admin"]==1){
		        				$_SESSION['key2']=1;
		        			};
		        			$url = "index.php";
							header("location: $url");
		      		}elseif($riga["password"]==$password AND $riga["status"]==0){
		        			$message='<div col-xs-8>User has been banned. Please contact an admin.</div>';
		    		}
		    		else
		    			{$message='<div col-xs-8>Wrong password or username</div>';}

			}
			dbClose();
		?>


<html>
	<head>
	    <meta charset="UTF-8">
    	<title>Check</title>   

		<?php include('../include/head-script.php');?>
	    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	</head>

	<body class="skin-blue sidebar-mini" style="background:white;">

		<?php include('../include/header.php');?>
	    <?php include('../include/aside-check.php');?>

		<div class="content-wrapper col-md-12" style="background:white;">
        <section class="content-header" >
         <div class="col-xs-8">
            <div class="col-xs-2">
              <img src="../img/ban.png" width="120px">
            </div>
           
            <div class="col-xs-8" >
              <h1>
		        <? echo $message;?>
              </h1>
            </div>
          </div>
        </section>

		</div>
	</body>
</html>