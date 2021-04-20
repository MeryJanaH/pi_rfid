<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>HardSoft Restaurant</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="../css/templatemo-style.css" rel="stylesheet" />

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
    		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="../img/simple-house-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="../img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">HardSoft Restaurant</h1>
								<h6 class="tm-site-description">new restaurant</h6>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php $bdd = new PDO('sqlite:/www/pi_rfid/db/rfid.db'); 
        if(isset($_POST['insert'])){

            $query = "SELECT EXISTS (select 1 FROM `menu` WHERE name = '".$_POST['plat']."')";
            $res2 = $bdd->query($query);
            foreach($res2 as $row){
                if($row[0] == "1"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Plat exist in database
                    </div>
                    <?php
                }else{
                    $file = addslashes(base64_encode(file_get_contents($_FILES["image"]["tmp_name"])));  
        
                    $query = "INSERT INTO menu(name, price, image) VALUES ('".$_POST['plat']."','".$_POST['prix']."','data:".$_FILES["image"]['type'].";base64,".$file."')";  
                    if($bdd->query($query))  
                    {  
                         echo '<script>alert("Image Inserted into Database")</script>';  
                    } 
                    else{
                        echo '<script>alert("Image not Inserted into Database")</script>';  
                    }   
                }
            }
        }
        ?>




        <main>
            <form action="#menu" method="POST" enctype="multipart/form-data">
            </br>
            <div class="form-group">
                <label for="plat">Dish</label>
                <input class="form-control" name="plat" id="plat" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="prix">Price</label>
                <input type="number" step="0.01" min="0.01" name="prix" class="form-control" id="prix" placeholder="Price" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <button id="insert" name="insert" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>

        </br></br>
    <a href="/pi_rfid/index.php"><input type="submit" value="Return" class="w3-button w3-aqua" /></a>
    </div>





		<footer class="tm-footer text-center">
			<p>copyright &copy; 2021 HardSoft Restaurant 
		</footer>
	
    
	<script src="../js/jquery.min.js"></script>
	<script src="../js/parallax.min.js"></script>
    <script>  
    $(document).ready(function(){  
        $('#insert').click(function(){  
            var image_name = $('#image').val();  
            if(image_name == '')  
            {  
                    alert("Please Select Image");  
                    return false;  
            }  
            else  
            {  
                    var extension = $('#image').val().split('.').pop().toLowerCase();  
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                    {  
                        alert('Invalid Image File');  
                        $('#image').val('');  
                        return false;  
                    }  
            }  
        });  
    });  
    </script> 

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