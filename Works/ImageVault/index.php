<?php
require_once('inc/init.php');
require_once('navigation.php');
?>

<a href="login.php">Login</a>
<br>
<?php
//$user = new User();
    $user = new User('admin');
    $user->login();
if(!$user->isLoggedIn()){
    echo '<a href="register.php">register</a>';
//    $user = new User('admin');
//    $user->login();
}else{
    require_once ('home.php');
}

?>
</body>
</html>