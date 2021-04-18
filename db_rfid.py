
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Grill by Distinctive Themes</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>
        .w3-button {width:150px;
                margin-top:15px;}
        .statut {margin-left: 15px; width: 20%;}
        </style>
</head>

<body id="page-top" class="regular-navigation">


    <div class="master-wrapper">

        <div class="preloader">
            <div class="preloader-img">
            	<span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF" alt="loading" /></span>
            </div>
        </div>

        <!-- Header -->
        <header id="headerwrap" class="backstretched fullheight">
            <div class="container-fluid fullheight">
                <div class="vertical-center row">
                    <div class="col-sm-1 pull-left text-center slider-control match-height">
                        <a href="#" class="prev-bs-slide vertical-center wow fadeInLeft" data-wow-delay="0.8s"><i class="fa fa-long-arrow-left"></i></a>
                    </div>
                    <div class="intro-text text-center smoothie col-sm-10 match-height">                    
                        <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.8s"><img src="assets/img/intro-logo.png"></div>              
                    </div>
                    <div class="col-sm-1 pull-right text-center slider-control match-height">
                        <a href="#" class="next-bs-slide vertical-center wow fadeInRight" data-wow-delay="0.8s"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <section id="about" class="top-border-me">
            <div class="section-inner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mb100">                        
                            <h2 class="section-heading">A <span class="theme-accent-color">Warm</span> Welcome</h2>

                            <?php 

                                if(!isset($_POST['add'])){ ?>
                                <div class="w3-container"> 
                                    <form action="#data" method="POST">
                                        <input type="submit" name="add" value="ADD A CART" class="w3-button w3-aqua" id="add">
                                    </form>
                                </div> 
                                <?php
                                }

                                if(isset($_POST['add'])){
                                    if($_POST['add'] == 'ADD A CART' && !isset($_POST['user_name']))
                                    { ?>
                                    <div class="w3-container">
                                        <form action="./data.php" method="POST">
                                        <label for="user_name">Client name :</label><br>
                                        <input type="text" name="user_name" class="w3-button w3-aqua" id="user_name"></br></br>
                                        <label for="user_cin">CIN du Client:</label><br>
                                        <input type="text" name="user_cin" class="w3-button w3-aqua" id="user_cin"></br></br>
                                        <input type="submit" name="user" id="user" value="Submit">
                                        </form>
                                    </div>
                                    <?php
                                    }
                                } 

                            ?>
                        </div>
                    </div>
                </div>
            </div>

         </section>
        <a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/init.js"></script>

    
    <script type="text/javascript">
    $(document).ready(function(){
       'use strict';
        jQuery('#headerwrap').backstretch([
          "assets/img/bg/bg1.jpg",
          "assets/img/bg/bg2.jpg",
          "assets/img/bg/bg3.jpg",
        ], {duration: 8000, fade: 500});
    });
    </script>

</body>

</html>
