<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>HardSoft Restaurant</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="css/templatemo-style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    .w3-button {width:150px;
            margin-top:15px;}
    .statut {margin-left: 15px; width: 20%;}
    </style>
</head>
<!--

HardSoft Restaurant

https://templatemo.com/tm-539-simple-house

-->
<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">HardSoft Restaurant</h1>
								<h6 class="tm-site-description">new restaurant</h6>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to HardSoft Restaurant</h2>
			</header>

			
			<div class="tm-paging-links">

            <?php 

            if(!isset($_POST['add']) && !isset($_POST['menu'])){ ?>
            <div class="w3-container"> 

				<form action="./menu/menu.php" method="POST">
					<button type="submit" value="select" class="btn btn-warning">ADD A NEW DISH</button>
				</form>

                <form action="#data" method="POST">
                    <input type="submit" name="add" value="ADD A NEW CART" class="w3-button w3-aqua" id="add">
                </form>

				<form action="./menu/select.php" method="POST">
					<input type="submit" name="menu" value="OUR MENU" class="w3-button w3-aqua" id="menu">
				</form>
            </div> 
            <?php
            }

			

            if(isset($_POST['add'])){
                if($_POST['add'] == 'ADD A NEW CART' && !isset($_POST['user_name']))
                { ?>
                <div class="w3-container">
                    <form action="./data.php" method="POST">
                    <label for="user_name">Client NAME :</label><br>
                    <input type="text" name="user_name" class="w3-button w3-aqua" id="user_name" required></br></br>
                    <label for="user_cin">CIN OF Client:</label><br>
                    <input type="text" name="user_cin" class="w3-button w3-aqua" id="user_cin" required></br></br>
                    <input type="submit" name="user" id="user" value="Submit">
                    </form>
                </div>
                <?php
                }
            }

            ?>
			</div>
        </br>

		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2021 HardSoft Restaurant 
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();
				
				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
</body>
</html>