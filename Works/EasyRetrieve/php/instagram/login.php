<?php	
			
	if (isset($_POST["hashtag"])){

		$tag=$_POST["value"];
		$count = $_POST["count"];
		$res = $_POST["resolution"];
		$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.clientID.'&count='.$count;
		visualizzaImmaginiTag($tag,$count,$res,$url);
	}

	if (isset($_POST["user"])){
		
		$userName=$_POST["value"];
		$count = $_POST["count"];
		$res = $_POST["resolution"];

		visualizzaImmaginiUser($userName,$count,$res);
	}

	if (isset($_POST["coordinates"])){
		$res = $_POST["resolution"];
		$count = $_POST["count"];

		$coordinates=$_POST["value"];
		$coordinates = str_replace(' ', '', $coordinates);
		$coord_array = explode(",", $coordinates);
		$lat = $coord_array[0];  //lat
		$lng = $coord_array[1];  //long
		$url = 'https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lng.'&client_id='.clientID.'&count='.$count;

	visualizzaImmaginiMap($lat,$lng,$count,$res,$url);
	}

	if (isset($_POST["nextpage"])){
		
		$url = $_POST["nexturl"];
		$tag = $_POST["tag"];
		$count = $_POST["count"];
		$res = $_POST["resolution"];
		
		visualizzaImmaginiTag($tag,$count,$res,$url);
		
	}
?>