<?php
require_once('inc/init.php');
require_once('navigation.php');
?>

<br>
<?php
if(!$user->isLoggedIn()){
$user = new User('admin');
    $user->login();
    echo '<a href="login.php">Login</a>';
    echo '<a href="register.php">register</a>';
}else{
    require_once ('home.php');
}

?>
</body>
</html>