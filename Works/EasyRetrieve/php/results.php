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
  elseif($_SESSION['key']==$key AND $_SESSION['key2']==1){
    $admin=1;
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
    <title>Results</title>    
    <?php include('../include/head-script.php');?>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue sidebar-mini">
    <?php include('../include/header.php');
          include('../include/aside-images.php');
    
        $D_ID=$_GET["D_ID"];
        $D_NAME=$_GET["D_NAME"];
    ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
              <section class="content-header" >
          
          <div class="col-xs-8" style="background:;">
            <div class="col-xs-1" style="background:;">
              <img src="../img/gmaps.png" width="43px">
            </div>
           
            <div class="col-xs-8" style="background:;">
              <h3>
                Google Images
              </h3>
            </div>
          </div>
        </section>
                <div class="clearfix"></div>

      <div class="content-header col-xs-12" style="background:;">

        <div class="col-xs-3 offest-1" style="background:;">
          <?php echo '<span class="result_title">'.$D_NAME.'</span><span class="result_id"> - D_ID: '.$D_ID."</span>";?>
          <small><?php  echo $url; ?></small>
        </div>
      </div>
      <!-- Main content -->
      <div class="content">
       <!-- Your Page Content Here -->
        <div class="box-body border">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
              <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                 <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                  <tr><th>id</th><th>Name</th><th>Latitude</th><th>Longitude</th><th>Fov</th><th>Pitch</th><th>Heading</th><th>Photos</th><th class="td_short">OPEN</th><th class="preview">Preview</th><?if($admin==1){echo'<th class="td_short">DELETE from DB</th><th class="td_short">ERASE FOLDER</th>';}?></tr>
                    <?php 
                    $conn=mysql_connect("http://www.gabrielesoldati.altervista.org/","gabrielesoldati","tinnosimbu75");
                    mysql_select_db("ricerca");
                    $query="SELECT DISTINCT * FROM sv_research WHERE D_ID = '$D_ID'";
                    $ris=mysql_query($query);
                    while ($riga=mysql_fetch_array($ris)) {
                      echo '<tr class="">
                              <td>'.$riga["id"]."</td>
                              <td>".$riga["name"]."</td>
                              <td>".$riga["Latitude"]."</td>
                              <td>".$riga["Longitude"]."</td>
                              <td>".$riga["Fov"]."</td>
                              <td>".$riga["Pitch"]."</td>
                              <td>".$riga["Heading"]."</td>
                              <td>".$riga["Photos"].'</td>
                              
                              <td class="td_short">
                                  <a href="images.php?D_ID='.$riga["D_ID"].'&D_NAME='.$D_NAME.'&name='.$riga["name"]."&img=".$riga["Latitude"]."_".$riga["Longitude"].'">
                                    <img src="../img/search.png" width="20px">
                                  </a>
                              </td>
                              <td>
                                <img src="../streetview/'.$D_ID."-".$D_NAME."/".$riga["Latitude"]."_".$riga["Longitude"]."/1-0".'.jpg"'.' width="128" height="128">
                              </td>';
                              if(isset($admin)){echo'
                              <td class="td_short">
                                  <a class="confirmation" href="del_search.php?D_ID='.$D_ID.'&D_NAME='.$D_NAME.'&id='.$riga["id"].'&name='.$riga["name"].'">
                                    <img src="../img/delete_database.png" width="20px">
                                  </a>
                              </td>
                              <td class="td_short">
                                  <a class="eraseconfirmation" href="erase_folder.php?D_ID='.$D_ID.'&D_NAME='.$D_NAME.'&id='.$riga["id"].'&img='.$riga["Latitude"]."_".$riga["Longitude"].'">
                                    <img src="../img/delete.png" width="21px">
                                  </a>
                              </td>';}
                              echo'
                            </tr>';
                            $name=$riga["name"];
                            $id=$riga["id"];
                      }
                    ?>

                  <tr><th>id</th><th>Name</th><th>Latitude</th><th>Longitude</th><th>Fov</th><th>Pitch</th><th>Heading</th><th>Photos</th><th class="td_short">OPEN</th><th class="preview">Preview</th><?if($admin==1){echo'<th class="td_short">DELETE from DB</th><th class="td_short">ERASE FOLDER</th>';}?></tr>
                 </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    
    <?php include('../include/footer-script.php') ?>

    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure you want to remove the directory from the database?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
    <script type="text/javascript">
          var elems = document.getElementsByClassName('eraseconfirmation');
          var confirmIt = function (e) {
              if (!confirm('Are you sure you want to erase the content of the folder?')) e.preventDefault();
          };
          for (var i = 0, l = elems.length; i < l; i++) {
              elems[i].addEventListener('click', confirmIt, false);
          }
    </script>
  </body>
</html>



