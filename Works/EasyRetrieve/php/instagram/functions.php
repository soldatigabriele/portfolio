<?php

dbConnect();

//Get Instsagram userID
function getUserID($userName){
	$url = 'https://api.instagram.com/v1/users/search?q='.$userName.'&client_id='.clientID;
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	return $results['data'][0]['id'];
}

//Save the picture
function savePicture($data,$idimage,$dir){
	$filename = $idimage.".jpg";
	$destination = $dir.$filename;
	$image = file_get_contents($data);
	file_put_contents($destination, $image);
}

function visualizzaImmaginiTag($tag,$count,$res,$url){

	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	echo '<div class="col-md-10 border" >
          	<p class="title">INSTAGRAM IMAGES for TAG: '.$tag.'</p><br>';

			$query="SELECT DISTINCT I_ID from ig_research ORDER BY I_ID DESC";
			$ris=mysql_query($query);
			$riga=mysql_fetch_array($ris);
			for($i=0;$i<1;$i++){
				$I_ID = $riga["I_ID"];
				$I_ID++;
			}	
			
			//crea cartella in cui salvare le immagini
    		$keyword = $tag;
    		$kind = "Tag";
			$dir = '../instagram/'.$I_ID."-".$keyword.'/';
			mkdir($dir);

			mysql_query("CREATE TABLE ig_directory (S_ID INT(6), Date CHAR(30), Keyword CHAR(30), Kind CHAR(10))");
			mysql_query("INSERT INTO ig_directory (S_ID,Date,Keyword,Kind) VALUES ('$I_ID',CURDATE(),'$keyword','$kind')");

			$nexturl = $results['pagination']['next_url'];
	    	$max_id = $results['pagination']['next_max_id'];


			foreach($results['data'] as $items){
				
				$tags = $items['tags'];
	    		$num = count($tags);
		    	$user = $items['user']['username'];
		    	
		    	$name = $items['user']['full_name'];
		    	$description = $items['caption']['text'];
		    	$likescount = $items['likes']['count'];
		    	$commentscount = $items['comments']['count'];
		    	$filter = $items['filter'];
		    	$idimage = $items['id'];
		    	$url = $items['link'];
		    	$urljson = "URL JSON";

				$data = $items['images'][$res]['url'];
		    	//echo '<img src="'.$data.'">';
		    	//echo $data."<br>";

				echo '
						<div class="row col-xs-3" style="padding-left:5%;padding-left:5%">
				    		<a href="'.$data.'" style="max-width:640px; height:auto; " data-toggle="lightbox" class=" thumbnail" data-gallery="multiimages" data-title="'.$image.'">
			                	<img src="'.$data.'" class="img-responsive" >
			            	</a>';


		    	//tags è un array contenente tutti i tag relativi alla foto
				echo "name: ".$user."<br>";
				echo "likes: ".$likescount."<br>";
				echo "comments: ".$commentscount."<br><br><hr></div>";
		    	
				mysql_query("CREATE TABLE ig_research (I_ID INT(6), Date CHAR(30), User CHAR(30), Name CHAR(30), LikesCount CHAR(30), CommentsCount CHAR(30), Filter CHAR(30), idImage CHAR(30), Url CHAR(30),LinkJson CHAR(30), Keyword CHAR(30), Kind CHAR(10))");

				// elimina duplicati tabella
				mysql_query("ALTER IGNORE TABLE ig_research ADD UNIQUE INDEX id_unq (User, Name, Url)");		

				//mysql_query("CREATE TABLE Instagram (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,User CHAR(30), Name CHAR(30), LikesCount INT(10), CommentsCount INT(10), Filter CHAR(30), idImage CHAR(30), Url CHAR(30), LinkJson CHAR(30), Keyword CHAR(30))");
				mysql_query("INSERT INTO ig_research (I_ID,Date,User,Name,LikesCount,CommentsCount,Filter,idImage,Url,LinkJson,Keyword,Kind) VALUES ('$I_ID',CURDATE(),'$user','$name','$likescount','$commentscount','$filter','$idimage','$url','$urljson','$keyword','$kind')");

				savePicture($data,$idimage,$dir);
					
			}	

			echo '</div>';

			echo '
				<div class="col-xs-12"><br>
					<form action="" method="post">
					<div class="col-xs-12">
						<input type="text" hidden="true" name="nexturl" value="'.$nexturl.'"></input>
						<input type="text" hidden="true" name="count" value="'.$count.'"></input>
						<input type="text" hidden="true" name="tag" value="'.$tag.'"></input>
						<input type="text" hidden="true" name="resolution" value="'.$res.'"></input>
					</div>	
					<div class="col-md-3 form-group" style="background:;">   
              				<input class="btn btn-block btn-primary" onclick="hide()" name="nextpage" type="submit"  value="Next Page">
	                	</div>
					</form>
            	</div>
			';				
  	}


