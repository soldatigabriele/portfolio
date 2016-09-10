<?php  
  session_start();
  include('../login/configuration.php');
  include('../include/conf.php');
  if($_SESSION['key']!=$key){ 

    $page = WS_LOGIN;
    $sec = "0";
    header("Refresh: $sec; url=$page");
    //echo "<br>chiave: ".$key;
  	//echo "<br>session[key]= ".$_SESSION["key"];
  }else{
	$message = "sei loggato".$_SESSION['key'];
    //echo "<script type='text/javascript'>alert('$message');</script>";
    //Gabriele Soldati EasyRetrieve 2015
    //echo "<br>chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key;
  	//echo "<br>session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Google Street View</title>
    <?php include('../include/head-script.php');?>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue sidebar-mini">
    
    <?php include('../include/header.php') ?>
    <?php include('../include/function.php') ?>
    <?php include('../include/aside-search.php');

        $conn=mysql_connect("http://www.gabrielesoldati.altervista.org/","gabrielesoldati","tinnosimbu75");
        if(!mysql_select_db("my_gabrielesoldati")) {
        $create=mysql_query("CREATE DATABASE ricerca");
        mysql_select_db("my_gabrielesoldati");
        $create=mysql_query("CREATE DATABASE ricerca");
        echo "database created";
        }
    ?>

    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper col-md-12" >
        <!-- Content Header (Page header) -->
        <section class="content-header" >
          
          <div class="col-xs-8" style="background:;">
            <div class="col-xs-2" style="background:;">
              <img src="../img/gmaps.png" width="60px">
            </div>
           
            <div class="col-xs-8" style="background:;">
              <h1>
                Retrieve Google Images
              </h1>
            </div>
          </div>
        </section>
         <div class="col-xs-8">
          <p></p>
          </div>
        <!-- Main content -->

        <section class="content">
        <div class="box-body border col-xs-6" style="background:;">
            <div id="createdir " class="col-xs-12" style="background:;">
              <form action="new_directory.php" method="POST"  data-ajax=false>
                <div class="col-xs-3">
                  <label id="crea2">Create a new directory: </label>
                </div>
                <div class="col-xs-offset-3 input-group <?php if(isset($_GET['dir_error_message'])){echo " has-error";} ?>" style="background:;">
                  <input type="text" class="form-control" name="D_NAME" placeholder="<?php if(isset($_GET['dir_error_message'])){echo $_GET['dir_error_message'];}else{echo "Insert name";} ?>" >
                  <div class="input-group-btn">
                    <button class="btn btn-primary" name="submit" type="create">Create</button>
                  </div>
                </div>
                  <!--<input class="btn btn-block btn-primary" name="submit" type="submit" data-inline="true" value="Create" style="width:100px;">-->
              </form>
            </div>
          </div>
          <div class="col-xs-8">
          <p></p>
          </div>

          <form method="post" action="streetview.php"  data-ajax=false>                
            <div class="col-md-6" style="border-top:3px solid #3c8dbc;background:white;padding:20px 0 20px 0;">
                  <div class="col-md-6 form-group <?php if(isset($_GET['error_message'])){echo " has-error";} ?>"  style="background:;">
                    <label>Search name: </label>
                    <input type="text" class="form-control" placeholder="<?php if(isset($_GET['error_message'])){echo $_GET['error_message'];}else{echo "Insert name";} ?>" name="name" id="<?php if(isset($_GET['error_message'])){echo "inputError";}else{echo " ";}?>">
                  </div>
                  <div class="col-md-6 " style="background:;">
                    <label>Directory: </label>
                    <select name="dir" class="form-control">
                    
                    <?php
                      dbConnect();
                      $query="SELECT DISTINCT * FROM sv_directory ORDER BY D_ID DESC";
                      $ris=mysql_query($query);
                      if(!$ris) die ("Selezione non riuscita");
                      while ($riga=mysql_fetch_array($ris)) {
                        echo '<option  value='.$riga["D_ID"]."-".$riga["D_NAME"].">".$riga["D_ID"]." - ".$riga["D_NAME"]." - ".$riga["Date"]."</option>";
                      }
                    ?>

                    </select>
                  </div>
                <div class="col-md-12 form-group <?php if(isset($_GET['error_message2'])){echo " has-error";} ?>" style="background:;">   
                  <label>Coordinates:</label>
                  <input type="text" class="form-control" placeholder="Latitude, Longitude" name="coordinates">
                </div>    
                
               
                
                 <div class="col-md-12 form-group">
                    <label>Heading - specifies the compass heading of the camera (0° | 360°)</label>
                    <select name="head" class="form-control">
                      <option value="0">0° - NORTH</option>
                      <option value="90">90° - EAST</option>
                      <option value="180">180° - SOUTH</option>
                      <option value="270">270° - WEST</option>
                    </select>
                </div>
                
                <div class="col-md-12 form-group">
                    <label>Pitch - specifies the up or down angle of the camera ( 0° | +90°)</label>
                    <select name="pitch" class="form-control">
                      <option value="0">0°</option>
                      <option value="30">30°</option>
                      <option value="60">60°</option>
                      <option value="90">90°</option>
                    </select>
                </div>                  
                 
                <div class="col-md-12 form-group">
                    <label>Fov - Zoom (default is 120)</label>
                    <select name="fov" class="form-control">
                      <option value="60">60</option>
                      <option value="75" >75</option>
                      <option value="90" selected="selected">90</option>
                      <option value="105" >105</option>
                      <option value="120" >120</option>
                    </select>
                </div>                 
              
               <div class="col-md-6 form-group">
                    <label>Numero di immagini</label>
                    <select name="num" class="form-control" >
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9" selected="selected" >9</option> 
                      <option value="12">14</option>
                    </select>
                </div>
              <div class="col-md-6 form-group">
                    <label>Image dimension</label>
                    <select name="dim" class="form-control">
                      <option value="320">320x320px</option>
                      <option value="400">400x400px</option>
                      <option value="540">540x540px</option>
                      <option value="640" selected="selected">640x640px</option>
                    </select>
              </div>
              <br>                
              <div class="col-md-4">
              <input class="btn btn-block btn-primary" name="submit" type="submit" data-inline="true" value="Start!">
              </div>
            </div>
          </div>
        </div>
      </form>

    <?php include('../include/footer-script.php') ?>
  <div class="clearfix"></div>
   
  </body>
</html>



