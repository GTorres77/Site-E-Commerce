<?php
require_once('conn/connect.php');
require_once('inc/cookie.php');
?>
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PCmaisUM</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Google Web Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Romanesco" rel="stylesheet">

        <!-- CSS Files -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/fav-57.png">
        <link rel="shortcut icon" href="images/fav.png">

    </head>
    <body>
        <!-- Header Section Starts -->
        <header id="header-area">
            <!-- Header Top Starts -->
            <?php
            include './inc/nav1.php';
            ?>
            <!-- Header Top Ends -->
            <!-- Main Header Starts -->
            <?php
            include './inc/nav2.php';
            ?>
            <!-- Main Header Ends -->
            <!-- Main Menu Starts -->
            <?php
            include './inc/nav3.php';
            ?>
            <!-- Main Menu Ends -->
        </header>
        <!-- Header Section Ends -->
        <!-- Slider Section Starts -->
        <div class="slider">
            <div id="main-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper For Slides Starts -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/banners/slide1-img.jpg" alt="Slider" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="images/banners/slide2-img.jpg" alt="Slider" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="images/banners/slide3-img.jpg" alt="Slider" class="img-responsive" />
                    </div>
                </div>
                <!-- Wrapper For Slides Ends -->
                <!-- Controls Starts -->
                <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <!-- Controls Ends -->
            </div>	
        </div>
        <!-- Slider Section Ends -->	
        <!-- Main Container Starts -->
        <div id="main-container" class="container">
            <!-- Latest Products Starts -->
            <!-- Featured Products Starts -->
            <?php
            include './inc/produtos.php';
            ?>
            <!-- Featured Products Ends -->
        </div>
        <!-- Main Container Ends -->	
        <!-- Footer Section Starts -->
        <?php
        include './inc/footer.php';
        ?>
        <!-- Footer Section Ends -->
        <!-- JavaScript Files -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>	
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-hover-dropdown.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>

<script>
$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt = $(this).val();
        if(txt != '')
        {

        }
        else{
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt},
                dataType: "Text",
                sucess:function(data)
                {
                    $('#result').html(data;)
                }
            });
        }
    });
});