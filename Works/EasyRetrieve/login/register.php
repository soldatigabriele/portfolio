<?php 
  include('../include/function.php'); 
  include('configuration.php');
  include('../include/conf.php');
?>

<?php 
  session_start(); // dive essere la prima cosa nella pagina, aprire la sessione
  dbConnect();

  if(isset($_POST["register"])){
    $username=$_POST["username"];
    $query="SELECT * FROM users WHERE username='$username'";
    if($username=="admin"){$admin=1;}else{$admin=0;};
    $ris=mysql_query($query);
    ($riga=mysql_fetch_array($ris));
      if($riga["username"]!=$_POST["username"]){

        if($_POST["username"] != "" && $_POST["password"]!= "" && $_POST["email"] != ""){  // se i parametri iscritto non sono vuoti non sono vuote
          mysql_query("CREATE TABLE users (username CHAR(255) PRIMARY KEY, password CHAR(255), email CHAR(255), admin INT(2), status INT(10) )");
          $query_registrazione = mysql_query("INSERT INTO users (username,password,email,admin,status) VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["password"]."','".$admin."','1')"); 
          header('Location:'.WS_LOGIN);
          }else{echo "query di registrazione non riuscita"; // se la query fallisce mostrami questo errore
          };
      }else{
        $error_message = urlencode("Username is not available");
        header('Location: '.WS_LOGIN.'?error_message4='.$error_message);
      };
  }
  if (isset($_POST["register"])){

    if($_POST["username"] == ''){
      $error_message = urlencode("Please, insert a name");
      header('Location: '.WS_LOGIN.'?error_message='.$error_message);
      die;
    }
    if($_POST["password"] == ''){
      $error_message = urlencode("Please, insert a valid password");
      header('Location: '.WS_LOGIN.'?error_message2='.$error_message);
      die;
    }
    if($_POST["email"] == ''){
      $error_message = urlencode("Please, insert a valid email");
      header('Location: '.WS_LOGIN.'?error_message3='.$error_message);
      die;
    }
  };  
  dbClose();
?>