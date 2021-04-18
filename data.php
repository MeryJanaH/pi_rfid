<!doctype html>
<html lang="fr">
    <head>
        
        <meta charset="utf-8">
        <title>Contrôle GPIO</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
<?php

$bdd = new PDO('sqlite:/www/pi_rfid/db/rfid.db');

if(isset($_POST["user"])){

    
    $query = "SELECT EXISTS (select 1 FROM `idstore` WHERE cin = '".$_POST['user_cin']."')";
    $res = $bdd->query($query);
    foreach($res as $row){
        if($row[0] == "1"){
            ?>
            <div class="alert alert-danger" role="alert">
            CIN exist in database
            </div>
            <?php
        }
        else{

        $id=shell_exec("/www/pi_rfid/script/read.py 2>&1");

        ?>
        <div class="alert alert-success" role="alert"> 
         id numéro : <?php echo"'$id'"; ?> est ajouté
        </div>
        <?php

        $query="INSERT INTO `idstore` (`id`,`name`,`cin`,`points`) VALUES ($id,'".$_POST["user_name"]."','".$_POST["user_cin"]."',0)";

        $result=$bdd->query($query);
        }
    }

?>
</br></br>
    <a href="/pi_rfid/index.php"><input type="submit" value="Retourner" class="w3-button w3-aqua" /></a>
<?php 
}

?>
</html>




