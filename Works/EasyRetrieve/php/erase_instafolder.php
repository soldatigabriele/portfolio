<?php

	include("../include/conf.php");
	include("../include/function.php");
	
	$S_ID = (int)$_GET['S_ID']; 
	$keyword = $_GET['keyword']; 
    
    dbConnect();
    //delete the row from the tables;
    if(!mysql_query("DELETE FROM ig_directory WHERE S_ID='$S_ID'")){echo "eliminazione directory non riuscita";};

	if(!mysql_query("DELETE FROM ig_research WHERE I_ID='$S_ID'")){echo "eliminazione search non riuscita";};

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
	rmdir_recursive("../instagram/".$S_ID."-".$keyword."/");

	header('Location: '.WS_INSTARES);




	?>