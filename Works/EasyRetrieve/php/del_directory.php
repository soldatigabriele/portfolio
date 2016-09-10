<?php 
	include('../include/function.php');
	include('../include/conf.php');

	if(!dbConnect()){echo "connessione non riuscita";};

	$D_ID = (int)$_GET['D_ID']; 
	$D_NAME = $_GET['D_NAME']; 
    
    //delete the row from the tables;
    if(!mysql_query("DELETE FROM sv_directory WHERE D_ID=$D_ID")){echo "eliminazione directory non riuscita";};

	if(!mysql_query("DELETE FROM sv_research WHERE D_ID=$D_ID")){echo "eliminazione search non riuscita";};

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
	rmdir_recursive("../streetview/".$D_ID."-".$D_NAME."/");

	header('Location: '.WS_DIR);

	echo "D_ID: ".$D_ID;
	echo "<br>";
	echo "D_NAME: ".$D_NAME;
	echo "<br>";

?>