function visualizzaImmaginiMap($lat,$lng,$count,$res,$url){

	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	$query="SELECT DISTINCT I_ID from ig_research ORDER BY I_ID DESC";
	$ris=mysql_query($query);
	$riga=mysql_fetch_array($ris);
	for($i=0;$i<1;$i++){
		$I_ID = $riga["I_ID"];
		$I_ID++;
	}	

	//crea cartella in cui salvare le immagini
	$keyword = $lat."-".$lng;
	$kind ="Coordinates";
	$dir = '../instagram/'.$I_ID."-".$keyword.'/';
	mkdir($dir);
	
	mysql_query("CREATE TABLE ig_directory (S_ID INT(6), Date CHAR(30), Keyword CHAR(30), Kind CHAR(10))");
	mysql_query("INSERT INTO ig_directory (S_ID,Date,Keyword,Kind) VALUES ('$I_ID',CURDATE(),'$keyword','$kind')");

	echo '<div class="col-md-10">
			<div class="col-md-12 border">
              <p class="title">INSTAGRAM IMAGES for TAG: </p><br>';
	
    //stampa array json
    //echo '<pre>' . print_r($results, true) . '</pre>';
	
	foreach($results['data'] as $items){
		
		$tags = $items['tags'];
		$num = count($tags);
    	$user = $items['user']['username'];
    	$name = $items['user']['full_name'];
    	$description = $items['caption']['text'];
    	$likescount = $items['likes']['count'];
    	$commentscount = $items['comments']['count'];
    	$filter = $items['filter'];
    	$idimage = $items['id'];
    	$url = $items['link'];
    	$urljson = "URL JSON";

		$data = $items['images'][$res]['url'];
    	//echo '<img src="'.$data.'">';
    	//echo $data."<br>";

		echo '
				<div class="row col-md-3" style="padding-left:5%;padding-left:5%">
		    		<a href="'.$data.'" style="max-width:640px; height:auto; padding:4px" data-toggle="lightbox" class=" thumbnail" data-gallery="multiimages" data-title="'.$image.'">
	                	<img src="'.$data.'" class="img-responsive" >
	            	</a>';


    	//tags è un array contenente tutti i tag relativi alla foto
    	
		echo "User: ".$user."<br>";
		echo "likes: ".$likescount."<br>";
		echo "comments: ".$commentscount."<br><br><hr></div>";
    	

	mysql_query("CREATE TABLE ig_research (I_ID INT(6), Date CHAR(30), User CHAR(30), Name CHAR(30), LikesCount CHAR(30), CommentsCount CHAR(30), Filter CHAR(30), idImage CHAR(30), Url CHAR(30),LinkJson CHAR(30), Keyword CHAR(30), Kind CHAR(10))");

	// elimina duplicati tabella
	mysql_query("ALTER IGNORE TABLE ig_research ADD UNIQUE INDEX id_unq (User, Name, Url)");		

	//mysql_query("CREATE TABLE Instagram (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,User CHAR(30), Name CHAR(30), LikesCount INT(10), CommentsCount INT(10), Filter CHAR(30), idImage CHAR(30), Url CHAR(30), LinkJson CHAR(30), Keyword CHAR(30))");
	mysql_query("INSERT INTO ig_research (I_ID,Date,User,Name,LikesCount,CommentsCount,Filter,idImage,Url,LinkJson,Keyword,Kind) VALUES ('$I_ID',CURDATE(),'$user','$name','$likescount','$commentscount','$filter','$idimage','$url','$urljson','$keyword','$kind')");

	savePicture($data,$idimage,$dir);

  	}
	echo '</div></div>';
				
				
  	}


