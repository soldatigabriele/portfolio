<?php
//error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);

$dbhost = "localhost";
$user = "root";
$dbpass = "root";

//funzione per la connessione al database
function dbConnect() {
	$db= mysqli_connect('localhost', 'root' , 'root' , 'easyretrieve') or die
	('Impossibile connettersi al database'); //Returns a MySQL link identifier on success or FALSE on failure
	
	return $db;
};

function dbClose() { 
	mysql_close($db);
}


?>