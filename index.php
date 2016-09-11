<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="include/css/stylesheet.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="include/autoscroll/animatescroll.js"></script>
    <script src="include/jQuery/jquery-1.12.4.js"></script>
    <script src="include/stellar/jquery.stellar.js"></script>
    <!--    grid image css -->
    <link rel="stylesheet" type="text/css" href="include/css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="include/css/style.css"/>
    <script type="text/javascript" src="include/gridImagesJs/modernizr.custom.26633.js"></script>
    <noscript>
        <link rel="stylesheet" type="text/css" href="css/fallback.css"/>
    </noscript>
    <script src="include/jquery.appear/jquery.appear.js"></script>
    <!--    end image Grid css  -->
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
        <a id="works" href="#">Websites</a> |
        <a id="flickr" href="#">Flickr</a> |
        <a id="contacts" href="#">Contacts</a>
    </nav>
</div>


<div class="page" style="">
    <div class="firstImage" id="wall_about" data-stellar-background-ratio="0.5"></div>
    <div class="content" id="content_about">
        <div class="title">WHO AM I</div>
        <div class="description">
            <p>I am a graduate back-end developer</p>
            <p>I like to challenge myself and I love to learn!</p>
        </div>

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
            <div class="col-md-10 col-md-offset-1 logos">
                <div class="col-md-2 transparent" id="slide1"><img class="img-circle" id="img1" src="img/php.png"
                                                                   alt="Circle image"></div>
                <div class="col-md-2 transparent" id="slide2"><img class="img" id="img2" src="img/mysql.png"
                                                                   alt="Circle image"></div>
                <div class="col-md-2 transparent" id="slide3"><img class="img" id="img3" src="img/githubB.png"
                                                                   alt="Circle image"></div>
                <div class="col-md-2 transparent" id="slide4"><img class="img" id="img5" src="img/js.png"
                                                                   alt="Circle image"></div>
                <div class="col-md-2 transparent" id="slide5"><img class="img" id="img4" src="img/nodejs.png"
                                                                   alt="Circle image"></div>
                <div class="col-md-2 transparent" id="slide6"><img class="img" id="img6" src="img/jquery.png"
                                                                   alt="Circle image"></div>
            </div>
        </div>
    </div>
    <span id="index_web"></span>

    <div class="image" id="wall_frameworks" data-stellar-background-ratio="0.2"></div>
    <div class="content" id="content_frameworks">
        <div class="frameworkTitle">Laravel 5</div>
        <div class="frameworkDescription">
            <p>Laravel is my favourite PHP Framework!</p>
            <p>It makes everything easier and faster!</p>
        </div>
    </div>
    <span id="index_frameworks"></span>

    <div class="image" id="wall_works" data-stellar-background-ratio="0.2"></div>
    <div class="content" id="content_works">
        <div class="title">Some of my works...</div>
        <div class="col-xl-12 websites">
            <a href="Works/ImageVault/overview.php">
                <div class="col-md-4 col-md-offset-1 workImage">
                    <img class="websiteImage" src="img/vault.jpg" alt="">
                </div>
            </a>
            <a href="Works/Laboa/overview.php">
                <div class="col-md-4 col-md-offset-2 workImage">
                    <img class="websiteImage" src="img/laboa.png" alt="">
                </div>
            </a>
            <div class="col-md-4 col-md-offset-1 imageLink"><a href="Works/ImageVault/overview.php"><p>ImageVault</p></a> </div>
            <div class="col-md-4 col-md-offset-2 imageLink"><a href="Works/Laboa/overview.php"><p>Laboa.org</p></a></div>
            <div class="col-md-12"><br></div>
            <a href="Works/Technology4u/overview.php">
                <div class="col-md-4 col-md-offset-1 workImage">
                    <img class="websiteImage" src="img/tech4u.jpg">
                </div>
            </a>
            <a href="Works/EasyRetrieve/overview.php">
                <div class="col-md-4 col-md-offset-2 workImage">
                    <img class="websiteImage" src="img/ER.jpg" alt="">
                </div>
            </a>
            <div class="col-md-4 col-md-offset-1 imageLink"> <a href="Works/Technology4u/overview.php"> <p>Technoloy4u</p> </a> </div>
            <div class="col-md-4 col-md-offset-2 imageLink"> <a href="Works/EasyRetrieve/overview.php"> <p>EasyRetrieve</p> </a> </div>
        </div>
    </div>
    <span id="index_works"></span>
    <div class="clearfix"></div>
    <br><br>

    <div class="image" id="wall_flickr" data-stellar-background-ratio="0.2"></div>
    <div class="content" id="content_flickr">
        <div class="title">Flickr</div>
        <p>Flickr's APIs are awesome!</p>
        <div class="col-md-12 imageThumbnail">
            <?php
            $image = new Flickr();
            ?>

            <section class="main">
                <div id="ri-grid" class="ri-grid ri-grid-size-2 ri-shadow">
                    <ul>
                        <?php $image->getImage(); ?>
                    </ul>
                </div>
            </section>
        </div>

        <br>
        <!-- if I remove the first iframe the facebook iframe disappears -->
        <iframe style="display:none;"></iframe>
        <iframe src="https://www.facebook.com/plugins/like.php?href=http://www.uniud.it/&show_faces=false"
                scrolling="no" frameborder="0" style="border:none; width:400px; height:80px"
                allowtransparency="true"></iframe>
        <!--        <iframe src="https://www.facebook.com/plugins/like.php?href=http://www.flickr.com/photos/117888312@N02/&layout=standard&width=450&height=80&show_faces=true&action=like&colorscheme=dark&font=segoe+ui" scrolling="no" frameborder="0" style="border:none; width:450px; height:80px" allowtransparency="true"></iframe>-->
    </div>
    <span id="index_flickr"></span>


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
                    <img id="imgFace" src="img/cont_facebook.png" width="20px" alt="">
                </div>
            </a>
            <a href="https://www.instagram.com/gabrielesoldati/">
                <div class="col-md-1">
                    <img id="imgInsta" src="img/cont_instagram.png" width="20px" height="20px" alt="">
                </div>
            </a>
            <a href="http://https://github.com/soldatigabriele">
                <div class="col-md-1">
                    <img id="imgGit" src="img/github.png" width="20px" alt="">
                </div>
            </a>
            <a href="https://www.linkedin.com/in/gabriele-soldati-4a3992aa?trk=nav_responsive_tab_profile_pic">
                <div class="col-md-1">
                    <img id="imgLink" src="img/cont_linkedin.png" width="20px" alt="">
                </div>
            </a>
        </div>
        <div class="col-md-4">Manchester - UK</div>
        <div class="col-md-12 copyright">© 2016 Gabriele Soldati. All rights reserved.</div>
    </div>
</div>
<span id="index_contacts"></span>
<script src="include/scripts/scripts.js"></script>
<script type="text/javascript" src="include/gridImagesJs/jquery.gridrotator.js"></script>
<script src="include/scripts/grid.js"></script>

</body>
</html>

