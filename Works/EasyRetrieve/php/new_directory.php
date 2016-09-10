 <?php
      include('../include/function.php'); 
      include('../include/conf.php');
      include('../include/head-script.php');


      if (isset($_POST["submit"])){

            if($_POST["D_NAME"] == ''){
                  $error_message = urlencode("Please, insert a name");
                  header('Location: '.WS_INDEX.'?dir_error_message='.$error_message);
                  die;
            }
      };

      if (isset($_POST["submit"])){
            $D_NAME=$_POST["D_NAME"];

      dbConnect();
      mysql_query("CREATE TABLE sv_directory (D_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Date CHAR(30), D_NAME CHAR(30))");
      if(!mysql_query("INSERT INTO sv_directory (Date,D_NAME) VALUES(CURDATE(),'$D_NAME')")) die("ERROR");

      mysql_close($conn);
      };

      dbConnect();

      $query="SELECT D_ID FROM sv_directory WHERE D_NAME = '$D_NAME' ";
      $ris=mysql_query($query);
      $D_ID=mysql_fetch_array($ris);
      $query="SELECT D_NAME FROM sv_directory WHERE D_NAME = '$D_NAME' ";
      $ris=mysql_query($query);
      $D_NAME=mysql_fetch_array($ris);
      //create the folder
      $dir = "../streetview/".$D_ID[0]."-".$D_NAME[0];
      mkdir($dir);

      
      mysql_query($query);

      mysql_close($conn);
      
?>
<?php header('Location: '.WS_INDEX)?>