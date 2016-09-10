<?php
	include("../include/conf.php");
	include("../include/function.php");

	dbConnect();
	
	if(isset($_GET["username"])){
		$username=$_GET["username"];
		$query=("DELETE FROM users WHERE username = '$username'");
		mysql_query($query);
	};

	if(isset($_GET["status"])){
		$username=$_GET["user"];
		$status=$_GET["status"];
		if($status==0){
			mysql_query("UPDATE users SET status = '1' WHERE username='$username'");
		}elseif($status==1){
	        mysql_query("UPDATE users SET status = '0' WHERE username='$username' ");
			mysql_query($query);
		}
	}

	if(isset($_GET["admin"])){
		$admin=$_GET["admin"];
		$username=$_GET["user"];
		if($admin==0){
			mysql_query("UPDATE users SET admin = '1' WHERE username='$username'");
		}elseif($admin==1){
	        mysql_query("UPDATE users SET admin = '0' WHERE username='$username' ");
			mysql_query($query);
		}
	}




	dbClose();
	//redirect
	header('Location: settings.php');
	?>