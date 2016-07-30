<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="include/style/stylesheet.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="include/autoscroll/animatescroll.js"></script>
    <script src="include/jQuery/jquery-1.12.4.js"></script>
    <script src="include/stellar/jquery.stellar.js"></script>
    <script src="include/jquery.appear/jquery.appear.js"></script>
    <!--    inizialize parallax effect-->
    <script>
        $(document).ready(function () {
            $(window).stellar();
        });
    </script>

</head>
<body>
<?php include('include/init.php'); ?>
<div class="header">
    <nav>
        <a id="about" href="#">About Me</a> |
        <a id="web" href="#">Skills</a> |
        <a id="frameworks" href="#">Frameworks</a> |
        <a id="flickr" href="#">Flickr</a> |
        <a id="contacts" href="#">Contacts</a>
    </nav>
</div>


<div class="page">
    <div class="firstImage" id="wall_about" data-stellar-background-ratio="0.5"></div>
    <div class="content" id="content_about">
        <div class="title">Who am I</div>
        <p>I am a back-end developer graduate of Internet Technology</p>
        <p>I like to challenge myself and I love to learn!</p>
    </div>
    <span id="index_about"></span>

    <div class="image" id="wall_web" data-stellar-background-ratio="0.5"></div>
    <div class="content" id="content_web">
        <div class="title">WEB DEVELOPMENT</div>
        <div class="description">
            <p>Strong PHP and OOP coding skills</p>
            <p>I also like to code in Javascript, NodeJS and jQuery</p>
            <p>I love GITHUB and VIM too!</p>
        </div>
        <div class="images">
            <div class="col-md-10 col-md-offset-1" style="padding-bottom:30px;bottom:0px;position:absolute;">
                <div class="col-md-2 transparent" id="slide1"><img class="img-circle" id="img1" src="img/php.png" alt="Circle image"> </div>
                <div class="col-md-2 transparent" id="slide2"><img class="img" id="img2" src="img/mysql.png" alt="Circle image"> </div>
                <div class="col-md-2 transparent" id="slide3"><img class="img" id="img3" src="img/githubB.png" alt="Circle image"> </div>
                <div class="col-md-2 transparent" id="slide4"><img class="img" id="img5" src="img/js.jpg" alt="Circle image"> </div>
                <div class="col-md-2 transparent" id="slide5"><img class="img" id="img4" src="img/nodejs.png" alt="Circle image"> </div>
                <div class="col-md-2 transparent" id="slide6"><img class="img" id="img6" src="img/jquery.png" alt="Circle image"> </div>
            </div>
        </div>
    </div>
    <span id="index_web"></span>

    <div class="image" id="wall_frameworks" data-stellar-background-ratio="0.2"></div>
    <div class="content" id="content_frameworks">
        <div class="title">Laravel 5</div>
        <p>Laravel is my favourite PHP Framework!</p>
        <p>It makes everything easier and faster!</p>
    </div>
    <span id="index_frameworks"></span>

    <div class="image" id="wall_flickr" data-stellar-background-ratio="0.2"></div>
    <div class="content" id="content_flickr">
        <div class="title">Flickr</div>
        <p>Flickr's APIs are awesome!</p>
        <div class="col-md-12 imageThumbnail">
            <?php
            $image = new Flickr();
            $image->getImage();
            ?>
        </div>
    </div>
    <!--    <span id="index_flickr"></span>-->

    <span id="index_contacts"></span>

    <!--    <div class="image" id="wall_hobbies" data-stellar-background-ratio=""></div>-->
    <!--    <div class="" id="content_hobbies">-->
    <!--        <div class="photoshop">Photoshop</div>-->
    <!--    </div>-->

    <!--    <div class="image" id="wall_web" data-stellar-background-ratio="0.5"></div>-->
    <!--    <div class="content" id="content_web">-->
    <!--        <div class="title">Photoshop</div>-->
    <!--    </div>-->
    <!--    <div class="image" id="wall_contacts" data-stellar-background-ratio="0.2"></div>-->
    <div class="content col-md-12" id="content_contacts">
        <div class="col-md-4">soldati.gabriele@gmail.com</div>
        <div class="col-md-4">
            <a href="https://www.facebook.com/gbrlit">
                <div class="col-md-1 col-md-offset-4">
                    <img src="img/cont_facebook.png" width="20px" alt="">
                </div>
            </a>
            <a href="https://www.instagram.com/gabrielesoldati/">
                <div class="col-md-1">
                    <img src="img/cont_instagram.png" width="20px" height="20px" alt="">
                </div>
            </a>
            <a href="http://https://github.com/soldatigabriele">
                <div class="col-md-1">
                    <img src="img/githubW.png" width="20px" alt="">
                </div>
            </a>
            <a href="https://www.linkedin.com/in/gabriele-soldati-4a3992aa?trk=nav_responsive_tab_profile_pic">
                <div class="col-md-1">
                    <img src="img/cont_linkedin.png" width="20px" alt="">
                </div>
            </a>
        </div>
        <div class="col-md-4">113, Newton Street - Manchester UK</div>
        <div class="col-md-12 copyright">© 2016 Gabriele Soldati. All rights reserved.</div>
    </div>
</div>

<script src="include/scripts/scripts.js"></script>
</body>
</html>
