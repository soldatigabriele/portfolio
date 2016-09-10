<?php  
  session_start();
  include('../login/configuration.php');
  include('../include/conf.php');
  include('../include/function.php');

  if($_SESSION['key']!=$key){ 

    $page = WS_LOGIN;
    $sec = "0";
    header("Refresh: $sec; url=$page");
  }
  elseif($_SESSION['key']==$key AND $_SESSION['key2']==1){$admin=1;
  }

?>

<!DOCTYPE html>
<html>  
  <head>
    <meta charset="UTF-8">
    <title>Instagram Results</title>    
    <?php include('../include/head-script.php');?>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue sidebar-mini">
    <?php include('../include/header.php');
          include('../include/aside-instaresults.php');
    ?>

    <div class="content-wrapper" style="background:;">

      <div class="content-header col-xs-12" style="background:;">
              <div class="col-xs-8" style="background:;">
                <div class="col-xs-1" style="background:;">
                  <img src="../img/insta.png" width="43px">
                </div>
                <div class="col-xs-10" style="background:;">
                    <h3>
                      Instagram Images
                    </h3>
                </div>
              </div>
          </div>  
          <!-- Main content -->
        <div class="clearfix"></div>
        <div class="content" style="background:;">
        
          <div class="box-body border">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
              <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                 <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                  <tr><th>S_ID</th><th>Keyword</th><th>Kind</th><th>Date</th><th class="td_short">OPEN</th><?php if(isset($admin)){echo'<th class="td_short">DELETE</th>';};?></tr>
                    <?php 
                    error_reporting(E_ALL);

                    dbConnect();
                    $query="SELECT DISTINCT * FROM ig_directory ORDER BY S_ID desc";
                    $ris=mysql_query($query);
                    //Gabriele Soldati EasyRetrieve 2015
                    while ($riga=mysql_fetch_array($ris)) {
                      echo '<tr class="">
                              <td>'.$riga["S_ID"]."</td>
                              <td>".$riga["Keyword"]."</td>
                              <td>".$riga["Kind"]."</td>
                              <td>".$riga["Date"].'</td>

                              <td class="td_short">
                                  <a href="instaimages.php?S_ID='.$riga["S_ID"].'&keyword='.$riga['Keyword'].'">
                                    <img src="../img/search.png" width="20px">
                                  </a>
                              </td>';
                              if(isset($admin)){echo'
                              <td class="td_short">
                                  <a class="eraseconfirmation" href="erase_instafolder.php?S_ID='.$riga["S_ID"].'&keyword='.$riga["Keyword"].'">
                                    <img src="../img/trash.png" width="21px">
                                  </a>
                              </td>';};
                              echo'
                            </tr>';
                      }
                    ?>

                  <tr><th>S_ID</th><th>Keyword</th><th>Kind</th><th>Date</th><th class="td_short">OPEN</th><?php if(isset($admin)){echo'<th class="td_short">DELETE</th>';};?></tr>
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



