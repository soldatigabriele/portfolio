<?php

require_once('navigation.php');
?>
<div class="col-md-12" style="background:#ffcb76;padding:20px">
    <div class="col-md-6 offset-md-3" style="background:white;border-radius: 25px;padding:20px">
        <div class="col-md-12" style="margin: auto;">
            <div class="col-md-12">
                <h2>EasyRetrieve</h2>
                <div class="col-md-12 clearfix"><br></div>
                This Web App lets users retrieve images from Google Street View and from Instagram.
                (Instagram recently blocked the API services, so it is not more possible use it)
            </div>
            <div class="col-md-12" style="padding:10px;border: 1px lightgray solid;width:430px;height:260px;">
                <img src="inc/img/Picture2.png" class="image" alt="">
            </div>
            <div class="col-md-12 clearfix"><br></div>
            <div class="col-md-12">
                You can search images by tags, coordinates or by the user that uploaded it. It is possible to select
                the number of pictures to retrieve and the dimension.
            </div>
            <div class="col-md-12" style="padding:10px;border: 1px lightgray solid;width:430px;">
                <img src="inc/img/Picture1.png" class="image" alt="">
            </div>
            <div class="col-md-12 clearfix"><br></div>
            <div class="col-md-12">

                <br>
                <div class="col-md-12 clearfix"><br></div>

                In order to download images from Google StreetView you have to insert the coordinates of the location.
            </div>
            <div class="col-md-12" style="padding:10px;border: 1px lightgray solid;width:430px;height:260px;">
                <img src="inc/img/Picture3.png" class="image" alt="">
            </div>
            <div class="col-md-12 clearfix"><br></div>
            <div class="col-md-12">
                The images are then stored in a folder in your computer, but you can see it also directly within the
                Web App, where you can also delete it.<br>
            </div>
            <div class="col-md-12" style="padding:10px;border: 1px lightgray solid;width:430px;height:260px;">
                <img src="inc/img/Picture4.png" class="image" alt="">
            </div>
        </div>
        <div class="col-md-12 clearfix"><br></div>

        <div style="width:450px;margin:auto;">
            <div class="col-md-12" style="border:1px solid #acacac;">
                <div class="clearfix"><br></div>
                <div class="offset-md-3">
                    <img src="../../img/easyRetrieve.png" alt="" style="max-width:220px;">
                </div>
                <div class="clearfix"><br></div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <form action="login/index.php" method="POST">
                            <input type="submit"
                                   class="showImage btn btn-block btn-outline-primary"
                                   name="Laboa" value="Go to EasyRetrieve">
                        </form>
                        <div class="clearfix"><br></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12 clearfix"><br></div>
        <div class="col-md-8 offset-md-2">
            <form action="../../index.php" method="POST"><input type="submit"
                                                                class="showImage btn btn-block btn-outline-gray"
                                                                name="" value="Back to the Portfolio"></form>
        </div>

    </div>

</div>

</body>
</html>