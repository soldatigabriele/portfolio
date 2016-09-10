<?php

	include("../include/conf.php");
	$id=$_GET["id"];
	$img=$_GET["img"];
    $D_ID=$_GET["D_ID"];
    $D_NAME=$_GET["D_NAME"];

	//delete the folder and all it content
	function rmdir_recursive($dir) {
	  foreach(scandir($dir) as $file) {
	    if ('.' === $file || '..' === $file) continue;
	    if (is_dir($dir.'/'.$file)) rmdir_recursive($dir.'/'.$file);
	    else unlink($dir.'/'.$file);
	  }
	  rmdir($dir);
	}

	//recall the function
	rmdir_recursive("../streetview/".$D_ID."-".$D_NAME."/".$img."/");
	echo "../streetview/".$D_ID."-".$D_NAME."/".$img."/";
	header('Location: '.WS_RES."?D_ID=".$D_ID."&D_NAME=".$D_NAME);




	?>