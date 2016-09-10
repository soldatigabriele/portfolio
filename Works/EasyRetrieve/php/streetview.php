<?php   
	include('../include/conf.php');
	include('../include/function.php');
	//generate error if name or coordinates are missing
	if (isset($_POST["submit"])){

		if($_POST["name"] == ''){
			$error_message = urlencode("Please, insert a name");
			header('Location: '.WS_INDEX.'?error_message='.$error_message);
			die;
		}
		if($_POST["coordinates"] == ''){
			$error_message = urlencode("Please, insert a coordinates");
			header('Location: '.WS_INDEX.'?error_message2='.$error_message);
			die;
		}
	};

	if (isset($_POST["submit"])){
		$DIR = $_POST["dir"];
		$DIRECTORY = explode("-", $DIR);
		$D_ID=$DIRECTORY[0];
		$D_NAME=$DIRECTORY[1];
		$heading=$_POST["head"];
		$pitch=$_POST["pitch"];
		$fov=$_POST["fov"];
		$height=$_POST["dim"];
		$name=$_POST["name"];
		$num=$_POST["num"];
		$coordinates=$_POST["coordinates"];
		//separate lat & long
		$coordinates = str_replace(' ', '', $coordinates);
		$coord_array = explode(",", $coordinates);
		$coo1 = $coord_array[0];  //lat
		$coo2 = $coord_array[1];  //long
		$latitude=$coord_array[0];
		$longitude=$coord_array[1];
		$coo=$latitude.",".$longitude;
		

		dbConnect();

		//create the table
		mysql_query("CREATE TABLE sv_research (I_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Date CHAR(30),
		 name CHAR(30), D_ID CHAR(5), Latitude CHAR(30), Longitude CHAR(30), Heading CHAR(30), Pitch CHAR(30),
		 Fov CHAR(30),Height CHAR(30),Width CHAR(30), Photos CHAR(30))");
		if(!mysql_query("INSERT INTO sv_research (Date,name,D_ID,Latitude,Longitude,Heading,Pitch,Fov,Height,Width,Photos) VALUES(CURDATE(),'$name','$D_ID','$latitude','$longitude','$heading','$pitch','$fov','$height','$height','$num')")) 
		die("ERROR");
		};


		$y=1;
		$v=360/$num;

		//Find the folder "id-***" and create the subdirectories
		$Folder = opendir("../streetview/") or die('Error');  
		while($Entry = @readdir($Folder)) {  
			   	$folder_id = explode("-", $Entry);
				if ($D_ID == $folder_id[0]){
				$dir = "../streetview/".$Entry."/".$latitude."_".$longitude."/";
				if (!mkdir($dir)){
					echo "errore creazione directory";
				}else{
					echo "directory creata! ";
				};
            }
	 	}
 	 	closedir($Folder);

 	 	//copia il file test.jpg in ogni nuova cartella creata
 	 	$test2 = $dir."/test.jpg";
 	 	$test = '../img/test.jpg';
 	 	if (!copy($test, $test2)){/*echo 'copia non riuscita'*/ ;}
 	 	else
 	 		{echo "copia riuscita";}
 	 	;

	for($i=$heading;$i<$heading+360;$i+=$v){

		//Get the file
		$imageUrlComposer = "https://maps.googleapis.com/maps/api/streetview?size=".$height."x".$height."&location=".$coo."&fov=".$fov."&heading=".$i."&pitch=".$pitch."&key=AIzaSyCu2NZCXZwTsNq_v5ofdJRZNJmprhXuces";
		$imageUrl = file_get_contents($imageUrlComposer);

		//Store in the filesystem
		$fp = fopen($dir."/".$y."-".$i.".jpg", "w");
		fwrite($fp, $imageUrl);
		fclose($fp);
		$y++;
		}
		
	mysql_close($db);
 	//header('Location: '.WS_INDEX);
    //Gabriele Soldati EasyRetrieve 2015	
	$link = WS_IMAGES.'?D_ID='.$D_ID.'&D_NAME='.$D_NAME.'&name='.$name.'&img='.$latitude.'_'.$longitude;
	header('Location: '.$link);
 	
 ?>












