
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple House Template</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="../css/templatemo-style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    
    <style>
    .w3-button {width:150px;
            margin-top:15px;}
    .statut {margin-left: 15px; width: 20%;}
    </style>

    <!-- taaable -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./teste.js"></script>
    <link href="./teste.css" rel="stylesheet" />

    <!-- + / - -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<!--

Simple House

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
								<h1 class="tm-site-title">Simple House</h1>
								<h6 class="tm-site-description">new restaurant template</h6>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <main>

        <?php 
        
        $bdd = new PDO('sqlite:/www/pi_rfid/db/rfid.db');  
        
        $id=shell_exec("/www/pi_rfid/script/read.py 2>&1");

       //cin value 
        $cin = "SELECT cin FROM idstore where id = $id"; 
        $res_cin = $bdd->query($cin);
        $res_cin->execute();
        $cin = $res_cin->fetch()[0];
        ////////////////////////////////////////////////////////////////////////
        ?>
            <div class="alert alert-success" role="alert">
              Client with CIN : <span id="cin"><?php echo $cin; ?></span>
            </div>
        <?php
        ///////////////////////////////////////////////////////////////////////
        $query = "SELECT EXISTS (select 1 FROM `idstore` WHERE id = $id)";
        $res3 = $bdd->query($query);
        foreach($res3 as $row){
            if($row[0] == "0"){
                ?>
                <div class="alert alert-danger" role="alert">
                Carte not exist in database
                </div>
                <?php
            }
            else{ ?>


                <?php  
                $query = "SELECT * FROM menu";  
                $sth = $bdd->prepare($query); 
                $sth->execute();
                //$result = $sth->fetchAll($query);
                ?>

                <?php  
                $query1 = "SELECT points FROM idstore where id = $id";  
                $sth1 = $bdd->prepare($query1); 
                $sth1->execute();
                $max_pnts = $sth1->fetch()[0];
                ?>

                </br></br></br>
                <div class="container">
	            <div class="row">
                <div class="col-lg-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="0" max="<?php echo $max_pnts; ?>">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                </div>    
                </div>    
                </div>
 
                     <!-- taaable --> </br></br></br></br>
                    <div class="shopping-cart">
                    <div class="column-labels">
                        <label class="product-image">Image</label>
                        <label class="product-details">Product</label>
                        <label class="product-price">Price</label>
                        <label class="product-quantity">Quantity</label>
                        <label class="product-removal">Remove</label>
                        <label class="product-line-price">Total</label>
                    </div>
                    <?php
                    while($row = $sth->fetch())  
                    {  ?>
                        <div class="product">
                        <div class="product-image">
                        <?php echo ' <img src="'.$row['image'].'" height="80" width="80" class="img-thumnail" /> '; ?> 
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?php echo $row["name"]; ?></div>
                        </div>
                        <div class="product-price"><?php echo $row["price"]; ?></div>
                        <div class="product-quantity">
                            <input type="number" value="0" min="0">
                        </div>

                        <div class="product-removal">
                            <h1>      
                            </h1>
                        </div>

                        <div class="product-line-price">00.00</div>
                        </div>
             <?php } ?> 
                        <div class="totals">
                        <div class="totals-item">
                            <label>Subtotal</label>
                            <div class="totals-value" id="cart-subtotal">00.00</div>
                        </div>
                        <div class="totals-item">
                            <label>Points accumulated</label>
                            <div style="float: right; width: 21%; text-align: right;" id="cart-tax">0</div>
                        </div>
                        <div class="totals-item">
                            <label>discount</label>
                            <div class="totals-value" id="cart-shipping">00.00</div>
                        </div>
                        <div class="totals-item totals-item-total">
                            <label>Grand Total</label>
                            <div class="totals-value" id="cart-total">00.00</div>
                        </div>
                        </div>
                            
                            <button class="checkout">Checkout</button>

                        </div>

                     <?php
                }  
                ?>  
            </table> 
             <?php } ?>
         
        </main>
        </div>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2020 Simple House 
            
            | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
		</footer>
	
    
	<script src="../js/jquery.min.js"></script>
	<script src="../js/parallax.min.js"></script>
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

    <script>
</body>
</html>