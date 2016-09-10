<?php
	include("../include/conf.php");
	$image=$_GET["image"];
	$img=$_GET["img"];
    $D_ID=$_GET["D_ID"];
    $D_NAME=$_GET["D_NAME"];

	$link = WS_IMAGES."?D_ID=".$D_ID."&D_NAME=".$D_NAME."&img=".$img;

	//delete the image
	function rmdir_recursive($dir) {
	   unlink($dir);  
	}
	//recall the function
	rmdir_recursive($image);
	header('Location: '.$link);
	?>