<?php 
	include('../include/function.php');
	include('../include/conf.php');

	dbConnect();
		 
	$D_ID = (int)$_GET['D_ID']; 
	$D_NAME = $_GET['D_NAME']; 
	$id = $_GET['id']; 
	$name = $_GET['name']; 
    
	/*
	echo "D_ID: ".$D_ID;
	echo "<br>";
	echo "D_NAME: ".$D_NAME;
	echo "<br>";
	echo "id: ".$id;
	echo "<br>";
	echo "name: ".$name;
	echo "<br>";
	*/

    //delete the single rows
	mysql_query("DELETE FROM sv_research WHERE id=$id") ;
	header('Location: '.WS_RES.'?D_ID='.$D_ID."&D_NAME=".$D_NAME);
	$url = WS_RES.'?d_id='.$D_ID."&d_name=".$D_NAME;
	//echo $url;
	?>
