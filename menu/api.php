<?php 

    $bdd = new PDO('sqlite:/www/pi_rfid/db/rfid.db'); 

    if(isset($_POST['points_used']) && isset($_POST['points_acc']) && isset($_POST['points_DB']) && isset($_POST['cin'])){

        $points = $_POST['points_DB'] - $_POST['points_used'] + $_POST['points_acc'];
        $query = "UPDATE idstore SET points = $points WHERE cin = '".$_POST['cin']."'";
        $sth = $bdd->prepare($query); 
        if($sth->execute()){
            echo "success";
        }else{
            echo "fail";
        }
    }

?>
