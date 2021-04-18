<?php 
        $bdd = new PDO("sqlite:/www/html/pi_rfid/rfid.db");
        $query="INSERT INTO `idstore` (`name`) VALUES ('h222222')";
        $bdd->query($query);
?>
