<?php
require_once('inc/init.php');

if (!$user->isLoggedIn()) {
    $user = new User('admin');
    $user->login();
    Redirect::to('index.php');
}
require_once('navigation.php');
if ($user->isLoggedIn()) {
?>
<div class="homeContainer" style="margin-bottom:1%; height:100%;">
    <div class="col-md-8 homeFrame">

        <div class="clearfix"></div>
        <div class="col-md-6">

            <!-- il nome dell'utente viene ritornato tramite la funzione escape, per prevenire attachi di tipo cross site scripting  -->
            <div class="col-md-12 spacing">
                <h3>Welcome, <a
                        href="profile.php?username=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!
                </h3>
            </div>
            <div class="col-md-12">
                <form action="upload.php" method="POST"><input type="submit"
                                                               class="showImage btn btn-block  btn-outline-primary"
                                                               name="Upload" value="Upload Images"></form>
            </div>
            <div class="col-md-12 clearfix"><br></div>
            <div class="col-md-12">
                <form action="../../index.php" method="POST"><input type="submit"
                                                                    class="showImage btn btn-block btn-outline-primary"
                                                                    name="" value="Back to the Portfolio"></form>
            </div>
        </div>
        <?php

        }
        if ($_GET["password"] == "changed") {
            echo '<script type="text/javascript">alert("password modificata correttamente"); </script>';
        }
        ?>

    </div>
</div>
</body>
</html>