function visualizzaImmaginiUser($userName,$count,$res){

	$userID = getUserID($userName);
	$url = 'https://api.instagram.com/v1/users/'.$userID.'/media/recent?client_id='.clientID.'&count='.$count;

	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	$query="SELECT DISTINCT * from ig_research ORDER BY I_ID DESC";
	$ris=mysql_query($query);
	$riga=mysql_fetch_array($ris);
	for($i=0;$i<1;$i++){
		$I_ID = $riga["I_ID"];
		$I_ID++;
	}	
	//crea cartella in cui salvare le immagini
	$keyword = $userName;
	$kind = "Username";
	$dir = '../instagram/'.$I_ID."-".$keyword.'/';
	mkdir($dir);
	

	mysql_query("CREATE TABLE ig_directory (S_ID INT(6), Date CHAR(30), Keyword CHAR(30), Kind CHAR(10))");
	mysql_query("INSERT INTO ig_directory (S_ID,Date,Keyword,Kind) VALUES ('$I_ID',CURDATE(),'$keyword','$kind')");


	echo '<div class="col-md-10">
			<div class="col-md-12 border">
              <p class="title">INSTAGRAM IMAGES for TAG: '.$tag.'</p><br>';
	
	foreach($results['data'] as $items){

		$data = $items['images'][$res]['url'];
    	//echo '<img src="'.$data.'">';
    	//echo $data."<br>";

		echo '
				<div class="row col-xs-3" style="padding-left:5%;padding-left:5%">
		    		<a href="'.$data.'" style="max-width:640px; height:auto; padding:4px" data-toggle="lightbox" class=" thumbnail" data-gallery="multiimages" data-title="'.$image.'">
	                	<img src="'.$data.'" class="img-responsive" >
	            	</a>';



    	//tags è un array contenente tutti i tag relativi alla foto
    	$tags = $items['tags'];
		$num = count($tags);
		$nexturl = $results['pagination']['next_url'];
    	 
    	$user = $items['user']['username'];
    	$name = $items['user']['full_name'];
    	$description = $items['caption']['text'];
    	$likescount = $items['likes']['count'];
    	$commentscount = $items['comments']['count'];
    	$filter = $items['filter'];
    	$idimage = $items['id'];
    	$url = $items['link'];
		$image_url = $items['images']['low_resolution']['url'];
    	$urljson = "URL JSON";
		$keyword = $userName;
		echo "likes: ".$likescount."<br>";
		echo "comments: ".$commentscount."<br><br><hr></div>";



	mysql_query("CREATE TABLE ig_research (I_ID INT(6), Date CHAR(30), User CHAR(30), Name CHAR(30), LikesCount CHAR(30), CommentsCount CHAR(30), Filter CHAR(30), idImage CHAR(30), Url CHAR(30),LinkJson CHAR(30), Keyword CHAR(30), Kind CHAR(10))");

	// elimina duplicati tabella
	mysql_query("ALTER IGNORE TABLE ig_research ADD UNIQUE INDEX id_unq (User, Name, Url)");		

	//mysql_query("CREATE TABLE Instagram (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,User CHAR(30), Name CHAR(30), LikesCount INT(10), CommentsCount INT(10), Filter CHAR(30), idImage CHAR(30), Url CHAR(30), LinkJson CHAR(30), Keyword CHAR(30))");
	mysql_query("INSERT INTO ig_research (I_ID,Date,User,Name,LikesCount,CommentsCount,Filter,idImage,Url,LinkJson,Keyword,Kind) VALUES ('$I_ID',CURDATE(),'$user','$name','$likescount','$commentscount','$filter','$idimage','$url','$urljson','$keyword','$kind')");
	
	savePicture($data,$idimage,$dir);

  	}

	echo '
		<div class="col-xs-12"><br>
			<form action="" method="post">
				<div class="col-xs-12">
					<input type="text" hidden="true" name="nexturl" value="'.$nexturl.'"></input>
					<input type="text" hidden="true" name="count" value="'.$count.'"></input>
					<input type="text" hidden="true" name="value" value="'.$userName.'"></input>
					<input type="text" hidden="true" name="resolution" value="'.$res.'"></input>
				</div>	
				<div class="col-md-3 form-group" style="background:;">   
          				<input class="btn btn-block btn-primary" onclick="hide()" name="nextpage" type="submit"  value="Next Page">
            	</div>
			</form>
    	</div>
		';

}
//gabrielesoldati easyretrieve 2015
?>