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
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <?php include('../include/head-script.php');?>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue sidebar-mini">
    
  <?php include('../include/header.php');
        include('../include/function.php');
        include('../include/aside-search.php');
        
        dbConnect();
        mysql_query("CREATE TABLE ig_keys (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, clientid VARCHAR(255),clientsecret VARCHAR(255), redirecturi VARCHAR(255))");

        if(isset($_POST["clientID"])){
        $clientid=$_POST["clientID"];
        mysql_query("UPDATE ig_keys SET clientid='$clientid' ");
        };

       if(isset($_POST["clientSecret"])){
        $clientid=$_POST["clientID"];
        mysql_query("UPDATE ig_keys SET clientid='$clientid' WHERE id=1 ");
        };

       if(isset($_POST["clientID"])){
        $clientid=$_POST["clientID"];
        mysql_query("UPDATE ig_keys SET clientid='$clientid' WHERE id=1 ");

        };

          //$ris=mysql_query("SELECT DISTINCT * FROM ig_keys");
          //mysql_query("INSERT INTO ig_keys (clientid,clientsecret,redirecturi) VALUES ('".$_POST["id"]."','".$_POST["secret"]."','".$_POST["uri"]."')");
          //while ($riga=mysql_fetch_array($ris)) {
          //  echo $riga["clientid"]."-".$riga["clientsecret"]."-".$riga["redirecturi"];
          //}
  ?>

    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper col-md-12" >
        <!-- Content Header (Page header) -->
        <section class="content-header" >
          
          <div class="col-xs-8" style="background:;">
            <div class="col-xs-2" style="background:;">
              <img src="../img/set.png" width="60px">
            </div>
           
            <div class="col-xs-offset-2" style="background:;">
              <h1>
                Settings
              </h1>
            </div>
          </div>
        </section>
         <div class="col-xs-8">
          <p></p>
          </div>
        <!-- Main content -->

        <section class="content">
        <div class="box-body border col-xs-8" style="background:;">
            <div id="updatedir " class="col-xs-12" style="background:;">
              
              <form action="settings.php" method="POST"  data-ajax=false>
                <div class="col-xs-12" style="background:;">
                <?php echo '<div class="col-xs-2" ><label>ClientID: </label></div>';
  
                      $ris=mysql_query("SELECT DISTINCT * FROM ig_keys");
                      while ($riga=mysql_fetch_array($ris)) {
                        echo '<div class="col-xs-8">'.$riga["clientid"].'</div>';
                      }
                ?>
                </div>
                <div class="clearfix"></div>

                  <div class="col-xs-12 input-group">
                    <input type="text" class="form-control" name="clientID" placeholder="Insert a new ClientID" >
                    <div class="input-group-btn">
                      <button class="btn btn-primary" name="update" type="update">UPDATE</button>
                    </div>
                  </div>
                  <br>

                  <div class="col-xs-12" style="background:;">
                <?php echo '<div class="col-xs-2"><label>ClientSecret: </label></div>';
  
                      $ris=mysql_query("SELECT DISTINCT * FROM ig_keys");
                      while ($riga=mysql_fetch_array($ris)) {
                        echo '<div class="col-xs-8">'.$riga["clientsecret"].'</div>';
                      }
                ?>
                </div>

                  <div class="col-xs-12 input-group">
                    <input type="text" class="form-control" name="clientID" placeholder="Insert a new ClientSecret" >
                    <div class="input-group-btn">
                      <button class="btn btn-primary" name="update" type="update">UPDATE</button>
                    </div>
                  </div>
                  <br>

                  <div class="col-xs-12" style="background:;">
                <?php echo '<div class="col-xs-2"><label>RedirectURI: </label></div>';
  
                      $ris=mysql_query("SELECT DISTINCT * FROM ig_keys");
                      while ($riga=mysql_fetch_array($ris)) {
                        echo '<div class="col-xs-8">'.$riga["redirecturi"].'</div>';
                      }
                ?>
                </div>
                  <div class="col-xs-12 input-group">
                    <input type="text" class="form-control" name="clientID" placeholder="Insert a new RedirectURI" >
                    <div class="input-group-btn">
                      <button class="btn btn-primary" name="update" type="update">UPDATE</button>
                    </div>
                  </div>
              </form>
              <br>

            
            </div>
          </div>
          <div class="col-xs-8">
          <p></p>
          </div>
        <div class="box-body border col-xs-8" style="background:;">
        <label>USERS LIST</label>
          <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <table id="dir_table" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                   <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                    <tr><th>Username</th><th>Password</th><th>Email</th><th>Privileges</th><th class="td_short">Status</th><th class="td_short">Ban/ Unban</th><th class="td_short">User/ Admin</th><th>Delete</th></tr>
                      <?php dbConnect();
                        $query="SELECT DISTINCT * FROM users";
                        $ris=mysql_query($query);
                        while ($riga=mysql_fetch_array($ris)) {
                             
                        echo '<tr>
                                <td>'.$riga["username"].'</a></td>
                                <td>'.$riga["password"]."</td>
                                <td>".$riga["email"].'</td>
                                <td>'; if($riga["admin"]==1){echo 'Administrator';}else{echo 'Standard User';}; echo '</td>
                                <td class="td_short">'; if($riga["status"]==1){echo 'Active';}else{echo 'Banned';}; echo '</td>
                                <td class="td_short">
                                  <a href="user_admin.php?status='.$riga["status"].'&user='.$riga["username"].'">
                                    <img src="../img/activate.png" width="20px">
                                  </a>
                                </td>
                                <td class="td_short">
                                  <a href="user_admin.php?admin='.$riga["admin"].'&user='.$riga["username"].'">
                                    <img src="../img/admin.png" width="20px">
                                  </a>
                                </td>
                                <td class="td_short">
                                  <a href="user_admin.php?username='.$riga["username"].'">
                                    <img src="../img/delete.png" width="20px">
                                  </a>
                                </td>
                              </tr>';
                        };
                        ?>
                    <tr><th>Username</th><th>Password</th><th>Email</th><th>Privileges</th><th class="td_short">Status</th><th class="td_short">Ban/ Unban</th><th class="td_short">User/ Admin</th><th>Delete</th></tr>
                   </tbody>
                  </table>
            </div>
        </div>
    <?php include('../include/footer-script.php') ?>
  <div class="clearfix"></div>
   
  </body>
</html>



