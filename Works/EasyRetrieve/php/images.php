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
  }
  elseif($_SESSION['key']==$key AND $_SESSION['key2']==1){$admin=1;
  }else{
  $message = "sei loggato".$_SESSION['key'];
//    echo "<script type='text/javascript'>alert('$message');</script>";
    //echo "<br>chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key;
    //echo "<br>session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"];
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
   <?php include('../include/header.php') ?>
   <?php include('../include/aside-images.php') ?>

   <div class="wrapper" style="">
     <div class="content-wrapper" style="">
        <div class="col-md-12" style="">
          <br>  
          <?php  
           $img=$_GET["img"];
           $name=$_GET["name"];
           $D_ID=$_GET["D_ID"];
           $D_NAME=$_GET["D_NAME"];
           $f_name=$D_ID."-".$D_NAME;

            $directory = "../streetview/".$f_name."/".$img."/";
            $images = glob($directory . "*.jpg");

            $image_name=str_replace("_","  , ",$img);
            
           	echo '<div class="col-md-12 border">
                    <p class="title">STREET VIEW IMAGES</p>';
               foreach($images as $image)
                {
                  //remove the directory from images name
                 $name2=str_replace("../streetview/".$f_name."/".$img."/","",$image);
                 if($image!="../streetview/".$f_name."/".$img."/test.jpg")
                  {
                    // shows the images with respective names 
                    echo '
                      <div class="row col-md-3"  style="padding-left:5%;padding-left:5%">                                
                          <a href="'.$image.'" style="max-width:300px; height:auto; padding:4px" data-toggle="lightbox" class=" thumbnail" data-gallery="multiimages" data-title="'.$image.'">
                            <img src="'.$image.'" class="img-responsive" >
                          </a>
                          <div class="details col-xs-12" style="background:;">
                            <div class="names col-xs-8" style="background:;"> 
                            '.$name2.'
                            </div>';
                            if(isset($admin)){echo'
                            <div class="col-xs-2" style="background:">  
                              <a class="confirmation" href="del_image.php?image='.$image."&D_ID=".$D_ID."&D_NAME=".$D_NAME."&img=".$img.'">
                                <img src="../img/delete.png" width="20px">
                              </a>
                            </div>
                            <div class="col-xs-12" style="background:silver"></div>';}
                              echo '
                                                       <hr>

                          </div>
                         
                      </div>
                    ';
                  }
                }                   
              echo '
w              <div class="clearfix"></div>
                    </div>';
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
