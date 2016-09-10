<?php  
  session_start();
  include('../include/conf.php');
  include('../login/configuration.php');
  include('../include/function.php');
  if($_SESSION['key']!=$key){ 

    $page = WS_LOGIN;
    $sec = "0";
    header("Refresh: $sec; url=$page");
    //echo "<br>chiave: ".$key;
    //echo "<br>session[key]= ".$_SESSION["key"];
  }
  elseif($_SESSION['key']==$key AND $_SESSION['key2']==1){$admin=1;
  }else{
  $message = "sei loggato".$_SESSION['key'];
//    echo "<script type='text/javascript'>alert('$message');</script>";
    //echo "<br>chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key;
    //echo "<br>session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"];
   error_reporting(E_ALL);

  }
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Images</title>    
    <?php include('../include/head-script.php') ?>
    <link rel="stylesheet" type="text/css" href="../bootstrap/lightbox-master/dist/ekko-lightbox.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
  </head>

  <body class="skin-blue sidebar-mini">
    <?php include('../include/header.php');
    include('../include/aside-instaresults.php');
    $S_ID=$_GET["S_ID"];
    $keyword= $_GET["keyword"];
    ?>
    
   <div class="wrapper" style="">
     <div class="content-wrapper" style="">
        <section class="content-header" >
              <div class="col-xs-8" style="background:;">
                <div class="col-xs-1" style="background:;">
                  <img src="../img/insta.png" width="43px">
                </div>
                <div class="col-xs-10" style="background:;">
                    <span class="title">
                      Instagram Images 
                    </span>
                    <?php echo '<span class="subtitle">ID:'.$S_ID." - KEYWORD: ".$keyword.'</span>'; ?>
                </div>
              </div>
          </section>     

          <div class="col-md-12" style=""><p> </p></div>
          <div class="col-md-12" style="">
            <div class="col-md-12 border" style="">
              
              <br>  
              <br>  

          <?php  
      error_reporting(E_ALL);

            $directory = "../instagram/".$S_ID."-".$keyword."/";
            $images = glob($directory."*.jpg");
            
            dbConnect();
            

            
            
            foreach($images as $image)
                {
           
                  $name=str_replace($directory,"",$image);
                  $imgname=str_replace(".jpg","",$name);

                  $query="SELECT * FROM ig_research WHERE I_ID='$S_ID' AND idImage = '$imgname'";
                  $ris=mysql_query($query);
                  while($riga=mysql_fetch_array($ris)) {
           
                    echo '
                      <div class="row col-xs-3"  style="padding-left:5%;padding-left:5%;"">                             
                          <div class="row col-xs-12" style="background:;">
                            <a href="'.$image.'" style="max-width:300px; height:auto; padding:4px" data-toggle="lightbox" class=" thumbnail" data-gallery="multiimages" data-title="'.$image.'">
                              <img src="'.$image.'" class="img-responsive" >
                            </a>
                          </div>';
                          if(isset($admin)){echo'
                          <div class="col-xs-2" style="background:;">  
                                <a class="confirmation" href="del_instaimage.php?image='.$image."&S_ID=".$S_ID."&Keyword=".$keyword.'&img="">
                                  <img src="../img/delete.png" width="20px">
                                </a>
                          </div>
                          ';};
                          echo'
                          <div class="names col-xs-10" style="background:;"> 
                            User:<br> '.$riga['User'].'
                          </div>
                            <div class="col-xs-12" style="border-bottom:1px #D2D2D2 solid;"><p> </p></div>                             
                            <div class="col-xs-12" style="background:;"><p><br> </p></div>                             
                      </div>
                    ';                              
              }
            }
              echo '
              <div class="clearfix"></div>
              </div>';
              //Gabriele Soldati EasyRetrieve 2015              
              ?>
                </div >
                <div class="clearfix"></div>
          </div>
        </div>
      <?php include('../include/footer-script.php') ?>
      <script src="../bootstrap/lightbox-master/lightbox.min.js"></script>

      <script>
      $(document).delegate('*[data-toggle="lightbox"]','click', function(){

      event.preventDefault();
      $(this).ekkoLightbox();

      }); 
      </script>

      <script src="../bootstrap/js/bootstrap.min.js"></script> 
 
  </body>
</html>
