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
    //echo "<script type='text/javascript'>alert('$message');</script>";
    //echo "<br>chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key." - chiave: ".$key;
    //echo "<br>session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"]." - session[key]= ".$_SESSION["key"];
    //Gabriele Soldati EasyRetrieve 2015
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
  <body  class="skin-blue sidebar-mini">
    <?php include('../include/header.php');?>
    <?php include('../include/function.php');?>
    <?php include('../include/aside-directory.php');?>
    <div class="wrapper">
      <div class="content-wrapper">
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
        <section class="content">
          <div class="box-body border col-xs-8" style="background:;">
            
            <div class="col-xs-12" style="background:;"><br></div>
            <div class="col-xs-12" style="background:;">

            <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <table id="dir_table" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                   <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                    <tr><th>D_ID</th><th>D_NAME</th><th>Date</th><th>OPEN</th><?if($admin==1){echo'<th>DELETE</th>';}?></tr>
                      <?php $i=1; ?>
                      <?php dbConnect();
                        // Stampa la tabella sv_directory 
                        $query="SELECT DISTINCT * FROM sv_directory";
                        $ris=mysql_query($query);
                        while ($riga=mysql_fetch_array($ris)) {
                             
                        echo '<tr>
                                <td>'.$riga["D_ID"].'</a></td>
                                <td>'.$riga["D_NAME"]."</td>
                                <td>".$riga["Date"].'</td>
                                <td class="td_short">
                                  <a href="'.WS_RES.'?D_ID='.$riga["D_ID"]."&D_NAME=".$riga["D_NAME"].'">
                                    <img src="../img/search.png" width="20px">
                                  </a>
                                </td>
                                ';
                                if($admin==1){echo'
                                <td class="td_short">
                                  <a class="confirmation" href="del_directory.php?D_ID='.$riga["D_ID"].'&D_NAME='.$riga["D_NAME"].'">
                                    <img src="../img/delete.png" width="20px">
                                  </a>
                                </td>
                              </tr>';};
                             
                              };
                              
                              ?>

                      
                    <tr><th>D_ID</th><th>D_NAME</th><th>Date</th><th>OPEN</th><?if($admin==1){echo'<th>DELETE</th>';}?></tr>
                   </tbody>
                  </table>
            </div>
            </div>
        </div>
    </div>

    <?php include('../include/footer-script.php') ?>

    
    <!--delete the directory -->
    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure you want to delete the directory?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
        
    
  </body>
</html>