<?php
require_once('inc/init.php');

if (!$user->isLoggedIn()) {
    $user = new User('Gabriele');
    $user->login();
    Redirect::to('index.php');
}
require_once('navigation.php');
if ($user->isLoggedIn()) {
?>
    <div  style="width:450px;margin:auto;">

        <div class="col-md-12 offset-md-2">
            <h3>Welcome, <?php echo escape($user->data()->username); ?>!</h3>
        </div>
        <div class="col-md-12" style="border:1px solid #acacac;">
            <div class="clearfix"><br></div>
            <div class="offset-md-3">
                <img src="img/images.png" alt="" style="max-width:220px;">
            </div>
            <div class="clearfix"><br></div>
            <div class="col-md-12">
                <div class="col-md-12">
                    <form action="upload.php" method="POST">
                        <input type="submit"
                               class="showImage btn btn-block btn-outline-primary"
                               name="Upload" value="Upload Images">
                    </form>
                    <div class="clearfix"><br></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 clearfix"><br></div>
        <div class="col-md-8 offset-md-2">
            <form action="../../index.php" method="POST"><input type="submit"
                                                                class="showImage btn btn-block btn-outline-gray"
                                                                name="" value="Back to the Portfolio"></form>
        </div>

        <?php } ?>
</div>
</body>
</html>