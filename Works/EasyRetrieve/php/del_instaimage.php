<?php
	include("../include/conf.php");
	include("../include/function.php");

	$image=$_GET["image"];
	$keyword=$_GET["Keyword"];
    $I_ID=$_GET["S_ID"];

	//delete the folder and all it content
	function rmdir_recursive($dir) {
    	unlink($dir);  
		dbConnect();
		$query=("DELETE FROM ig_research WHERE I_ID = '$I_ID' AND idImage = '$image'");
		mysql_query($query);
		dbClose();
	}
	//recall the function
	rmdir_recursive($image);
	//redirect
	$link = WS_INSTAIMG."?S_ID=".$I_ID."&keyword=".$keyword;
	header('Location: '.$link);
	?>